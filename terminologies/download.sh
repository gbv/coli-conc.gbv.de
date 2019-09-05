#!/bin/bash

# get latest kos-registry
curl -s https://api.github.com/repos/gbv/kos-registry/releases/latest \
    | jq -r '.assets[].browser_download_url' | xargs wget -N

# which KOS to take?
grep -oe '^[0-9]\+' bartoc-ids.txt \
    | awk '{print "{\"uri\":\"http://bartoc.org/en/node/"$1"\"}"}' \
    > bartoc-uris.ndjson

# filter only those and write kos.{json,ndjson}
jq -s 'group_by(.uri)|map(select(length>1)|.[1])' bartoc-uris.ndjson kos-registry.ndjson \
    > kos.json
jq -c .[] kos.json > kos.ndjson
