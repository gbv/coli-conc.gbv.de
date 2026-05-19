{% section %}

{% include "en/projects.md" %}

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

{% section %}

## [{{ strings.sections.contact | localize }}]({{ "/contact/" | url }})

{% include "en/contact.md" %}

{% endsection %}

{% section %}{% endsection %}
