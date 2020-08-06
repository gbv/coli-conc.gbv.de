<!-- Using data from global `partners.json` file. -->

{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start;" %}

{% flex "2", "text-align: left;" %}
## {{ { en: "Institutions", de: "Institutionen" } | localize }}

{% flexbox "row", "flex-wrap: wrap;" %}
{% for partner in partners.institutions %}
{% flex "1", "padding: 15px;" %}
{% set image1x = ("/images/partners/" + partner.image) | urla %}
{% set image2x = ("/images/partners/" + partner.image2x | default(partner.image)) | urla %}
{% set text = partner.text | localize %}
[<img alt="{{ text }}" src="{{ image1x }}" srcset="{{ image1x }} 1x, {{ image2x }} 2x" sizes="300px" style="max-width: 300px; width: 90%; min-width: 200px;">]({{ partner.url }})
{% endflex %}
{% if loop.index % 2 == 0 %}
{% flexBreakRow %}
{% endif %}
{% endfor %}
{% endflexbox %}

{% endflex %}

{% flex "1", "text-align: right;" %}
## {{ { en: "Projects", de: "Projekte" } | localize }}

{% for partner in partners.projects %}
{% set image1x = ("/images/partners/" + partner.image) | urla %}
{% set image2x = ("/images/partners/" + partner.image2x | default(partner.image)) | urla %}
{% set text = partner.text | localize %}
{% div "font-size-medium", "margin: 50px 0 20px 0;" %}
[{% if partner.image %}<img alt="{{ text }}" src="{{ image1x }}" srcset="{{ image1x }} 1x, {{ image2x }} 2x" sizes="300px" style="max-width: 300px; width: 90%; min-width: 200px; margin: 15px;">{% else %}{{ text }}{% endif %}]({{ partner.url | url }})
{% enddiv %}
{% endfor %}

{% endflex %}

{% endflexbox %}
