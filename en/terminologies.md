---
layout: layouts/page
subtitle: "[![Status](https://coli-conc-status.fly.dev/api/badge/6/status)](https://coli-conc-status.fly.dev/status/all)"
title:
  en: KOS Registry
---

{% section %}

This list contains a collection of knowledge organization systems relevant to project coli-conc. It is a subset of [BARTOC](https://bartoc.org/) (see [the list there](http://bartoc.org/vocabularies?partOf=http://bartoc.org/en/node/18926)). Please use [Cocoda]({{ "/cocoda/" | url }}) to browse within the systems!

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>API</th>
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
        {% for api in scheme.API %}<a target="_blank" href="{{ api.url }}">{{ api.label }}</a>{% if not loop.last %}, {% endif %}{% endfor %}
      </td>
    </tr>
    {% endfor %}
  <tbody>
</table>

{% endsection %}

{% section %}{% endsection %}
