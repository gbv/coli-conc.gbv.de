#!/bin/bash

REPO=coli-conc.gbv.de
TARGET=../_site

# Clone site if not yet done
if [ ! -e $REPO/.git ]; then
  git clone https://github.com/gbv/coli-conc.gbv.de.git $REPO
fi

cd $REPO || exit 1

# Clean/reset repo
git clean -f -d
rm -rf _site

# Pull changes
git pull

if [ -e $TARGET/.git-commit ] && [ "$(git rev-parse HEAD)" == "$(cat $TARGET/.git-commit)" ]; then
  echo "Site rebuild skipped because there was no update."
else
  # Might need to update dependencies after each pull
  npm ci
  # Build the site
  if npm run build -- --pathprefix="$PATHPREFIX" --url="$URL"; then
    # Copy to home folder
    rm -rf $TARGET/*
    cp -r _site/* $TARGET
    # Remember the current commit
    git rev-parse HEAD > $TARGET/.git-commit
  else
    echo "Warning: Build was not successful! Please check the logs."
  fi
fi
