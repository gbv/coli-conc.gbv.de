---
layout: layouts/page
title:
  en: KOS Registry
---

{% section %}

This list contains a collection of knowledge organization systems relevant to project coli-conc. It is a subset of [BARTOC](https://bartoc.org/) (see [the list there](http://bartoc.org/vocabularies?partOf=http://bartoc.org/en/node/18926)). Please use [Cocoda]({{ "/cocoda/" | url }}) to browse within the systems!

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
    <tr>
      <td>
        <a target="_blank" href="{{ scheme.uri }}">
        {%- if scheme.prefLabel -%}
          {{ scheme.prefLabel.de | default(scheme.prefLabel.en) }}
        {%- else -%}
          ?
        {%- endif -%}
        {%- if scheme.notation[0] %} ({{ scheme.notation[0] }}){%- endif -%}
        </a>
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
