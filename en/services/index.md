---
layout: layouts/page
title:
  en: Services
subtitle:
  en: We provide a several applictaions, data sets and APIs for public use.
---

{% section %}

###### Applications
- [Cocoda]({{ "/cocoda/" | url }})

  Mapping Tool

- [coli-ana]({{ "/coli-ana/" | url }})

  DDC Analysis

{% endsection %}

{% section %}

###### APIs
Several web services are being developed to query information related to knowledge organization systemes in [JSKOS format](https://gbv.github.io/jskos/).

- [DANTE API](https://api.dante.gbv.de/)

  Access to terminologies and concepts from central terminology service of VZG.

- [Mappings API](https://coli-conc.gbv.de/api/mappings)

  Access to collected mappings and concordances.

- [Occurrences API]({{ "/occurrences/" | url }})

  Look up occurrences and co-occurrences of concepts in library catalogs.

- [Wikidata JSKOS API](https://coli-conc.gbv.de/services/wikidata/)

  Access Wikidata in JSKOS format with [wikidata-jskos](https://github.com/gbv/wikidata-jskos).

{% endsection %}

{% section %}

###### Data Sets
- [KOS Types]({{ "/publications/kostypes/" | url }})

  Classification of knowledge organization systems. Data extracted from Wikidata.

- [KOS Registry]({{ "/terminologies/" | url }})

  Description of knowledge organization systems relevant to project coli-conc. Data extracted from BARTOC.

- [Concordance Registry]({{ "/concordances/" | url }})

  Concordances collected and unified in project coli-conc. Data collected manually.

- [Wikidata Mappings]({{ "/concordances/wikidata/" | url }})

  Collected mappings between Wikidata and other systems. Data extracted from Wikidata.

- [GND Mappings]({{ "/concordances/gnd/" | url }})

  Collected mappings between the Integrated Authority File (GND) and other systems. Work in progress.

We have unified the access to sources that offer JSKOS data via registries. For more information, see [Data Sources and Registries]({{ "/registry/" | url }}).

{% endsection %}

{% section %}
{% endsection %}
