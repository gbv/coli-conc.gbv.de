<!-- Using data from global `partners.json` file. Warning: Code duplication! -->
{% flexbox "row", "flex-wrap: wrap; text-align: center;" %}
{% for partner in partners %}
{% flex "1", "padding: 25px;" %}
{% set image1x = ("/images/partners/" + partner.image) | urla %}
{% set image2x = ("/images/partners/" + partner.image2x | default(partner.image)) | urla %}
[<img src="{{ image1x }}" srcset="{{ image1x }} 1x, {{ image2x }} 2x" sizes="300px" style="max-width: 300px; width: 80%; min-width: 200px;">]({{ partner.url }})
{% endflex %}
{% if loop.index % 2 == 0 %}
{% flexBreakRow %}
{% endif %}
{% endfor %}
{% endflexbox %}
