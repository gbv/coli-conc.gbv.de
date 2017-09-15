Q6423319.csv:
	node ../../node_modules/wikidata-taxonomy/wdtaxonomy.js Q6423319 -o $@

Q6423319.ndjson:
	node ../../node_modules/wikidata-taxonomy/wdtaxonomy.js Q6423319 -o $@

mappings.csv:
	curl -s -G https://query.wikidata.org/sparql -H "Accept: text/csv" \
		--data-urlencode query='SELECT * { ?a wdt:P279* wd:Q6423319; wdt:P2888 ?b }' \
		| tail -n+2 > $@
