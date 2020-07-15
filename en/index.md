---
layout: layouts/index
title:
  en: Welcome to coli-conc
  de: Willkommen bei coli-conc
subtitle:
  en: Infrastructure to facilitate management and exchange of concordances between library knowledge organization systems
  de: Verwaltung und Bereitstellung von Konkordanzen zwischen bibliothekarischen Wissensorganisationsystemen
cocodaStartButton:
  en: start here
  de: starte hier
---

{% section "dark" %}

{% include locale + "/index-intro.md" %}

{% endsection %}

{% section "light" %}

#### {{ strings.sections.news | localize }}
{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
{%- for post in collections.news | reverse -%}
  <!-- Show 6 latest news. -->
  {% if loop.index0 < 6 %}
  {% flex %}
  {{ post.date | date("YYYY-MM-DD") }}

  [{{ post.data.title }}]({{ post.url | url }})

  {{ post.data.excerpt }}
  {% endflex %}
  {% endif %}
  {% if loop.index0 == 6 %}
  {% flex %}
  [All Posts]({{ "/blog/" | url }})
  {% endflex %}
  {% endif %}
{%- endfor -%}
{% endflexbox %}

{% endsection %}

{% section "dark" %}

#### {{ strings.sections.services | localize }}

### Applications
- [Cocoda]({{ "/cocoda/" | url }})

  Mapping Tool

### Data Sets
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

### APIs
Several web services are being developed to query information related to knowledge organization systemes in [JSKOS format](https://gbv.github.io/jskos/).

- [DANTE API](https://api.dante.gbv.de/)

  Access to terminologies and concepts from central terminology service of VZG.

- [Mappings API](https://coli-conc.gbv.de/api/mappings)

  Access to collected mappings and concordances.

- [Occurrences API](https://coli-conc.gbv.de/occurrences/)

  Look up occurrences and co-occurrences of concepts in library catalogs.

- [Wikidata JSKOS API](https://coli-conc.gbv.de/services/wikidata/)

  Access Wikidata in JSKOS format with [wikidata-jskos](https://github.com/gbv/wikidata-jskos).

{% endsection %}

{% section "light" %}

#### {{ strings.sections.partners | localize }}

{% include locale + "/partners.md" %}

{% endsection %}

{% section "dark" %}

#### {{ strings.sections.contact | localize }}

{% include locale + "/contact.md" %}

{% endsection %}
