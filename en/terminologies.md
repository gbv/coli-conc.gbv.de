---
layout: layouts/page
title:
  en: KOS Registry
---

{% section %}

This list contains a collection of knowledge organization systems relevant to project coli-conc. It is a subset of all systems known to coli-conc. It is a subset of the full [KOS Registry](https://github.com/gbv/kos-registry), the set of all systems known to the project (you can find the download to the latest release [here](https://github.com/gbv/kos-registry/releases/latest)). Please use [Cocoda]({{ "/cocoda/" | url }}) to select and browse within the systems!

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>PICA</th>
      <th>MARC</th>
    </tr>
  </thead>
  <tbody>
    {% for scheme in kos %}
    <!-- TODO: Determine via API field after changing Cocoda to use BARTOC -->
    {%- set regExp = r/^(DDC|RVK|BK|GND|BOS|IxTheo)$/ -%}
    <tr>
      <td>
        {%- if regExp.test(scheme.notation[0]) -%}
          <a target="_blank" href="https://coli-conc.gbv.de/cocoda/app/?fromScheme={{ scheme.uri | urlencode }}">
        {%- endif -%}
        {%- if scheme.prefLabel -%}
          {{ scheme.prefLabel.de | default(scheme.prefLabel.en) }}
        {%- else -%}
          ?
        {%- endif -%}
        {%- if scheme.notation[0] %} ({{ scheme.notation[0] }}){%- endif -%}
        {%- if regExp.test(scheme.notation and scheme.notation[0]) -%}
          </a>
        {%- endif -%}
      </td>
      <td>
        <code>{{ scheme.PICAPATH }}</code>
      </td>
      <td>
        {%- set marcfield = scheme.MARCSPEC -%}
        {%- if scheme.uri == "http://bartoc.org/en/node/241" -%}
          {%- set marcfield = "082|083" -%}
        {%- elif scheme.uri == "http://bartoc.org/en/node/496" -%}
          {%- set marcfield = "080" -%}
        {%- elif scheme.identifier -%}
          <!--
            var locid = scheme.identifier.find(id => id.startsWith("http://id.loc.gov/vocabulary/classSchemes/"))
            if (locid) {
              marcfield = '084{$2='+locid.substr(42)+'}'
            }
          -->
        {%- endif -%}
        <code>{{ marcfield }}</code>
      </td>
    </tr>
    {% endfor %}
  <tbody>
</table>

{% endsection %}

{% section %}{% endsection %}
