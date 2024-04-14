import os
import logging
from torch import cuda 
from dotenv import load_dotenv


logging.basicConfig(
    level=logging.DEBUG,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
)

load_dotenv()
CUDA_NUMBER = os.getenv('CUDA_NUMBER')

# APP_HOST_IP = "localhost"  # os.getenv('APP_HOST_IP')
# APP_PORT = 8080  # os.getenv('APP_PORT')

os.environ['CUDA_VISIBLE_DEVICES'] = CUDA_NUMBER
DEVICE = 'cuda' if cuda.is_available() else 'cpu'
PROMPT = """Your task is to beautifully describe the work of art, what is in the image.
Keep in mind that the author of this work is {}
The work is called: "{}"
The work was written on this date: "{}"

Describe it according to the template:
#Author, #title, #date of creation
#your generated description#""" 
logging.info(f"CUDA_NUMBER: {CUDA_NUMBER}; DEVICE: {DEVICE}")
