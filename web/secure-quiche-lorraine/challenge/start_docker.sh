#!/bin/bash

docker build -t secure-quich-lorraine-80 . && \
docker run -it -p 80:80 --rm --name secure-quich-lorraine-container secure-quich-lorraine-80
