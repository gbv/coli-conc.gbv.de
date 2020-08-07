---
layout: layouts/page
title:
  en: "Publications: Classification of Knowledge Organization Systems"
---

{% section %}

{% macro liForConcept(concept, root = false) %}
  <li {% if concept.narrower.length -%}class="has-children"{%- endif -%}>
    <input type="checkbox" id="{{ concept.uri }}" {%- if root -%}checked{%- endif -%}>
    <label for="{{ concept.uri }}">{{ concept.text }}</label>
    (<a target="_blank" href="{{ concept.uri }}">{{ concept.notation }}</a>)
    {%- if concept.mappings.length %}
      = {% for mapping in concept.mappings -%}
        <a target="_blank" href="{{ mapping.uri }}">{{ mapping.text }}</a>
        {%- if not loop.last %} | {% endif -%}
      {%- endfor -%}
    {%- endif -%}
    {%- for tag in concept.tags -%}
      <a target="_blank" href="{{ tag.href }}" class="{{ tag.class }}">{{ tag.text }}</a>
    {%- endfor -%}
    {%- if concept.narrower.length -%}
      <ul>
      {%- for narrower in concept.narrower -%}
        {{ liForConcept(narrower) }}
      {%- endfor -%}
      </ul>
    {%- endif -%}
  </li>
{% endmacro %}

The following classification of Knowledge Organization Systems has been extracted from Wikidata [as described below](#background-and-references).

###### Current Classification

Wikidata can change quickly so this is a snapshot from 2017-11-29.

- [JSKOS data (full classification)]({{ "/publications/kostypes/Q6423319.json" | urla }})
- [JSKOS data (classes only)]({{ "/publications/kostypes/Q6423319.ndjson" | urla }})

---

<ul class="collapsible">
{% for concept in kosTypes %}
  {{ liForConcept(concept, true) }}
{% endfor %}
</ul>

---

The number right of each KOS type indicate the <span class="badge badge-default">number of instances</span> and the <span class="badge badge-alternative">number of Wikipedia articles</span>.

{% endsection %}

{% section %}

###### Background and References

- Voß, Jakob: Classification of Knowledge Organization Systems with Wikidata. In: [Proceedings of the 15th European Networked Knowledge Organization Systems Workshop (NKOS 2016)](http://ceur-ws.org/Vol-1676/), p 15-22. CEUR Workshop Proceedings, Volume 1676. [http://ceur-ws.org/Vol-1676/paper2.pdf](http://ceur-ws.org/Vol-1676/paper2.pdf)
- Presentation at [15th European NKOS workshop at TPDL](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2016/programme.html), September, 9th, 2016 in Hannover. [https://doi.org/10.5281/zenodo.61767](https://doi.org/10.5281/zenodo.61767)
- [wikidata-taxonomy](https://github.com/nichtich/wikidata-taxonomy) command-line tool to extract taxonomies from Wikidata

{% endsection %}
