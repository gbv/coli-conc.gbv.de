# coli-conc Website Docker

Create a `docker-compose.yml` file:

```yml
version: "3"
services:
  coli-conc-website:
    image: ghcr.io/gbv/coli-conc-website
    volumes:
      # Store the built website in a volume so that it'll be available after container updates (to minimize downtime)
      - ./data:/usr/src/app/_site
    environment:
      # URL for site: https://example.com/site/
      - URL=https://example.com
      - PATHPREFIX=site
    restart: unless-stopped
```

Start the container:

```sh
docker compose up -d
```

The website needs to be built after each update, as it is dependent on the specified `URL` and `PATHPREFIX`. This build will be run in the background (if needed) each time the container is started.

To run the build manually:

```sh
docker compose exec -it coli-conc-website bash build.sh
```

## To-Do
- [ ] Only build the website if necessary (e.g. remember which Git tag the current build was based on)
