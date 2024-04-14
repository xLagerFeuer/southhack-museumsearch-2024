import config
import os
import base64
from typing import Optional

import json
import requests
import logging
import asyncio
import uvicorn
from fastapi import FastAPI
from fastapi.responses import HTMLResponse, PlainTextResponse
from pydantic import BaseModel

from image_handling import ImageHandler
from config import URL


logging.basicConfig(
    level=logging.DEBUG,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
)


app = FastAPI()
img_handler = ImageHandler()

class UserData(BaseModel):
    image: bytes
    author: str
    date: str


@app.post("/find_images/", response_class=PlainTextResponse)
async def find_images(user_data: UserData):
    
    decoded_bytes = base64.b64decode(user_data.image)
    results = img_handler.search_images(
        image=decoded_bytes,
    )
    
    logging.info(f"DATE: {user_data.date}")
    response = requests.post(URL, json={
        'image': base64.b64encode(decoded_bytes).decode(),
        'name': results[0]['name'],
        'author': user_data.author,
        'date': user_data.date,
    }).text
    
    results[0]['description'] = response
    logging.info(f"Search results: {results}")

    return str(results)


@app.get("/hello", response_class=HTMLResponse)
async def hello_world():
    html_content = """
    <html>
        <head>
            <title>Some HTML in here</title>
        </head>
        <body>
            <h1>Hello, World!</h1>
        </body>
    </html>
    """
    return html_content
