---
layout: layouts/blog
title: "Added support of SkoHub vocabularies"
excerpt: "The software library cocoda-sdk can be used to access terminologies from various sources"
tags:
- blog
---

We regularly inform about updates of [Cocoda mapping application](/cocoda/) and [BARTOC terminology registry](https://bartoc.org/), but under the hood internal components get improved as well. The major software components developed within project coli-conc include [jskos-server](https://github.com/gbv/jskos-server), a web API to manage vocabularies, mappings and other terminology-related information in a database and [cocoda-sdk](https://github.com/gbv/cocoda-sdk), a software library to access terminologies from various sources. The latter just got an update to support access to vocabularies hosted via [SkoHub](https://skohub.io/) vocabulary publication software.

One goal of coli-conc is to provide an infrastructure to all kinds of vocabularies (terminologies such as authority files, classifications, and ontologies). These vocabularies can be managed by diverse organizations in many ways. Getting all vocabulary publishers to agree one common standard is futile, so we take another approach:

1. vocabularies are **cataloged in BARTOC** with information how to access them. BARTOC includes a growing [list of known vocabulary APIs](https://bartoc.org/en/node/20002#content).

2. vocabulary models (SKOS, OWL, GND Ontology, custom formats...) have been **unified with [JSKOS data format](https://gbv.github.io/jskos/)**

3. **cocoda-sdk implements wrappers** to access diverse vocabulary APIs uniformly as JSKOS data

By now 362 vocabularies are known to be accessible via cococda-sdk via the following APIs:

API | vocabularies
----|--------
[Skosmos](https://skosmos.org/) | 266
[JSKOS API](https://github.com/gbv/jskos-server#api) | 94
[SkoHub](https://github.com/skohub-io/skohub-vocabs) | 3
[Reconciliation Servic API](https://reconciliation-api.github.io/specs/latest/) | 4 (only search)
Library of Congress ([id.loc.gov](https://id.loc.gov/)) | 2 (custom API)

In addition Wikidata is wrapped via an [independent wrapper service](https://github.com/gbv/wikidata-jskos).

If you plan to implement an API to your vocabulary, please consider JSKOS API (as recently done by Konstanz University Library for their [KonSys classification](https://bartoc.org/en/node/1443#content)) or use an established software such as Skosmos and SkoHub. Several [terminology registries](https://bartoc.org/registries) help with hosting vocabularies. Wrappers to more terminology services such as OntoPortal, OLS, and iQvoc might be implemented in cocoda-sdk when needed.

