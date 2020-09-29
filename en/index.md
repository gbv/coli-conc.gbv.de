---
layout: layouts/index
title:
  en: "Welcome to <span style='white-space: nowrap;'>coli-conc</span>"
  de: "Willkommen bei <span style='white-space: nowrap;'>coli-conc</span>"
subtitle:
  en: Infrastructure to facilitate management and exchange of concordances between library knowledge organization systems
  de: Verwaltung und Bereitstellung von Konkordanzen zwischen bibliothekarischen Wissensorganisationsystemen
cocodaStartButton:
  en: Start
cocodaInfoButton:
  en: Information
---

{% section %}

{% include locale + "/index-intro.md" %}

{% endsection %}

{% section %}

## [{{ strings.sections.news | localize }}]({{ "/blog/" | url }})
{% div "news" %}
{%- for post in collections.blog | reverse -%}
  <!-- Show 6 latest news. -->
  {% if loop.index0 < 6 %}
    {% div "entry" %}
      {% div "date" %}{{ post.date | date("YYYY-MM-DD") }}{% enddiv %}
      {% div "title" %}[{{ post.data.title }}]({{ post.url | url }}){% enddiv %}
      {% div "excerpt" %}{{ post.data.excerpt }}{% enddiv %}
    {% enddiv %}
  {% endif %}
{%- endfor -%}
{% enddiv %}
{% if collections.blog.length > 6 %}
  {% div "news-more" %}[{{ { en: "All Posts", de: "Alle Beiträge" } | localize }}]({{ "/blog/" | url }}){% enddiv %}
{% endif %}

{% endsection %}

{% section %}

## [{{ strings.sections.services | localize }}]({{ "/services/" | url }})

{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start; margin-top: -10px;" %}
  {% flex %}
  [{% image "/images/services-kos-registry5.svg", "width: 30vw; max-width: 140px; padding: 20px; border: none;", "KOS Registry" %}<br>{{ strings.sections.services.kosRegistry | localize }}]({{ "/terminologies/" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/services-concordance-registry.svg", "width: 30vw; max-width: 140px; padding: 12px; border: none;", "Concordance Registry" %}<br>{{ strings.sections.services.concordanceRegistry | localize }}]({{ "/concordances/" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/services-api.svg", "width: 30vw; max-width: 140px; padding: 7px; border: none;", "APIs" %}<br>APIs]({{ "/services/#apis" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/ellipsis.svg", "width: 30vw; max-width: 140px; padding: 30px; border: none;", "more services" %}<br>{{ { en: "... and more", de: "... und mehr" } | localize }}]({{ "/services/" | url }})
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

## [{{ strings.sections.contact | localize }}]({{ "/contact/" | url }})

{% include locale + "/contact.md" %}

{% endsection %}

{% section %}{% endsection %}
