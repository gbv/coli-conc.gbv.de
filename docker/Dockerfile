FROM node:20-alpine
WORKDIR /usr/src/app

## We need bash and git.
RUN apk add --no-cache bash
RUN apk add --no-cache git

## Show version numbers for Node and npm
RUN node -v
RUN npm -v

## Install dependencies (separate step to utilize caching)
COPY package*.json ./
RUN npm ci

## Copy app source
COPY . .

## Make build.sh available in root folder
RUN cp docker/build.sh ./

## Use http-server for serving the site
RUN npm i -g http-server
CMD ["http-server", "-s", "-d", "false", "/usr/src/app/_site"]
