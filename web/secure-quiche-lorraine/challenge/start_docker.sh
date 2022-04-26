#!/bin/bash

docker build -t my-first-site-80 . && \
docker run -it -p 80:80 --rm --name my-first-site-container my-first-site-80
