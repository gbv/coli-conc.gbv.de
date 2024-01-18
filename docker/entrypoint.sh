#!/bin/bash

# Build site in background
bash build.sh &

http-server -s -d false /usr/src/app/_site
