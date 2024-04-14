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
URL = "https://d6e6-31-173-223-100.ngrok-free.app/generate/"
logging.info(f"CUDA_NUMBER: {CUDA_NUMBER}; DEVICE: {DEVICE}")

TOP_K = 10
