#!/bin/bash

# Clone site if not yet done
if [ ! -e .git ]; then
  git init
  git remote add origin https://github.com/gbv/coli-conc.gbv.de.git
  git fetch
  git checkout -t origin/main
fi

# Pull changes
git pull

if [ -e _site/.git-commit ] && [ "$(git rev-parse HEAD)" == "$(cat _site/.git-commit)" ]; then
  echo "Site rebuild skipped because there was no update."
else
  # Might need to update dependencies after each pull
  npm ci
  # Build the site
  npm run build -- --pathprefix="$PATHPREFIX" --url="$URL"
  # Remember the current commit
  git rev-parse HEAD > _site/.git-commit
fi

