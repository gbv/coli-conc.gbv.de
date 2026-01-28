
{#
## {{ { en: "Projects", de: "Projekte" } | localize }}

{{ {
  en: "Some of the major projects in which coli-conc is involved.",
  de: "Einige wichtige Projekte, in denen coli-conc involviert ist."
} | localize }}
#}

{% div "", "display: flex; flex-direction: row; flex-wrap: wrap; align-items: flex-start; justify-content: space-evenly; margin-bottom: 10px;" %}
  {% for partner in partners.projects %}
    {% div "", "flex: 1 0 calc(33% - 20px); min-width: 255px; max-width: 450px; margin: 12px 10px; padding-left: 20px; border-left: 1px solid black;" %}
      {% set text = partner.text | localize %}
      {% set description = partner.description | localize %}
      {% set partner_url = partner.url | url %}
      {% set text_norm = (text | string | trim | lower) %}

      {% div "font-size-large", "margin: 0 0 6px 0; line-height: 1.25;" %}
        {% if text_norm == "vocabulary hosting services" %}
          <span class="project-card-title">{{ text }}</span>
        {% else %}
          <a href="{{ partner_url }}" class="project-card-title">{{ text }}</a>
        {% endif %}
      {% enddiv %}

      <p style="margin: 0;">
        {{ description }}
      </p>

      {% if partner_url and ("cocoda" in partner_url) %}
        <ul class="project-card-list">
          <li><a href="https://coli-conc.gbv.de/cocoda/">Cocoda</a></li>
          <li><a href="https://coli-conc.gbv.de/terminologies/">KOS Registry</a></li>
          <li><a href="https://coli-conc.gbv.de/concordances/">Concordance Registry</a></li>
          <li><a href="https://coli-conc.gbv.de/ccmapper/">CCMapper</a></li>
        </ul>

      {% elif "vocabulary hosting services" in (text | string | lower) %}
        <ul class="project-card-list">
          <li><a href="https://bartoc.org">BARTOC</a></li>
          <li><a href="https://dante.gbv.de/">DANTE</a></li>
          <li><a href="https://uri.gbv.de/terminology">VZG terminology</a></li>
        </ul>
      {% endif %}

   {% enddiv %}
  {% endfor %}
{% enddiv %}