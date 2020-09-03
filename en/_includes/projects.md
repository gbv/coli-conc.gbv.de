
###### {{ { en: "Projects", de: "Projekte" } | localize }}

{{ {
  en: "Some of the major projects in which coli-conc is involved.",
  de: "Einige wichtige Projekte, in denen coli-conc involviert ist."
} | localize }}

{% div "", "display: flex; flex-direction: row; flex-wrap: wrap; align-items: flex-start; justify-content: space-evenly; margin-bottom: 10px;" %}
  {% for partner in partners.projects %}
    {% div "", "flex: 1 0 255px; max-width: 450px; margin: 12px 10px; padding-left: 20px; border-left: 1px solid black;" %}
      {% set text = partner.text | localize %}
      {% set description = partner.description | localize %}
      {% div "font-size-large", "margin: -25px 0 -15px 0;" %}
        [{{ text }}]({{ partner.url | url }})
      {% enddiv %}
      {% div "", "margin-bottom: -10px;" %}
        {{ description }}
      {% enddiv %}
    {% enddiv %}
  {% endfor %}
{% enddiv %}
