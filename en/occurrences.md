---
layout: layouts/page
title: Concept Occurrences
---

{% section %}

An **occurrence** gives the number of times a selected concept is used in K10plus database.  Co-occurrences give the number for combination of concepts so they can be used as mapping recommendations.  This service allows to query (co-)occurrences of selected vocabularies (RVK, BK, DDC...) from K10plus database. The results are partly based on a database snapshot.

**API Endpoints**

- [/api/voc](https://coli-conc.gbv.de/occurrences/api/voc) lists supported vocabularies
- [/api](https://coli-conc.gbv.de/occurrences/api/)

**Sample queries**

- [occurrences of RVK DG 9000](https://coli-conc.gbv.de/occurrences/api/?member=http:%2F%2Frvk.uni-regensburg.de%2Fnt%2FDG%25209000)

- [co-occurrences of RVK DG 9000 in DDC](https://coli-conc.gbv.de/occurrences/api/?member=http:%2F%2Frvk.uni-regensburg.de%2Fnt%2FDG%25209000&scheme=http://bartoc.org/en/node/241)

- [co-occurrences of RVK DG 9000 in all vocabularies](https://coli-conc.gbv.de/occurrences/api/?member=http:%2F%2Frvk.uni-regensburg.de%2Fnt%2FDG%25209000&scheme=*)

See also [API documentation](https://github.com/gbv/occurrences-api#api) and implementation for details.

{% endsection %}

{% section %}{% endsection %}
