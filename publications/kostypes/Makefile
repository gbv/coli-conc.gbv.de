Q6423319.csv:
	node ../../node_modules/wikidata-taxonomy/wdtaxonomy.js -p Q6423319 -o $@

Q6423319.ndjson:
	node ../../node_modules/wikidata-taxonomy/wdtaxonomy.js -p Q6423319 -d -o $@

mappings.csv:
	curl -s -G https://query.wikidata.org/sparql -H "Accept: text/csv" \
		--data-urlencode query@mappings.sparql > $@
