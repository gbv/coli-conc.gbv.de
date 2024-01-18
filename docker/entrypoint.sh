#!/bin/bash

# Build site in background if needed
if [ -e _site/.git-commit ] && [ "$(git rev-parse HEAD)" == "$(cat _site/.git-commit)" ]; then
  echo "Site rebuild skipped because it's still on the same commit."
else
  bash build.sh && git rev-parse HEAD > _site/.git-commit &
fi

http-server -s -d false /usr/src/app/_site
