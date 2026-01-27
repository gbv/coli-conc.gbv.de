---
layout: layouts/index
title:
  en: "Welcome to the Terminology Services Portal"
  de: "Willkommen auf dem Terminologie-Services-Portal"
subtitle:
  en: Services for structured subject indexing of information using controlled vocabularies.
  de: Services für die strukturierte Sacherschließung von Informationen mit kontrollierten Vokabularen
cocodaStartButton:
  en: Start
cocodaInfoButton:
  en: Information
---

{#
{% section "textPadding" %}

{% include locale + "/index-intro.md" %}

{% endsection %}
#}

{% section %}

{% include locale + "/projects.md" %}

{% endsection %}

{% section %}

## [{{ { en: "Additional Services", de: "Zusätzliche Services" } | localize }}]({{ "/services/" | url }})

{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start; margin-top: -10px;" %}
  {% flex %}
  [{% image "/images/services-kos-registry5.svg", "width: 30vw; max-width: 140px; padding: 20px; border: none;", "Software" %}<br>Software]({{ "/publications/#software" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/services-concordance-registry.svg", "width: 30vw; max-width: 140px; padding: 12px; border: none;", "Datasets" %}<br>Datasets]({{ "/services/#data-sets" | url }})
  {% endflex %}
  {% flex %}
  [{% image "/images/services-api.svg", "width: 30vw; max-width: 140px; padding: 7px; border: none;", "APIs" %}<br>APIs]({{ "/services/#apis" | url }})
  {% endflex %}
{% endflexbox %}

{% endsection %}

{% section %}

## [{{ strings.sections.news | localize }}]({{ "/blog/" | url }})
{% div "news" %}
{%- for post in collections.blog | reverse -%}
  <!-- Show 6 latest news. -->
  {% if loop.index0 < 6 %}
    {% div "entry" %}
      {% div "date" %}{{ post.date | date("YYYY-MM-DD") }}{% enddiv %}
      {% div "title" %}
        [{{ post.data.title }}]({{ post.url | url }})
        {% if post.data.originalLanguage %}{% badge post.data.originalLanguage %}{% endif %}
      {% enddiv %}
      {% div "excerpt" %}{{ post.data.excerpt }}{% enddiv %}
    {% enddiv %}
  {% endif %}
{%- endfor -%}
{% enddiv %}
{% if collections.blog.length > 6 %}
  {% div "news-more" %}[{{ { en: "All Posts", de: "Alle Beiträge" } | localize }}]({{ "/blog/" | url }}){% enddiv %}
{% endif %}

{% endsection %}

{#
{% section %}

{% include locale + "/partners.md" %}

{% endsection %}
#}

{% section %}

## [{{ strings.sections.contact | localize }}]({{ "/contact/" | url }})

{% include locale + "/contact.md" %}

{% endsection %}

{% section %}{% endsection %}
