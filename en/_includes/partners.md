<!-- Using data from global `partners.json` file. -->

###### {{ { en: "Partners", de: "Partner" } | localize }}

{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
  {% for partner in partners.institutions %}
    {% set image1x = ("/images/partners/" + partner.image) | urla %}
    {% set image2x = ("/images/partners/" + partner.image2x | default(partner.image)) | urla %}
    {% set text = partner.text | localize %}
    {% set flexStyle = "padding: 15px 10px;" %}
    {# Empty text = divider #}
    {% if text == "" %}
      {% set flexStyle = "max-height: 1px;" %}
    {% endif %}
    {% flex "1 0 " + partner.flexBase, flexStyle %}
      {% if partner.image %}
        [<img alt="{{ text }}" src="{{ image1x }}" srcset="{{ image1x }} 1x, {{ image2x }} 2x" sizes="300px" style="min-width: {{ partner.imageWidth | default('100px') }}; max-width: {{ partner.imageWidth | default('100%') }};">]({{ partner.url }})
      {% endif %}
    {% endflex %}
  {% endfor %}
{% endflexbox %}
