import chromadb
import logging

from config import DEVICE, TOP_K
from sentence_transformers import SentenceTransformer
from PIL import Image
from io import BytesIO


logging.basicConfig(
    level=logging.DEBUG,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
)


class ImageHandler():

    def __init__(self, is_local=True) -> None:
        if is_local:
            client = chromadb.PersistentClient(path="./chromadb")
        else:
            client = chromadb.HttpClient(host="hack-sochi-db.k-lab.su", port=80)
        logging.info(f"CLIENT CONNECTED: {client}")
        self.collection = client.get_collection('image_embeddings')
        logging.info(f"COLLECTION CONNECTED: {self.collection}")

        self.img_encoder = SentenceTransformer('sentence-transformers/clip-ViT-B-32', cache_folder="./hf_cache").to(DEVICE)
        logging.info(f"IMG_ENCODER LOADED: {self.img_encoder}")


    def search_images(
            self, 
            image,
            top_k=TOP_K) -> dict:
        
        image_pil = Image.open(BytesIO(image))
        img_embedding = self.img_encoder.encode(image_pil).tolist()

        # query
        results = self.collection.query(
            query_embeddings=img_embedding,
            n_results=top_k
        )

        prepared_return = [
            {
                'path': meta['path'],
                'name': meta['name'],
                'doc': meta['doc_id'],
                'img': meta['img_id'],
                'class': meta['class'],
                'score': 1 - dist,
                'description': 'None',
            }
            for meta, dist in zip(results['metadatas'][0], results['distances'][0])
        ]

        return prepared_return
