---
layout: layouts/page
title:
  en: News and Blog
  de: Neuigkeiten und Blog
pagination:
  data: collections.blog
  size: 9
  alias: posts
  reverse: true
permalink: "/blog/{% if pagination.pageNumber > 0 %}page-{{ pagination.pageNumber + 1 }}/{% endif %}index.html"
---

{% section %}

{% div "news" %}
{%- for post in pagination.items -%}
  {% div "entry" %}
    {% div "date" %}{{ post.date | date("YYYY-MM-DD") }}{% enddiv %}
    {% div "title" %}
      [{{ post.data.title }}]({{ post.url | url }})
      {% if post.data.originalLanguage %}{% badge post.data.originalLanguage %}{% endif %}
    {% enddiv %}
    {% div "excerpt" %}{{ post.data.excerpt }}{% enddiv %}
  {% enddiv %}
{%- endfor -%}
{% enddiv %}

{% if pagination.href.previous or pagination.href.next %}
<br>
{% set previousPage = { en: "Previous Page", de: "Vorherige Seite" } | localize %}
{% set nextPage = { en: "Next Page", de: "Nächste Seite" } | localize %}

{% if pagination.href.previous %}[{{ previousPage }}]({{ pagination.href.previous | url }}){% else %}{{ previousPage }}{% endif %}
|
{% if pagination.href.next %}[{{ nextPage }}]({{ pagination.href.next | url }}){% else %}{{ nextPage }}{% endif %}
{% endif %}

{% endsection %}

{% section %}{% endsection %}
