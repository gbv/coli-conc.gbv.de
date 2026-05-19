<div class="cc-subtitle">
  <div>
    <p>
      {{ {
        en: "coli-conc provides services for creating mappings between controlled vocabularies, integrating them into the K10plus catalog, and supporting structured subject indexing of information. It helps promote the interoperability of library knowledge organization systems (KOS).",
        de: "coli-conc bietet Dienste zur Erstellung von Mappings zwischen kontrollierten Vokabularen, zur Einspielung in den K10plus-Katalog sowie zur strukturierten Sacherschließung von Informationen. Damit fördert coli-conc die Interoperabilität bibliothekarischer Wissensorganisationssysteme (KOS)."
      } | localize }}
    </p>
  </div>
</div>

<div class="cards-bg-featured">
  <div class="cc-services-section">
    <div>
      <h2>{{ { en: "coli-conc Services", de: "coli-conc Services" } | localize }}</h2>
    </div>
  </div>

  <div class="cards-row">
    {%- set prefix = "/de" if locale == "de" else "" -%}
    {%- macro siteUrl(url, localize = true) -%}
      {%- set path = "" -%}
      {%- if url and url.startsWith("https://coli-conc.gbv.de/") -%}
        {%- set path = url | replace("https://coli-conc.gbv.de", "") -%}
      {%- elif url and url.startsWith("/") -%}
        {%- set path = url -%}
      {%- endif -%}
      {%- if path -%}
        {%- if localize and prefix and not path.startsWith("/de/") -%}
          {{- prefix ~ path -}}
        {%- else -%}
          {{- path -}}
        {%- endif -%}
      {%- else -%}
        {{- url -}}
      {%- endif -%}
    {%- endmacro -%}

    {%- for partner in partners.projects -%}

      {%- if loop.index == 5 -%}
        <div class="related-services-section">
          <h2>{{ { en: "Related Services", de: "Verwandte Services" } | localize }}</h2>
        </div>
      {%- endif -%}

      {%- if loop.index == 8 -%}
        <div class="main-vocabulary-section">
          <h2>{{ { en: "K10plus Main Vocabulary", de: "K10plus Hauptvokabulare" } | localize }}</h2>
        </div>
      {%- endif -%}

      {%- set text = partner.text | localize -%}
      {%- set description = partner.description | localize -%}
      {%- set raw_url = partner.url | localize -%}
      {%- set partner_url = siteUrl(raw_url) -%}

      <div class="project-card">
        <div class="project-card-header">
          {%- if text | trim == "Metadata / Vocabulary Hosting Services" -%}
            <span class="project-card-title font-size-large">{{ text }}</span>
          {%- else -%}
            <a href="{{ partner_url }}" class="project-card-title font-size-large">{{ text }}</a>
          {%- endif -%}
        </div>

        {%- set btns = partner.buttons -%}
        {%- if btns -%}
          <div class="project-card-actions">

            {# Info-Button: unterstützt String oder { de, en } #}
            {%- if btns.info -%}
              {%- if btns.info is string -%}
                {%- set infoUrl = btns.info -%}
              {%- else -%}
                {%- set infoUrl = btns.info[locale] -%}
              {%- endif -%}

              {%- if infoUrl -%}
                {%- if "/app/" in infoUrl -%}
                  <a href="{{ siteUrl(infoUrl, false) }}" class="button">Info</a>
                {%- else -%}
                  <a href="{{ siteUrl(infoUrl) }}" class="button">Info</a>
                {%- endif -%}
              {%- endif -%}
            {%- endif -%}

            {# Start-Button #}
            {%- if btns.start -%}
              {%- if "/app/" in btns.start -%}
                <a href="{{ siteUrl(btns.start, false) }}" class="button">Start</a>
              {%- else -%}
                <a href="{{ siteUrl(btns.start) }}" class="button">Start</a>
              {%- endif -%}
            {%- endif -%}

            {# WebDewey Search #}
            {%- if btns.webDeweySearch -%}
              <a href="{{ btns.webDeweySearch }}" class="button button-webdewey-search">
                {{ { de: "WebDewey Suche (frei)", en: "WebDewey Search (Open)" } | localize }}
              </a>
            {%- endif -%}

            {# WebDewey Deutsch #}
            {%- if btns.webDeweyDeutsch -%}
              <a href="{{ btns.webDeweyDeutsch }}" class="button button-webdewey-deutsch">
                {{ { de: "WebDewey Deutsch (Login)", en: "WebDewey Deutsch (Login)" } | localize }}
              </a>
            {%- endif -%}

          </div>
        {%- endif -%}

        <p class="project-card-description">{{ description }}</p>

        {%- if partner_url and ("cocoda" in partner_url) -%}
          <ul class="project-card-list">
            <li><a href="{{ prefix ~ '/cocoda/' }}">Cocoda</a></li>
            <li><a href="{{ prefix ~ '/terminologies/' }}">KOS Registry</a></li>
            <li><a href="{{ prefix ~ '/concordances/' }}">Concordance Registry</a></li>
            <li><a href="{{ prefix ~ '/ccmapper/' }}">cc-mapper</a></li>
          </ul>

        {%- elif "vocabulary hosting services" in (text | string | lower) -%}
          <ul class="project-card-list">
            <li><a href="https://dante.gbv.de/">DANTE</a></li>
            <li><a href="https://skosmos.bartoc.org/en/">BARTOC Skosmos</a></li>
          </ul>
        
         {%- elif "vocabulary metadata services" in (text | string | lower) -%}
          <ul class="project-card-list">
            <li><a href="https://bartoc.org/">BARTOC</a></li>
            <li><a href="https://uri.gbv.de/terminology/">VZG Terminology</a></li>
          </ul>
        {%- endif -%}

        {%- if partner.image -%}
          {%- set img_alt = text ~ " screenshot" -%}
          {%- if partner.imageAlt -%}
            {%- set img_alt = partner.imageAlt | localize -%}
          {%- endif -%}

          {%- if partner.image is string -%}
            {%- set img_src = partner.image -%}
          {%- else -%}
            {%- set img_src = partner.image | localize -%}
          {%- endif -%}

          <div class="project-card-image">
            <img src="{{ img_src }}" alt="{{ img_alt }}" loading="lazy">
          </div>
        {%- endif -%}
      </div>

    {%- endfor -%}

  </div>
</div>
