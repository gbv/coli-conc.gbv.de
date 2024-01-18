FROM node:20-alpine
WORKDIR /usr/src/app

## We need bash and git.
RUN apk add --no-cache bash
RUN apk add --no-cache git

## Show version numbers for Node and npm
RUN node -v
RUN npm -v

## Make Docker-related scripts available in root folder
COPY docker/*.sh .

## Use http-server for serving the site
RUN npm i -g http-server

CMD ["bash", "entrypoint.sh"]
