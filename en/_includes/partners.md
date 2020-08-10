<!-- Using data from global `partners.json` file. -->

###### {{ { en: "Partners", de: "Partner" } | localize }}

{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
{% for partner in partners.institutions %}
{% flex "1", "padding: 20px 30px;" %}
{% set image1x = ("/images/partners/" + partner.image) | urla %}
{% set image2x = ("/images/partners/" + partner.image2x | default(partner.image)) | urla %}
{% set text = partner.text | localize %}
[<img alt="{{ text }}" src="{{ image1x }}" srcset="{{ image1x }} 1x, {{ image2x }} 2x" sizes="300px" style="max-width: 220px; width: 80%; min-width: 150px;">]({{ partner.url }})
{% endflex %}
{% if loop.index % 2 == 0 %}
{% flexBreakRow %}
{% endif %}
{% endfor %}
{% endflexbox %}
