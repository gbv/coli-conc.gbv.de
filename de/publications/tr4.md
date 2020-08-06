---
layout: layouts/blog
permalink: /publications/tr4.html
tags:
 - blog
series: coli-conc report
number: 4
title: Anforderungen an Normdatendienste
excerpt: 'Ergebnis einer Session "Anforderungen an Normdatendienste" auf den DINI AG KIM Workshop 2016'
author:
    name: Jakob Voß
    email: jakob.voss@gbv.de
    affiliation: Verbundzentrale des GBV (VZG)
date: 2016-04-21
doi: 10.5281/zenodo.50180
license: CC-BY-SA
lang: de
language: ngerman
---

Die vorliegende Übersicht fasst das Ergebnis einer Session "Anforderungen an Normdatendienste" auf dem [DINI AG KIM Workshop am 4./5. April](https://wiki.dnb.de/display/DINIAGKIM/KIM+WS+2016) in Mannheim zusammen.

# Einleitung

Normdaten im weitesten Sinne, d.h. Wissensorganisationssysteme wie
Klassifikationen, Thesauri und Normdateien, ermöglichen die verlässliche
Identifizierung von Personen, Orten, Sachgebieten und anderen Entitäten.  Daher
spielen Normdaten sowohl bei der Erhebung als auch bei der Auswertung von Daten
(bibliographische Daten, Forschungsdaten etc.) eine besondere Rolle.  Um die
Nutzbarkeit von Normdaten zu verbessern, müssen diese in geeigneter Weise
bereitgestellt werden. In der Session "Anforderungen an Normdatendienste" auf
dem Workshop der DINI AG KIM wurde deshalb am 5. April 2016 der Frage
nachgegangen, welche Nutzungsarten von Normdaten besonders relevant sind und
wie diese über einheitliche Schnittstellen bereitgestellt werden können. 

# Vorgehen 

Um den rund 50 TeilnehmerInnen eine konstruktive Diskussion zu ermöglichen,
wurden Gruppen von etwa sechs Personen gebildet, deren MitgliederInnen zunächst
einzeln und dann gemeinsam nach Anwendungsfällen suchen sollten.  Zur Erfassung
der Ergebnisse gab es einzelne Formulare für Anwendungsfälle eines
Normdaten-Iterfaces (GUI) oder einer Normdaten-API (Webservice).  Das an die so
genannte "Design Studio Methode" angelehnte Entwicklungsmethode besteht aus
mehreren, zeitlich strikt begrenzten Phasen und ermöglichte es, innerhalb von
90 Minuten zahlreiche Anwendungsfälle und Anforderungen an Normdatendienste
zusammenzustellen. Die begleitenden Folien enthalten eine Einleitung und fassen
das Vorgehen zusammen [@Voss2016b].
 
# Ergebnisse

Die folgende Liste enthält eine Auswahl von allgemeinen Anwendungsfällen und
Anforderungen an Normdatendiensten, die im Rahmen der Session ermittelt wurden.

* **Abfrage von Synonymen** (alternativen Benennungen), ggf. in ausgewählten Sprachen und über Mappings zu anderen Normdateien, zur Suchexpansion beim Volltextretrieval

* **(Fuzzy-)Suche in Normdateien** zur Ermittlung unbekannter, passender Begriffe

* **Metasuche** nach Begriffen in mehreren Normdateien

* **Multilinguale Suche** mittels mehrsprachiger Normdateien und Konkordanzen

* **Autovervollständigung/Typeahead** zum Vorschlagen von Begriffen bei der Eingabe

* **Abfrage der kanonischen Form** (Vorzungsbenennung) eines Begriffs

* **Entity-Kurzinfo** ("Steckbrief") mit wesentlichen Daten z.B. zur Anzeige als Popup

* **Abfrage von Änderungen** an Normdateien und Begriffen (Lifecycle, Provenienz...)

* **Nutzungsstatistik** welche Normdateien und Begriffe wo und wie häufig verwendet werden

* **Ermittlung von Ressourcen** die mit einem gegebenen Begriff indexiert sind

* **Anreicherung von Normdaten** mit Informationen aus anderen Normdateien

* **Feedback-Möglichkeit** zur Korrektur oder Ergänzung von Normdaten durch Nutzer

* **Anreicherung von Übersetzungen** mittels Crowdsourcing für mehr Mehrsprachigkeit

* **Abfrage von Konkordanzen und Mappings** zu anderen Normdateien und deren Begriffen.

* **Erstellung von Mappings** mit Vorschlagsfunktion (z.B. auf Basis von Kookkurrenzen)

* **Named Entity Recognition**, d.h. automatische Erkennung von Begriffen in einem Text

* **Concept mining** zur Ermittlung von Begriffen oder Begriffskandidaten aus Texten

# Ausblick

Die vorliegende Sammlung bedarf noch einer genaueren Gruppierung, Priorisierung
und Ausarbeitung der ermittelten Anwendungsfälle sowie des Abgleichs mit
weiteren Anforderungskatalogen wie die Sammlung der [RDA Vocabulary Services
Interest Group](https://rd-alliance.org/groups/vocabulary-services-interest-group.html).
Für die weitere Beurteilung wären auch die Untersuchung vorhandener Umsetzungen
(best practice, falls vorhanden) hilfreich. 

Im Rahmen des Projekt coli-conc sollen Anforderungen an Normdatendienste in die
Spezifikation der [JSKOS-API](https://gbv.github.io/jskos-api/) und in die
Entwicklung von Normdatendiensten der VZG eingehen [@Voss2016a]. Die
Koordination mit vorhandenen Normdatendiensten (lobid.org, econ-ws, entity
facts...) kann über die [DINI AG KIM
Normdaten](https://wiki.dnb.de/display/DINIAGKIM/Normdaten+Gruppe) erfolgen.
Für eine umfassende Umsetzung, Evaluation und Dokumentation der Anforderungen
ist jedoch aufgrund des Arbeitsumfangs eine zusätzliche Förderung angebracht.

# Literaturnachweise
