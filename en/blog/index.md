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

{% section %}

## Relaunch Basisklassifikation

{% if locale == "en" %}

The Basisklassifikation (BK) is a well-established classification system used for subject organization in libraries and information institutions. It is currently being comprehensively revised to reflect recent developments in scholarship and to meet the requirements of modern information systems. The revision focuses on updating the classification scheme, preparing it for automated subject indexing, and ensuring its structural consistency and machine readability.

- [Relaunch Basisklassifikation (German)](https://www.basisklassifikation.eu/)

{% else %}

Die Basisklassifikation (BK) ist ein etabliertes Klassifikationssystem zur Sacherschließung in Bibliotheken und Informationseinrichtungen. Um aktuellen wissenschaftlichen Entwicklungen und den Anforderungen moderner Informationssysteme gerecht zu werden, wird sie derzeit umfassend überarbeitet. Im Mittelpunkt stehen die fachliche Aktualisierung der Systematik, die Vorbereitung auf automatisierte Erschließungsverfahren sowie die Sicherung ihrer strukturellen Konsistenz und maschinellen Verarbeitbarkeit.

- [Relaunch Basisklassifikation](https://www.basisklassifikation.eu/)

{% endif %}

{% endsection %}

{% section %}

{% if locale == "en" %}

## English Translation of the Basisklassifikation

{% else %}

## Übersetzungsprojekt der Basisklassifikation

{% endif %}

{% if locale == "en" %}

The Basisklassifikation (BK) is a widely used library classification system in the German-speaking world and is available as an open and free resource. To facilitate its international use, an English translation is currently being developed. An existing machine-generated translation is being reviewed and refined by experts. The final version is expected to be published in various formats and integrated into different systems by fall 2025.

- [Das Übersetzungsprojekt (German)](https://wiki.k10plus.de/spaces/K10PLUS/pages/740393030/Das+%C3%9Cbersetzungsprojekt)

{% else %}

Die Basisklassifikation (BK) ist eine weit verbreitete bibliothekarische Klassifikation im deutschsprachigen Raum, die als offene und kostenfreie Ressource zur Verfügung steht. Um ihre Nutzung international zu erleichtern, wird derzeit eine englische Übersetzung erstellt. Eine bereits vorhandene maschinelle Übersetzung wird von Expert*innen überprüft und optimiert. Die fertige Version soll bis Herbst 2025 in verschiedenen Formaten veröffentlicht und in diverse Systeme integriert werden.

- [Das Übersetzungsprojekt](https://www.basisklassifikation.eu/)

{% endif %}

{% endsection %}

{% section %}

## Culturegraph

{% if locale == "en" %}

Culturegraph is a collaborative initiative of the library networks in Germany and Austria, together with the German National Library, for the aggregation of bibliographic metadata. It provides a cross-network platform for services and projects related to data analysis and data linking. Culturegraph is operated by the German National Library, and the results of its analysis and data linking processes are made available across all participating library networks.

Since 2019, the more than 200 million bibliographic records currently contained in Culturegraph have been updated on a daily basis. These updates are carried out in synergy with the Common Library Network Index (GVI) used for interlibrary loan, reusing the data supplied for the GVI.

- [Culturegraph (German)](https://hub.culturegraph.org/page/about)

{% else %}

Culturegraph ist ein kooperatives Vorhaben der Bibliotheksverbünde Deutschlands und Österreichs sowie der Deutschen Nationalbibliothek zur Aggregation von Metadaten. Damit bietet Culturegraph eine verbundübergreifende Plattform für Dienste und Vorhaben rund um die Themen Datenanalyse und Datenvernetzung. Culturegraph wird von der Deutschen Nationalbibliothek betrieben, Analyse- und Vernetzungsergebnisse werden verbundübergreifend zur Verfügung gestellt.

Die Aktualisierung der aktuell mehr als 200 Millionen enthaltenen Titeldaten erfolgt seit 2019 täglich in Synergie mit dem Gemeinsamen Verbünde Index (GVI) für die Fernleihe, dessen Datenlieferungen nachgenutzt werden.

- [Culturegraph](https://hub.culturegraph.org/page/about/)

{% endif %}

{% endsection %}