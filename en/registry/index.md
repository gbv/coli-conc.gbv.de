---
layout: layouts/page
title:
  en: "Data Sources and Registries"
---

{% section %}

Data about Knowledge organization systems and their concordances can be available from many sources. We unify access to diverse data sources, including those with write-access, by mapping their data formats to [JSKOS format](https://gbv.github.io/jskos/). [Cocoda]({{ "/cocoda/" | url }}) organizes access to multiple data sources as **registries**. A registry is an individual source of data with known capabilities (see [Cocoda manual](https://gbv.github.io/cocoda/dev/user-manual-en.html#registries)).

{% endsection %}

{% section %}

###### Supported Registries
See [registries.ndjson]({{ "/registries/registries.ndjson" | urla }}) for full list and metadata.

{% for registry in registriesList %}
- **{{ registry.notation }}** [{{ registry.label }}]({{ registry.uri }})

  {{ registry.description }}
{% endfor %}

{% endsection %}
