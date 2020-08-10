---
layout: layouts/page
title:
  en: Projects
  de: Projekte
subtitle:
  en: Related projects of some of our partners
  de: Verwandte Projekte einiger unserer Partner
---

{% section %}

{% for partner in partners.projects %}
{% set image1x = ("/images/partners/" + partner.image) | urla %}
{% set image2x = ("/images/partners/" + partner.image2x | default(partner.image)) | urla %}
{% set text = partner.text | localize %}
{% set description = partner.description | localize %}
{% div "font-size-large", "margin: 40px 0 10px 0; margin-left: 20px;" %}
- [{% if partner.image %}<img alt="{{ text }}" src="{{ image1x }}" srcset="{{ image1x }} 1x, {{ image2x }} 2x" sizes="300px" style="max-width: 300px; width: 90%; min-width: 200px; margin: 15px;">{% else %}{{ text }}{% endif %}]({{ partner.url | url }})

  <span class="font-size-normal">{{ description }}</span>
{% enddiv %}
{% endfor %}

{% endsection %}

{% section %}{% endsection %}
