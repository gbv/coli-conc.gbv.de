---
layout: layouts/page
title: News and Blog
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
  <!-- Show 6 latest news. -->
  {% if loop.index0 < 6 %}
  {% flex %}
  {{ post.date | date("YYYY-MM-DD") }}

  [{{ post.data.title }}]({{ post.url | url }})

  {{ post.data.excerpt }}
  {% endflex %}
  {% endif %}
{%- endfor -%}
{% endflexbox %}

{% if pagination.href.previous or pagination.href.next %}
<br>

{% if pagination.href.previous %}[Previous Page]({{ pagination.href.previous | url }}){% else %}Previous Page{% endif %}
|
{% if pagination.href.next %}[Next Page]({{ pagination.href.next | url }}){% else %}Next Page{% endif %}
{% endif %}

{% endsection %}

{% section "dark" %}{% endsection %}
