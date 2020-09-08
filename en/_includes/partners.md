<!-- Using data from global `partners.json` file. -->

###### {{ { en: "Partners", de: "Partner" } | localize }}

<p class="text-center">
  <a href="https://www.gbv.de/Verbundzentrale{% if locale == "en" %}-en{% endif %}" target="_blank">
    <img
      src="{{ '/images/vzg-600px.png' | urla }}"
      srcset="{{ '/images/vzg-300px.png' | urla }} 300w, {{ '/images/vzg-600px.png' | urla }} 600w"
      sizes="300px"
      alt="Verbundzentrale des GBV (VZG) Logo">
  </a>
  {% div "text-center" %}
    **coli-conc** is a project of [Verbundzentrale des GBV (VZG)](https://www.gbv.de/).
  {% enddiv %}
</p>

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
