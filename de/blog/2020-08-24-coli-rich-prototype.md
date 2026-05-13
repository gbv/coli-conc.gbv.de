---
layout: layouts/blog
title: Prototyp von coli-rich zur Kataloganreicherung
excerpt: Webanwendung zur Anreicherung der Sacherschließung durch Mappings
tags:
- blog
---

Unter <https://gbv.github.io/coli-rich/> gibt es einen ersten Prototyp der Webanwendung [**coli-rich**]({{ "/coli-rich/" | url}}) zur Anreicherung der Sacherschließung mittels Konkordanzen. Über die Weboberfläche lassen sich Datensätze aus dem [K10Plus-Katalog](https://opac.k10plus.de/) laden und die darin vorhandenen Sacherschließungsdaten analysieren. Falls das coli-conc Konkordanz-Register passende Mappings zu Vokabularen enthält, mit denen der Datensatz noch nicht erschlossen ist, wird eine entsprechende Anreicherung vorgeschlagen. Mappings können mit [Cocoda]({{ "/cocoda/" | url}}) direkt zum Konkordanz-Register hinzugefügt oder dort bewertet werden.

[{% image "/images/screenshot-coli-rich-2020-08-24.png", "", "Screenshot coli-rich" %}](https://gbv.github.io/coli-rich/)

Im Laufe des Jahres soll coli-rich erweitert werden, so dass nur geprüfte Mappings Verwendung finden. Wenn sich Mappings als falsch herausstellen, kann die Anreicherung zurückverfolgt und automatisch korrigiert werden. Nach der Testphase wird die Anreicherung auf größerer Teile des K10Plus-Katalog ausgeweitet und automatisiert.

Bislang werden Basisklassifikation (BK), Regensburger Verbundklassifikation (RVK), Sachgruppen der Deutschen Nationalbibliografie und Dewey-Dezimalklassifikation (DDC) unterstützt.
