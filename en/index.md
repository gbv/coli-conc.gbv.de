---
layout: layouts/index
title:
  en: Welcome to coli-conc
  de: Willkommen bei coli-conc
subtitle:
  en: Infrastructure to facilitate management and exchange of concordances between library knowledge organization systems.<br>A service provided by Verbundzentrale des GBV (VZG).
  de: Verwaltung und Bereitstellung von Konkordanzen zwischen bibliothekarischen Wissensorganisationsystemen.<br>Ein Service der Verbundzentrale des GBV (VZG).
cocodaStartButton:
  en: Start
cocodaInfoButton:
  en: Information
---

{% section %}

{% include locale + "/index-intro.md" %}

{% endsection %}

{% section %}

###### [{{ strings.sections.news | localize }}]({{ "/blog/" | url }})
{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start;" %}
{%- for post in collections.blog | reverse -%}
  <!-- Show 6 latest news. -->
  {% if loop.index0 < 6 %}
  {% flex "1", "flex-basis: 300px;" %}
  <span class="font-weight-bold">{{ post.date | date("YYYY-MM-DD") }}</span>

  [{{ post.data.title }}]({{ post.url | url }})

  {{ post.data.excerpt }}
  {% endflex %}
  {% endif %}
  {% if loop.index0 == 6 %}
  {% flex "1", "flex-basis: 300px;" %}
  <p>&#8203;</p>

  [All Posts]({{ "/blog/" | url }})
  {% endflex %}
  {% endif %}
{%- endfor -%}
{% endflexbox %}

{% endsection %}

{% section %}

###### [{{ strings.sections.services | localize }}]({{ "/services/" | url }})

{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start;" %}
  {% flex %}
  [{% image "/images/services-kos-registry5.svg", "width: 13vw; padding: 2vw; border: none;", "KOS Registry" %}<br>{{ strings.sections.services.kosRegistry | localize }}]({{ "/terminologies/" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/services-concordance-registry.svg", "width: 13vw; padding: 1vw; border: none;", "Concordance Registry" %}<br>{{ strings.sections.services.concordanceRegistry | localize }}]({{ "/concordances/" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/services-api.svg", "width: 13vw; padding: 1vw; border: none;", "APIs" %}<br>APIs]({{ "/services/#apis" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/ellipsis.svg", "width: 13vw; padding: 3vw; border: none;", "more services" %}<br>{{ { en: "... and more", de: "... und mehr" } | localize }}]({{ "/services/" | url }})
  {% endflex %}
{% endflexbox %}

{% endsection %}

{% section %}

{% include locale + "/partners.md" %}

{% endsection %}

{% section %}

{% include locale + "/projects.md" %}

{% endsection %}

{% section %}

###### [{{ strings.sections.contact | localize }}]({{ "/contact/" | url }})

{% include locale + "/contact.md" %}

{% endsection %}

{% section %}{% endsection %}
