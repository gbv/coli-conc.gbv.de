---
layout: layouts/blog
title: "Cocoda supports MeSH, LCSH, LCNAF, and more"
excerpt: "Cocoda 1.4.7 adds support of more English vocabularies such as MeSH and LCSH"
tags:
- blog
---

Release 1.4.7 of the [mapping tool Cocoda](/cocoda/) adds support of several English vocabularies, in particular:

* [Medical Subject Headings (MeSH)](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fid.nlm.nih.gov%2Fmesh)
* [Library of Congress Subject Headings (LCSH)](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fid.loc.gov%2Fauthorities%2Fsubjects)
* [Library of Congress Name Authority File (LCNAF)](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fid.loc.gov%2Fauthorities%2Fnames)

Both are integrated via the official vocabulary API of MeSH (<https://www.nlm.nih.gov/mesh/>) and LoC (<https://id.loc.gov>) respectively. Access may be delayed a bit for large sets of concepts but the data is always up-to-date.

Cocoda started with focus on German library classification systems. Now more and more English vocabularies are supported as well. Further examples include:

* Thema subject classification scheme of books
* EuroVoc
* Iconclass
* Mathematics Subject Classification
* STW Thesaurus for Economics
* Systematics of the subjects and colleges of the German Research Association
* Hornbostel-Sachs-System
* Nomisma
* Wikidata

With Cocoda all vocabularies can be browsed and searched in a unified interface to create and evaluate mappings between them. The tool can be used freely and it is [available as Open Source](https://github.com/gbv/cocoda). Existing mappings between the new vocabularies will be added to our mapping database in the comming weeks.
