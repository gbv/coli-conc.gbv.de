<!-- Using data from global `partners.json` file. -->

###### {{ { en: "Projects", de: "Projekte" } | localize }}
{{ {
  en: "Some of the major projects in which coli-conc is involved.",
  de: "Einige wichtige Projekte, in denen coli-conc involviert ist."
} | localize }}

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

###### {{ { en: "Partners", de: "Partner" } | localize }}
{{ {
  en: "Some of coli-conc's major partner institutions.",
  de: "Einige wichtige Partner-Institutionen von coli-conc."
} | localize }}

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
