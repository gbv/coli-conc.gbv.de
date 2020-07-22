---
layout: layouts/page
title:
  en: KOS Registry
---

{% section %}

<!-- TODO: Link kos file and Cocoda properly -->
This list contains a collection of knowledge organization systems relevant to project coli-conc. It is a subset of all systems known to coli-conc. The list is also available [for download](kos.ndjson) (JSKOS Concept Schemes). It is a subset of [kos-registry](https://github.com/gbv/kos-registry), the set of all systems known to the project. Please use [Cocoda](../cocoda/) to select and browse within the systems!

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
    {%- set regExp = r/^(DDC|RVK|BK|GND|BOS|ixtheo)$/ -%}
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

{% section "dark" %}{% endsection %}
