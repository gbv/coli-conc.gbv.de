---
layout: layouts/page
title:
  en: Services
subtitle:
  en: We provide a several applictaions, data sets and APIs for public use.
---

{% section %}

## Applications

- [Cocoda]({{ "/cocoda/" | url }})

  The Mapping Tool is the main application of the infrastructure we provide

- [BARTOC](https://bartoc.org/)

  A database of Knowledge Organization Systems and KOS related registries

- [coli-rich]({{ "/coli-rich/" | url }})

  Catalog enrichment via concordances 

- [coli-ana]({{ "/coli-ana/" | url }})

  A tool and a webservice for analysis and decomposition of synthesized DDC numbers - on work
  
- [jskos-server](https://github.com/gbv/jskos-server)

  JSKOS Server implements the JSKOS API web service and storage for JSKOS data

{% endsection %}

{% section %}

## APIs
Several web services are being developed to query information related to knowledge organization systemes in [JSKOS format](https://gbv.github.io/jskos/).

- [Mappings API](https://coli-conc.gbv.de/api/mappings)

  Access to collected mappings and concordances (see [API Base](https://coli-conc.gbv.de/api/))

- [DANTE API](https://api.dante.gbv.de/)

  Access to terminologies and concepts from central terminology service of the VZG

- [Subjects and Occurrences API]({{ "/subjects/" | url }})

  Look up subjects and (co-)occurrences of concepts in library catalogs

- [Wikidata JSKOS API](https://coli-conc.gbv.de/services/wikidata/)

  Access Wikidata in JSKOS format with [wikidata-jskos](https://github.com/gbv/wikidata-jskos)
  
- [Login Server API](https://coli-conc.gbv.de/login/)

  Authentication for the offered services via [Login Server](https://github.com/gbv/login-server)


{% endsection %}

{% section %}

## Data Sets
- [KOS Types]({{ "/publications/kostypes/" | url }})

  Classification of knowledge organization systems. Data extracted from Wikidata

- [KOS Registry]({{ "/terminologies/" | url }})

  Description of knowledge organization systems relevant to project coli-conc. Data extracted from BARTOC

- [Concordance Registry]({{ "/concordances/" | url }})

  Concordances collected and unified in project coli-conc. Data collected manually

- [Wikidata Mappings]({{ "/concordances/wikidata/" | url }})

  Collection of mappings between Wikidata and other systems. Data extracted from Wikidata

- [GND Mappings]({{ "/concordances/gnd/" | url }})

  Collection of mappings between the Integrated Authority File (GND) with other systems. Work in progress

We have unified the access to sources that offer JSKOS data via registries. For more information, see [Data Sources and Registries]({{ "/registry/" | url }}).

{% endsection %}

{% section %}
{% endsection %}
