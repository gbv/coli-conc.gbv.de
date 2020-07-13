---
layout: layouts/index
title: Welcome to coli-conc
subtitle: Infrastructure to facilitate management and exchange of concordances between library knowledge organization systems
cocodaStartButton: start here
css:
- index
---

{% section "dark" %}

coli-conc provides free [services](#services) to access to and exchange of knowledge organisation systems (KOS) and their mappings. This includes:

- uniform access to knowledge organization systems and their metadata with [JSKOS format](https://gbv.github.io/jskos/)
- an open concordance registry to share concept mappings
- the mapping tool [Cocoda]({{ "/cocoda/" | url }}) to easily create and evaluate mappings
- free [software]({{ "/publications/software/" | url }}) to import and export KOS and mapping data

The current focus is on library classifications Dewey Decimal Classification (DDC), Regensburg Classification (RVK), and Basisklassifikation (BK) to build complete concordances for German libraries. The infrastructure can also be used for other systems such as Wikidata and GND.

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

<!-- Using data from global `partners.json` file. Warning: Code duplication! -->
{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
{% for partner in partners %}
{% flex "1", "padding: 40px 25px;" %}
[{% image "/images/partners/" + partner.image, "max-width: 500px; width: 100%; min-width: 200px;" %}]({{ partner.url }})
{% endflex %}
{% if loop.index % 2 == 0 %}
{% flexBreakRow %}
{% endif %}
{% endfor %}
{% endflexbox %}

{% endsection %}

{% section "dark" %}

#### {{ strings.sections.contact | localize }}

{% flexbox "row", "text-align: center;" %}

{% flex %}{% endflex %}
{% flex %}{% icon "user", "75%" %}{% endflex %}
{% flex %}{% icon "user", "75%" %}{% endflex %}
{% flex %}{% icon "user", "75%" %}{% endflex %}
{% flex %}{% endflex %}

{% endflexbox %}

{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
{% flex %}
**General**

coli-conc@gbv.de
{% endflex %}
{% flex %}
**Project Lead**

Uma Balakrishnan

(balakrishnan@gbv.de)
{% endflex %}
{% flex %}
**Technical Coordination**

Dr. Jakob Voß

(voss@gbv.de)
{% endflex %}
{% flex %}
**Software Development**

Stefan Peters

(peters@gbv.de)
{% endflex %}
{% endflexbox %}

{% endsection %}
