# coli-conc Website Docker

Create a `docker-compose.yml` file:

```yml
version: "3"
services:
  coli-conc-website:
    build:
      context: ..
      dockerfile: docker/Dockerfile
    volumes:
      - ./data:/usr/src/app/_site
    environment:
      # URL for site: https://example.com/site/
      - URL=https://example.com
      - PATHPREFIX=site
    restart: unless-stopped
```

Start the container and run the build:

```sh
docker compose up -d
docker compose exec -it coli-conc-website bash build.sh
```
