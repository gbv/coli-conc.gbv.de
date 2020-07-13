---
layout: layouts/page
title: Partners
---

{% section %}

<!-- Using data from global `partners.json` file. Warning: Code duplication! -->
{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
{% for partner in partners %}
{% flex "1", "padding: 25px;" %}
[{% image "/images/partners/" + partner.image, "max-width: 350px; width: 80%; min-width: 200px;" %}]({{ partner.url }})
{% endflex %}
{% if loop.index % 2 == 0 %}
{% flexBreakRow %}
{% endif %}
{% endfor %}
{% endflexbox %}

{% endsection %}
