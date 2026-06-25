---
layout: layouts/page
title:
  en: News & Current Projects
  de: Neuigkeiten & aktuelle Projekte
pagination:
  data: collections.blog
  size: 9
  alias: posts
  reverse: true
permalink: "/blog/{% if pagination.pageNumber > 0 %}page-{{ pagination.pageNumber + 1 }}/{% endif %}index.html"
---

{% section %}

{% div "news" %}
{%- for post in pagination.items -%}
  {% div "entry" %}
    {% div "date" %}{{ post.date | date("YYYY-MM-DD") }}{% enddiv %}
    {% div "title" %}
      [{{ post.data.title }}]({{ post.url | url }})
      {% if post.data.originalLanguage %}{% badge post.data.originalLanguage %}{% endif %}
    {% enddiv %}
    {% div "excerpt" %}{{ post.data.excerpt }}{% enddiv %}
  {% enddiv %}
{%- endfor -%}
{% enddiv %}

{% if pagination.href.previous or pagination.href.next %}
<br>
{% set previousPage = { en: "Previous Page", de: "Vorherige Seite" } | localize %}
{% set nextPage = { en: "Next Page", de: "Nächste Seite" } | localize %}

{% if pagination.href.previous %}[{{ previousPage }}]({{ pagination.href.previous | url }}){% else %}{{ previousPage }}{% endif %}
|
{% if pagination.href.next %}[{{ nextPage }}]({{ pagination.href.next | url }}){% else %}{{ nextPage }}{% endif %}
{% endif %}

{% endsection %}

{% section %}

## BARTOC

{% if locale == "en" %}

BARTOC (Basic Register of Thesauri, Ontologies & Classifications) is a registry of knowledge organization systems such as vocabularies, terminologies, thesauri, classifications, and ontologies. It provides metadata on more than 4,000 KOS in over 20 languages and covers a wide range of subject areas. BARTOC serves as a central resource for libraries, research institutions, subject communities, and research data management.

Supported by the German Research Foundation (DFG), the ongoing development of BARTOC focuses on four areas: expanding content and search capabilities, improving integration with other systems, developing new features for research data management, and supporting the use, maintenance, and management of vocabularies.

- Project duration: 2025–2028

- [bartoc.org](https://bartoc.org)

{% else %}

BARTOC, das Basic Register of Thesauri, Ontologies & Classifications, ist ein Verzeichnis für Wissensorganisationssysteme wie Vokabulare, Terminologien, Thesauri, Klassifikationen und Ontologien. Es stellt Metadaten zu mehr als 4.000 KOS in über 20 Sprachen bereit und deckt eine breite fachliche Vielfalt ab. Damit übernimmt BARTOC eine zentrale Funktion für Bibliotheken, Forschungseinrichtungen, Fachcommunities sowie im Forschungsdatenmanagement.

Im Rahmen einer Förderung durch die DFG wird die Weiterentwicklung von BARTOC aktuell strukturiert vorangetrieben. Die Projektziele konzentrieren sich auf vier Bereiche: den Ausbau von Inhalten und Recherchemöglichkeiten, die Integration mit anderen Systemen, die Entwicklung neuer Funktionen für das Management von Forschungsdaten sowie die Unterstützung bei der Nutzung, Pflege und Verwaltung von Vokabularen.

- Projektlaufzeit: 2025–2028

- [bartoc.org](https://bartoc.org)

{% endif %}

{% endsection %}
