# coli-conc Website Docker

Create a `docker-compose.yml` file:

```yml
version: "3"
services:
  coli-conc-website:
    image: ghcr.io/gbv/coli-conc.gbv.de
    volumes:
      # Store the built website in a volume (optional, but prevents having to rebuild the site if the container is recreated)
      - ./data:/usr/src/app/_site
    environment:
      # URL for site: https://example.com/site/
      - URL=https://example.com
      - PATHPREFIX=site
    # Internal port can be changed via environment variable PORT
    ports:
      - 80:80
    restart: unless-stopped
```

Start the container:

```sh
docker compose up -d
```

The website needs to be built after each update, as it is dependent on the specified `URL` and `PATHPREFIX`. This update and build will be run in the background (if needed) each time the container is started.

To run the update manually without restarting the container (should be zero downtime):

```sh
docker compose exec -it coli-conc-website bash build.sh
```

Note that the container will clone the `main` branch of the site on first launch, then update the site via Git each time `build.sh` is run or the container is restarted.

The website will be served on port 80.
