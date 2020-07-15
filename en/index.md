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

#### [{{ strings.sections.news | localize }}]({{ "/blog/" | url }})
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

#### [{{ strings.sections.services | localize }}]({{ "/services/" | url }})

{% set servicesText %}
{% include locale + "/services-applications.md" %}
{% include locale + "/services-datasets.md" %}
{% include locale + "/services-apis.md" %}
{% endset %}

{{ servicesText | replace("####", "###") }}

{% endsection %}

{% section "light" %}

#### [{{ strings.sections.partners | localize }}]({{ "/partners/" | url }})

{% include locale + "/partners.md" %}

{% endsection %}

{% section "dark" %}

#### [{{ strings.sections.contact | localize }}]({{ "/contact/" | url }})

{% include locale + "/contact.md" %}

{% endsection %}
