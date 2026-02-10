<div class="cards-bg-featured">
  <div class="cc-services-section">
    <h2>{{ { en: "coli-conc Services", de: "coli-conc Services" } | localize }}</h2>
    <p class="cc-services_subtitle">
      {{ {
        en: "Enables interoperability of library knowledge organization systems (KOS).",
        de: "Ermöglicht die Interoperabilität von bibliothekarischen Wissensorganisationssystemen (KOS)."
      } | localize }}
    </p>
  </div>

  <div class="cards-row">
    {# Loop through the partners.projects array. The variable "partner" represents the current project item. #}
    {% for partner in partners.projects %}
      {# Insert section heading before the 4th project #}
      {% if loop.index == 4 %}
        <div class="related-services-section">
          <h2>{{ { en: "Related Services", de: "Verwandte Services" } | localize }}</h2>
        </div>
      {% endif %}

      <div class="project-card">

        {# Localize partner text/description and prepare a clean URL for later use in the template #}
        {% set text = partner.text | localize %}
        {% set description = partner.description | localize %}
        {% set partner_url = partner.url | url %}

        {# Helper variable for the title conditional below #}
        {% set text_norm = (text | string | trim | lower) %}

        {# Render title with special handling for "Metadata / Vocabulary Hosting Services" #}
        <div class="project-card-header">
          {% if text|trim == "Metadata / Vocabulary Hosting Services" %}
            <span class="project-card-title font-size-large">{{ text }}</span>
          {% else %}
          <a href="{{ partner_url }}" class="project-card-title font-size-large">
            {{ text }}
          </a>
          {% endif %}
        </div>

        {# Prepare and render project action buttons #}
        {% set btns = partner.buttons %}

        {# Render action buttons if button data is available.
        Each button (Info / Start) is rendered only if its URL exists.
        #}
        {% if btns %}
          <div class="project-card-actions">
            {% if btns.info %}
              <a href="{{ btns.info }}" class="button">Info</a>
            {% endif %}
            {% if btns.start %}
              <a href="{{ btns.start }}" class="button">Start</a>
            {% endif %}
          </div>
        {% endif %}

        {# Render the localized project description #}
        <p class="project-card-description">{{ description }}</p>

        {# Render project-specific related links based on project type #}
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

        {# Show project image with fallback and optional custom alt text #}
        {% if partner.image %}
          {% set img_alt = text ~ " screenshot" %}
          {% if partner.imageAlt %}
            {% set img_alt = partner.imageAlt | localize %}
          {% endif %}

          {% if partner.image is string %}
            {% set img_src = partner.image %}
          {% else %}
            {% set img_src = partner.image | localize %}
          {% endif %}

          <div class="project-card-image">
            <img
              src="{{ img_src | url }}"
              alt="{{ img_alt }}"
              loading="lazy"
            >
          </div>
        {% endif %}
      </div>
    {% endfor %}
  </div>
</div>
