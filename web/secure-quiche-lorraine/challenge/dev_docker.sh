#!/bin/bash

docker build -t secure-quich-lorraine-80 . && \
docker run -it -p 80:80 -v $(pwd)/src:/var/www/html --rm --name secure-quich-lorraine-container secure-quich-lorraine-80