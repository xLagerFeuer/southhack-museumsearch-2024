FROM nvidia/cuda:11.8.0-devel-ubuntu22.04

USER root

RUN chmod 1777 /tmp
RUN apt-key del 7fa2af80
RUN apt-key del 3bf863cc
RUN apt-key adv --fetch-keys http://developer.download.nvidia.com/compute/cuda/repos/ubuntu1604/x86_64/3bf863cc.pub
RUN apt-key adv --fetch-keys https://developer.download.nvidia.com/compute/cuda/repos/ubuntu1804/x86_64/7fa2af80.pub
RUN apt-key adv --fetch-keys https://developer.download.nvidia.com/compute/machine-learning/repos/ubuntu1804/x86_64/7fa2af80.pub

RUN apt-get -y update && apt-get -y upgrade \
    libnss3-dev \
    libssl-dev \
    libreadline-dev \
    libffi-dev \
    wget \
    curl
RUN apt install python3.10 -y
RUN apt install -y \
    python3-pip
RUN pip install --upgrade pip
RUN pip install torch==2.0.1 --index-url https://download.pytorch.org/whl/cu118

COPY requirements.txt requirements.txt 
RUN pip install --upgrade pip setuptools
RUN pip install -r ./requirements.txt

WORKDIR /home/root/app

EXPOSE ${APP_PORT}

ENTRYPOINT ["uvicorn", "app:app", "--host", "0.0.0.0", "--port", "7000"]
