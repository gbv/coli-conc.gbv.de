---
layout: layouts/page
title: coli-rich
subtitle: Kataloganreicherung durch Konkordanzen
---

{% section %}

**coli-rich** ist eine Anwendung zur Anreicherung der vorhandenen, heterogenen Sacherschließung in PICA-Katalogen mittels Konkordanzen zwischen verschiedenen Erschließungssystemen. Die Anwendung besteht aus zwei Teile:

1. Ein [Webservice](#webservice) zur Abfrage von Anreicherungen in maschinenlesbarer Form (in Entwicklung)
2. Ein [Benutzerinterface](#benutzerinterface) zum Ausprobieren der Anreicherung (siehe Prototyp unter <https://gbv.github.io/coli-rich/>)

Beide liefern die gleichen Ergebnisse: als Eingabe dient die PPN eines Datensatz und das Datenbankkürzel einer PICA-Datenbank (standardmäßig der [K10Plus-Katalog](https://opac.k10plus.de/). Außerdem lässt sich bestimmen, welche Mappings bei der Anreicherung zu berücksichtigen sind (standardmäßig alle). Zurückgeliefert wird als Kataloganreicherung eine Liste von PICA-Feldern die hinzugefügt, geändert oder entfernt werden sollen. Bei neuen Erschließungsfeldern wird in Unterfeld `$A` die URI des Mappings eingetragen auf Grundlage welcher die Anreicherung ermittelt wurde. Bei Änderungen an Mappings kann die Anreicherung automatisch korrigiert werden.

Weitere Informationen und technische Details befinden sich im [coli-rich git Repository](https://github.com/gbv/coli-rich#readme).

{% endsection %}

{% section %}

###### Benutzerinterface

Mit dem coli-rich Benutzerinterface lässt sich eine Konfiguration erstellen die bestimmt, welche Art von Anreicherung auf Grundlage welcher Mappings erstellt werden sollen. Auch lässt sich das Ergebnis der konfigurierten Anreicherung an beliebigen Datensätzen direkt ausprobieren.

Die vorgeschlagene Anreicherung kann beispielsweise mit der Software WinIBW in den betreffenden Datensatz eingetragen werden.

[{% image "/images/screenshot-coli-rich-2020-08-24.png", "", "Screenshot coli-rich" %}](https://gbv.github.io/coli-rich/)

Der aktuelle Prototyp der coli-rich Webanwendung steht unter <https://gbv.github.io/coli-rich/> zur Verfügung.

{% endsection %}

{% section %}

###### Webservice

Der Webservice ist für automatische Massenabfragen gedacht. Er steht noch nicht zur Verfügung.

{% endsection %}

{% section %}

###### Weitere Komponenten

Die Auswahl welche Datensätze angereichert werden sollen und die Eintragung der Änderung im PICA-Katalog und ist *nicht* Bestandteil von coli-rich. Dies hat den Vorteil dass Anreicherung gezielt vorgenommen werden kann und die Datenbank nicht mit Massen von Änderungen überlastet wird. Stattdessen können gezielt Datensätze angereichert werden, die beispielsweise

* einem bestimmten Bestand zugeordnet sind,
* über bereits über ausgewählte Sacherschließung verfügen, oder
* im Rahmen des Update-Prozess sowieso geändert werden müssen.

Bei Bedarf können im Rahmen von coli-rich allerdings Abfragen bereitgestellt werden die Datensätze ermitteln bei denen eine Anreicherung aussichtsreich ist. Im Handbuch *Einführung in die Verarbeitung von PICA-Daten* ist hierfür [ein Beispiel enthalten](https://pro4bib.github.io/pica/#/verarbeitung?id=schnittstellen).

{% endsection %}
