import logging
from transformers import InstructBlipProcessor, InstructBlipForConditionalGeneration, M2M100Tokenizer, M2M100ForConditionalGeneration
from config import DEVICE, PROMPT
from PIL import Image
from io import BytesIO


logging.basicConfig(
    level=logging.DEBUG,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
)


class LLMHandler():

    def __init__(self, is_local=True) -> None:
        self.gen_model = InstructBlipForConditionalGeneration.from_pretrained("Salesforce/instructblip-vicuna-7b", cache_dir="/home/raid/hf_cache").to(DEVICE)
        self.translate_model = M2M100ForConditionalGeneration.from_pretrained("facebook/m2m100_1.2B", cache_dir="/home/raid/hf_cache").to(DEVICE)
        self.processor = InstructBlipProcessor.from_pretrained("Salesforce/instructblip-vicuna-7b", cache_dir="/home/raid/hf_cache")
        self.translate_ru_en_tokenizer = M2M100Tokenizer.from_pretrained("facebook/m2m100_1.2B", src_lang='ru', tgt_lang='en', cache_dir="/home/raid/hf_cache")
        self.translate_en_ru_tokenizer = M2M100Tokenizer.from_pretrained("facebook/m2m100_1.2B", src_lang='en', tgt_lang='ru', cache_dir="/home/raid/hf_cache")


    def generate_desc(
            self, 
            image,
            name,
            author,
            date,
            ) -> str:
        
        image_pil = Image.open(BytesIO(image))  # .convert("RGB")
        translated_words_en = self.__translate([name, author], to_lang='en')

        result = self.__generate(image_pil, translated_words_en[0], translated_words_en[1], date)[0]
        logging.info(f"GENERATED: {result}")

        return result


    def __translate(self, texts: list, to_lang: str):
        results = []
        if to_lang == 'ru':
            for text in texts:
                encoded_inputs = self.translate_en_ru_tokenizer(text, return_tensors='pt').to(DEVICE)
                generated_tokens = self.translate_model.generate(**encoded_inputs, forced_bos_token_id=self.translate_en_ru_tokenizer.get_lang_id("ru"))
                result = self.translate_en_ru_tokenizer.batch_decode(generated_tokens, skip_special_tokens=True)
                results.append(result)
        elif to_lang == 'en':
            for text in texts:
                encoded_inputs = self.translate_ru_en_tokenizer(text, return_tensors='pt').to(DEVICE)
                generated_tokens = self.translate_model.generate(**encoded_inputs, forced_bos_token_id=self.translate_ru_en_tokenizer.get_lang_id("en"))
                result = self.translate_en_ru_tokenizer.batch_decode(generated_tokens, skip_special_tokens=True)
                results.append(result)

        return results


    def __generate(self, image, name, author, date):
        prompt = PROMPT.format(author[0], name[0], date)
        logging.info(f"{prompt}")

        inputs = self.processor(images=image, text=prompt, return_tensors="pt").to(DEVICE)
        outputs = self.gen_model.generate(
            **inputs,
            do_sample=False,
            num_beams=5,
            max_length=256,
            min_length=100,
            top_p=0.9,
            repetition_penalty=1.5,
            length_penalty=1.0,
            temperature=1,
        )
        generated_text = self.processor.batch_decode(outputs, skip_special_tokens=True)[0].strip()
        translated = self.__translate([generated_text], to_lang='ru')[0]
        return translated
