#!/bin/bash

# Build site in background
bash build.sh &

PORT=${PORT:-80}
echo "Starting http-server on port $PORT..."

http-server -s -d false -p "$PORT" /usr/src/app/_site
