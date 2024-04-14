import config
import os
import base64
from typing import Optional

import logging
import asyncio
import uvicorn
from fastapi import FastAPI
from fastapi.responses import HTMLResponse, PlainTextResponse
from pydantic import BaseModel

from llm_handling import LLMHandler
# from llm_handling import generate_description

logging.basicConfig(
    level=logging.DEBUG,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
)


app = FastAPI()
llm_handler = LLMHandler()

class UserData(BaseModel):
    image: bytes
    name: str
    author: str
    date: str


@app.post("/generate/", response_class=PlainTextResponse)
async def generate_description(user_data: UserData):
    
    decoded_bytes = base64.b64decode(user_data.image)
    result = llm_handler.generate_desc(decoded_bytes, user_data.name, user_data.author, user_data.date)
    
    return result


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
