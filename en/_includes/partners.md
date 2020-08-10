<!-- Using data from global `partners.json` file. -->

{% flexbox "row", "flex-wrap: wrap;" %}
{% for partner in partners.institutions %}
{% flex "1", "padding: 20px 30px;" %}
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

{% button "/partner-projects/", { en: "Projects", de: "Projekte" } | localize, "display: block; margin: 0 auto; width: 200px;" %}
