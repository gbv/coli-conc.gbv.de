---
layout: layouts/blog
hideLogo: true
hideFundingNote: true
hideProjectsPartners: true
title: Eigene Vokabulare per API in Cocoda einbinden
excerpt: Informationen zum Einbinden eigener Vokabulare in Cocoda anhand verschiedener Beispiele.
tags:
- blog
---

Die [Bibliothek der Universität Konstanz](https://www.kim.uni-konstanz.de/) erfasst ihre Bestände mit der 
[Konstanzer Systematik](https://konsys.uni-konstanz.de/) (KonSys), die in einer eigenen Datenbank verwaltet wird. In solchen Fällen bietet es sich an, das Vokabular in der jeweils aktuellsten Version über eine Web-API in BARTOC und Cododa einzubinden. Die Bibliothek hat dazu den [wesentlichen Teil der JSKOS-API](https://konsys.uni-konstanz.de/api/jskos/) implementiert:

* [KonSys in BARTOC](https://bartoc.org/en/node/1443#content)
* [KonSys in Cocoda](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fbartoc.org%2Fen%2Fnode%2F1443)

Neben der Referenzimplementierung [JSKOS-Server](https://github.com/gbv/jskos-server) ist die API ist auch [im Vokabularserver DANTE](https://api.dante.gbv.de/start/) umgesetzt. Damit ist die Bibliothek Konstanz die dritte Umsetzung der Schnittstelle zum einheitlichen Zugriff auf Vokabulare. Während DANTE ein Dienst der VZG ist, kann JSKOS-Server auch unabhängig eingesetzt werden. Dies macht z.B. die UB Bielefeld [mit Ihrer Systematik](https://bartoc.org/en/node/18891#content).

Eine weitere Alternative ist die Nutzung einer API, die [von cocoda-sdk](https://github.com/gbv/cocoda-sdk#providers) unterstützt wird. Im Wesentlichen ist das bislang die freie Software [Skosmos](https://skosmos.org/). Die direkte Unterstützung von [Skohub](https://skohub.io/) unter weiterer etablierter Vokabular-Provider [ist geplant](https://github.com/gbv/cocoda-sdk/issues/29).

Kommen Sie [gerne auf uns zu](/contact/), wenn Sie weitere Informationen zur Anbindung ihrer Vokabulare benötigen!
