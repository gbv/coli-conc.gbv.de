<!-- Using data from global `partners.json` file. -->

{% flexbox "row", "flex-wrap: wrap; text-align: center; align-items: flex-start;" %}

{% flex "2.5", "text-align: left; margin-right: 30px;" %}
## {{ { en: "Institutions", de: "Institutionen" } | localize }}

{% flexbox "row", "flex-wrap: wrap;" %}
{% for partner in partners.institutions %}
{% flex "1", "padding: 10px 20px 10px 0;" %}
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

{% flex "1", "flex-basis: 250px; text-align: left;" %}
## {{ { en: "Projects", de: "Projekte" } | localize }}

{% for partner in partners.projects %}
{% set image1x = ("/images/partners/" + partner.image) | urla %}
{% set image2x = ("/images/partners/" + partner.image2x | default(partner.image)) | urla %}
{% set text = partner.text | localize %}
{% div "font-size-large", "margin: 40px 0 10px 0; margin-left: 20px;" %}
[{% if partner.image %}<img alt="{{ text }}" src="{{ image1x }}" srcset="{{ image1x }} 1x, {{ image2x }} 2x" sizes="300px" style="max-width: 300px; width: 90%; min-width: 200px; margin: 15px;">{% else %}{{ text }}{% endif %}]({{ partner.url | url }})
{% enddiv %}
{% endfor %}

{% endflex %}

{% endflexbox %}
