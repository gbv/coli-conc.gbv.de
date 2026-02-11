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

    {% set prefix = "/de" if locale == "de" else "" %}

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

        {# Localize coli-conc pages: EN => /..., DE => /de/... #}
        {% if partner.url and partner.url.startsWith("https://coli-conc.gbv.de/") %}
          {% set path = partner.url | replace("https://coli-conc.gbv.de", "") %}
          {% set partner_url = prefix ~ path %}
        {% else %}
          {% set partner_url = partner.url %}
        {% endif %}

        {# Helper variable for the title conditional below #}
        {% set text_norm = (text | string | trim | lower) %}

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

        {% if btns %}
          <div class="project-card-actions">

            {# Info button: localize coli-conc pages, but keep /app/ links unchanged #}
            {% if btns.info %}
              {% if "/app/" in btns.info %}
                <a href="{{ btns.info }}" class="button">Info</a>
              {% elif btns.info.startsWith("https://coli-conc.gbv.de/") %}
                {% set infoPath = btns.info | replace("https://coli-conc.gbv.de", "") %}
                <a href="{{ prefix ~ infoPath }}" class="button">Info</a>
              {% else %}
                <a href="{{ btns.info }}" class="button">Info</a>
              {% endif %}
            {% endif %}

            {# Start button: keep /app/ links unchanged, localize other coli-conc pages #}
            {% if btns.start %}
              {% if "/app/" in btns.start %}
                <a href="{{ btns.start }}" class="button">Start</a>
              {% elif btns.start.startsWith("https://coli-conc.gbv.de/") %}
                {% set startPath = btns.start | replace("https://coli-conc.gbv.de", "") %}
                <a href="{{ prefix ~ startPath }}" class="button">Start</a>
              {% else %}
                <a href="{{ btns.start }}" class="button">Start</a>
              {% endif %}
            {% endif %}

          </div>
        {% endif %}

        <p class="project-card-description">{{ description }}</p>

        {# Render project-specific related links based on project type #}
        {% if partner_url and ("cocoda" in partner_url) %}
          <ul class="project-card-list">
            <li><a href="{{ prefix ~ '/cocoda/' }}">Cocoda</a></li>
            <li><a href="{{ prefix ~ '/terminologies/' }}">KOS Registry</a></li>
            <li><a href="{{ prefix ~ '/concordances/' }}">Concordance Registry</a></li>
            <li><a href="{{ prefix ~ '/ccmapper/' }}">CCMapper</a></li>
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
              src="{{ img_src }}"
              alt="{{ img_alt }}"
              loading="lazy"
            >
          </div>
        {% endif %}

      </div>

    {% endfor %}

  </div>
</div>
