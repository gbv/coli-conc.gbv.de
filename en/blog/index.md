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

{% section "text-center" %}

{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
{%- for post in pagination.items -%}
  {% flex %}
  {{ post.date | date("YYYY-MM-DD") }}

  [{{ post.data.title }}]({{ post.url | url }})

  {{ post.data.excerpt }}
  {% endflex %}
{%- endfor -%}
{% endflexbox %}

{% if pagination.href.previous or pagination.href.next %}
<br>
{% set previousPage = { en: "Previous Page", de: "Vorherige Seite" } | localize %}
{% set nextPage = { en: "Next Page", de: "Nächste Seite" } | localize %}

{% if pagination.href.previous %}[{{ previousPage }}]({{ pagination.href.previous | url }}){% else %}{{ previousPage }}{% endif %}
|
{% if pagination.href.next %}[{{ nextPage }}]({{ pagination.href.next | url }}){% else %}{{ nextPage }}{% endif %}
{% endif %}

{% endsection %}

{% section "dark" %}
#### Feeds
- {{ { en: "Important News", de: "Wichtige Neuigkeiten" } | localize }}: [RSS]({{ "/rss/news.xml" | url }})
- {{ { en: "All Posts", de: "Alle Beiträge" } | localize }}: [RSS]({{ "/rss/blog.xml" | url }})

{% endsection %}
