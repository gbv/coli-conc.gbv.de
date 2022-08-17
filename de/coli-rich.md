---
layout: layouts/page
title: coli-rich
subtitle: Kataloganreicherung durch Konkordanzen
---

{% section %}

Das Teilprojekt **coli-rich** hat zum Ziel, die vorhandene heterogene Sacherschließung in Bibliothekskatalogen mittels Konkordanzen zwischen verschiedenen Erschließungssystemen anzureichern.  Die Konkordanzen werden im Rahmen von coli-conc mit der Webanwendung [Cocoda](https://coli-conc.gbv.de/cocoda/) verwaltet.

{% endsection %}

{% section %}

## Eintragung im K10plus-Katalog

Unterfeld `$A` ist im K10plus in Suchschlüssel IKT 8559 (SEQ=Sacherschliessungsquelle) erfasst. Damit sind alle Titel auffindbar bei denen Sacherschließungsdaten:

* auf Anreicherung durch beliebige Mappings beruhen (siehe [vollständige Liste](https://opac.k10plus.de/DB=2.299/CMD?ACT=SRCHA&IKT=8659&TRM=coli-conc.*))
* auf Anreicherung durch Mappings von einem bestimmten Vokabularen beruht (siehe [z.B. von RVK](https://opac.k10plus.de/DB=2.299/CMD?ACT=SRCHA&IKT=8659&TRM=coli+conc+rvk.*))
* auf Anreicherung durch Mappings mit einer bestimmten Kombination von Vokabularen beruht (siehe [z.B. von RVK auf BK](https://opac.k10plus.de/DB=2.299/CMD?ACT=SRCHA&IKT=8659&TRM=coli+conc+rvk+bk) und [RVK-BK in Cocoda](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Furi.gbv.de%2Fterminology%2Frvk%2F&toScheme=http%3A%2F%2Furi.gbv.de%2Fterminology%2Fbk%2F))
* auf Anreicherung mit einem bestimmten Mapping beruht (siehe z.B. [RVK YP "Zahnmedizin" auf BK 44.96 "Zahnmedizin"](https://opac.k10plus.de/DB=2.299/CMD?ACT=SRCHA&IKT=8659&TRM=https+coli+conc+gbv+de+api+mappings+5812d5a4+4301+4677+9236+e6e3b8d68f24))

{% endsection %}

{% section %}

## Implementierung

Zunächst werden im K10plus BK-Notationen auf Grundlage von RVK-Notationen eingetragen. Weitere Informationen, Skripte und Beispiele dazu siehe [im git-repository](https://github.com/gbv/coli-rich-scripts).

{% endsection %}

<!--
**coli-rich** ist eine Anwendung zur

Die Anwendung besteht aus zwei Teile:

1. Ein [Benutzerinterface](#benutzerinterface) zum Ausprobieren der Anreicherung
2. Ein [Webservice](#webservice) zur Abfrage von Anreicherungen in maschinenlesbarer Form

Als Eingabe dient jeweils die PPN eines Datensatz und das Datenbankkürzel einer PICA-Datenbank (standardmäßig der [K10Plus-Katalog](https://opac.k10plus.de/). Außerdem lässt sich bestimmen, welche Mappings bei der Anreicherung zu berücksichtigen sind (standardmäßig alle). Zurückgeliefert wird als Kataloganreicherung eine Liste von PICA-Feldern die hinzugefügt, geändert oder entfernt werden sollen. Bei neuen Erschließungsfeldern wird in Unterfeld `$A` die URI des Mappings eingetragen auf Grundlage welcher die Anreicherung ermittelt wurde. Bei Änderungen an Mappings kann die Anreicherung automatisch korrigiert werden.

Weitere Informationen und technische Details befinden sich im [coli-rich git Repository](https://github.com/gbv/coli-rich#readme).

* [coli-rich Produktivinstanz](https://coli-conc.gbv.de/coli-rich/app/)
* [coli-rich Entwicklungsinstanz](https://coli-conc.gbv.de/coli-rich/dev/)

## Benutzerinterface

Mit dem [coli-rich Benutzerinterface](https://coli-conc.gbv.de/coli-rich/app/) lässt sich eine Konfiguration erstellen die bestimmt, welche Art von Anreicherung auf Grundlage welcher Mappings erstellt werden sollen. Auch lässt sich das Ergebnis der konfigurierten Anreicherung an beliebigen Datensätzen direkt ausprobieren.

Die vorgeschlagene Anreicherung kann beispielsweise mit der Software WinIBW in den betreffenden Datensatz eingetragen werden.

[{% image "/images/screenshot-coli-rich-2020-08-24.png", "", "Screenshot coli-rich" %}](https://gbv.github.io/coli-rich/)

Der aktuelle Prototyp der coli-rich Webanwendung steht unter <https://gbv.github.io/coli-rich/> zur Verfügung.

## Webservice

Der [Webservice](https://coli-conc.gbv.de/coli-rich/app/api) ist für automatische Massenabfragen von Kataloganreicherung gedacht.

## Weitere Komponenten

Die Auswahl welche Datensätze angereichert werden sollen und die Eintragung der Änderung im PICA-Katalog und ist bislang *nicht* Bestandteil von coli-rich. Dies hat den Vorteil dass Anreicherung gezielt vorgenommen werden kann und die Datenbank nicht mit Massen von Änderungen überlastet wird. Stattdessen können gezielt Datensätze angereichert werden, die beispielsweise

* einem bestimmten Bestand zugeordnet sind,
* über bereits über ausgewählte Sacherschließung verfügen, oder
* im Rahmen des Update-Prozess sowieso geändert werden müssen.

Bei Bedarf können im Rahmen von coli-rich allerdings Abfragen bereitgestellt werden die Datensätze ermitteln bei denen eine Anreicherung aussichtsreich ist. Im Handbuch *Einführung in die Verarbeitung von PICA-Daten* ist hierfür [ein Beispiel enthalten](https://pro4bib.github.io/pica/#/verarbeitung?id=schnittstellen).

-->
