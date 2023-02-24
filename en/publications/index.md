---
layout: layouts/page
title: Publications
---

{% section %}

{% flexbox %}
{% flex %}
- [Reviewed Articles](#reviewed-articles)
- [Presentations and Workshops](#presentations-and-workshops)
- [Project Reports](#project-reports)
- [Other Articles](#other-articles)
{% endflex %}
{% flex %}
- [Screencasts](#screencasts)
- [Software](#software)
- [Specifications](#specifications)
{% endflex %}
{% endflexbox %}

{% endsection %}

{% section %}

## Screencasts

Short videos introducing our [services]({{ "/services/" | url }}).

-   [Analysis of Synthesized DDC Numbers](https://www.youtube.com/watch?v=pIY65nr8Byo&t=1441s) English Code4Lib 2021 lightening talk (2021-04-06)
-   [Addition of vocabularies to BARTOC](https://av.tib.eu/media/51813)
    Showing how data is added to BARTOC (2021) <https://doi.org/10.5446/51813>
-   [Cocoda for mapping Wikidata and other vocabularies](https://www.wikidata.org/wiki/File:Wikidata_Cocoda_Screencast.webm) English (2020-10-30)
-   [Normdaten-Mapping mit Cocoda @vBIB20](https://doi.org/10.5446/36465) German (2020-05-27)
-   [Wikidata-Mappings mit Cocoda 1.1.0](https://vimeo.com/357295989) German (2019-09-02)
-   [Quick Demo of Cocoda 0.9.3](../img/cocoda-quick-screencast.mp4) (2019-06-25)
-   [Neue Features in Cocoda 0.8.0](https://vimeo.com/323457260) German
    screencast introducing Cocoda 0.8.0 features (2019-03-13)
-   [Neue Features in Cocoda 0.7.0](https://vimeo.com/312681760) German
    screencast briefly introducing some Cocoda 0.7.0 features (2019-01-22)
-   [Mapping mit Cocoda 0.6.0](https://vimeo.com/307653028) German
    screencast introducing Cocoda 0.6.0 in 5 minutes (2018-12-21)
-   [Kurzeinführung Mapping mit Cocoda
    (0.5.1)](https://vimeo.com/296616305) German screencast introducing
    Cocoda 0.5.1 in 3 minutes (2018-10-23)
-   [Cocoda first prototype 2014/15](https://vimeo.com/309446476)

{% endsection %}

{% section %}

## Software

All [software developed in project coli-conc](https://github.com/search?q=topic%3Acoli-conc+org%3Agbv+fork%3Atrue&type=Repositories) is made available as Open Source.

{% include 'software-table.njk' %}

{% endsection %}

{% section %}

## Specifications

* The most important specification developed in this project is **[JSKOS data format](https://gbv.github.io/jskos/)** to encode KOS data based in JSON and JSON-LD.

* The **[JSKOS-API](https://gbv.github.io/jskos-api)** to uniformly access KOS data has not been formally specified yet. See [jskos-server](https://github.com/gbv/jskos-server#api) as reference implementation.

* [ELMA](https://gbv.github.io/elma/) is a small subset of JSKOS-API.

{% endsection %}

<!--
{% section %}

## Data

We collect and (re)publish data related to concordances and knowledge organization systems.

-   Basisiklassifikation in [RDF (Turtle)](bk.ttl) and [JSKOS (ndjson)](bk.ndjson)

-   [Concordances](../../concordances/)

-   We daily harvest and convert [authority file mappings from
    Wikidata](../../concordances/wikidata).

-   [BARTOC database dumps](../bartoc)

-   [List of common licenses](../licenses)

-   [Classification of Knowledge Organization Systems](../kostypes)

See also [jskos-data](https://github.com/gbv/jskos-data) repository for
a collection of knowledge organization systems encoded in JSKOS

{% endsection %}
-->

{% section %}

## Reviewed Articles

-   Balakrishnan, Peters, Voß: *Coli-conc – Eine Infrastruktur zur Nutzung und Erstellung von
    Konkordanzen*. In: Qualität in der Inhaltserschließung, pp. 121-135
    <https://doi.org/10.1515/9783110691597-008>
-   Voß: *Datenqualität als Grundlage qualitativer Inhaltserschließung*
    In: Qualität in der Inhaltserschließung, pp. 167-176
    <https://doi.org/10.1515/9783110691597-010>
-   Balakrishnan, Uma; Soergel, Dagobert; Helfer, Olivia:
    Representing Concepts through Description Logic Expressions for Knowledge Organization System (KOS) Mapping.
    In: Lykke, Marianne; Svarre, Tanja; Skov, Mette; Martínez-Ávila, Daniel (eds.):
    Proceedings of the Sixteenth International ISKO Conference, 2020. pp. 455-459.
    <https://doi.org/10.5771/9783956507762-455> ([PDF](https://www.ergon-verlag.de/isko_ko/downloads/aiko_vol_17_2020_51.pdf))
-   Balakrishnan, Uma; Voß, Jakob; Soergel, Dagobert: Towards integrated
    systems for KOS management, mapping, and access. Coli-conc and its
    collaborative computer-assisted KOS mapping tool Cocoda. In:
    Ribeiro, Fernanda; Cerveira, Maria Elisa (eds.): Challenges and
    Opportunities for Knowledge Organization in the Digital Age.
    Proceedings of the Fifteenth International ISKO Conference 9-11 July
    2018 Porto. pp. 693-701.
    <https://doi.org/10.5771/9783956504211-693>
-   Voß, Jakob; Bode, Laura; Hamasur, Diana; Isbanner, Laura; Jäger,
    Jan; Kurtar, Ebru; Peters, Kim; Rufaioglu, Melis; Schneevogt,
    Christian; Stelter, Romy; Wiegand, Jennifer; Wil, Ann Christin;
    Yildirimer, Remziye: Erfassung von Wissensorganisationssystemen in
    BARTOC - Ergebnis eines Projektseminars an der Hochschule Hannover
    In: Informationspraxis Bd. 3, Nr. 2. (2017)
    [https://doi.org/10.11588/ip.2017.2.40335](https://doi.org/10.11588/ip.2017.2.40335%20)
-   Balakrishnan, Uma; Akter, Morsheda: Project Coli-conc: Mapping
    Library Knowledge Organisation Systems. In: Proceedings of the 17th
    European Networked Knowledge Organization Systems Workshop
    co-located with the 21st International Conference on Theory and
    Practice of Digital Libraries 2017 (TPDL 2017). P. 53-61
    [PDF](http://ceur-ws.org/Vol-1937/paper5.pdf)
-   Voß, Jakob; Ledl, Andreas and Balakrishnan, U.: Uniform description
    and access to Knowledge Organization Systems with BARTOC and JSKOS.
    In: Proceedings of TOTh conference 2016
    <https://doi.org/10.5281/zenodo.438019>
-   Voß, Jakob: Classification of Knowledge Organization Systems with
    Wikidata. In: [Proceedings of the 15th European Networked Knowledge
    Organization Systems Workshop
    (NKOS 2016)](http://ceur-ws.org/Vol-1676/), p 15-22. CEUR Workshop
    Proceedings, Volume 1676. <http://ceur-ws.org/Vol-1676/paper2.pdf>
-   Ledl, Andreas and Voss, Jakob: Describing Knowledge Organization
    Systems in BARTOC and JSKOS. In: Proceedings of International
    Conference on Terminology and Knowledge Engineering (TKE 2016). p.
    168-178. ISBN 978-87-999179-0-7 <http://hdl.handle.net/10760/29366>
-   Balakrishnan, U.: DFG-Projekt: Coli-Conc. Das Mapping Tool
    "Cocoda". In: O-Bib. Das Offene Bibliotheksjournal. Vol. 3, Nr. 1
    (2016). <https://doi.org/10.5282/o-bib/2016H1S11-16>
-   Reiner, U.: Automatische DDC-Klassifizierung. In: Dialog mit Bibliotheken 2010/1. pp. 23-29. [urn:nbn:de:101-2011012860](https://nbn-resolving.org/urn:nbn:de:101-2011012860)
-   Reiner, U.: Automatic Analysis of Dewey Decimal Classification Notations.
    In: 31. Jahrestagung der Gesellschaft für Klassifikation (2007) p. 697-704 [urn:nbn:de:swb:ch1-200701390](https://nbn-resolving.org/urn:nbn:de:swb:ch1-200701390)
-   Reiner, U: Automatic Analysis of Dewey Decimal Classification Notations. In: Proceedings of the 31st Annual Conference of GfKl 2008), pp 697-704. <https://doi.org/10.1007/978-3-540-78246-9_82> [PDF](https://www.gbv.de/Verbundzentrale/Publikationen/2008/2008/pdf/pdf_3936.pdf)

{% endsection %}


{% section %}

## Presentations and Workshops

### 2023

- BARTOC: Basic Register of Thesauri, Ontologies & Classifications. Presented at HdM Stuttgart. https://doi.org/10.5281/zenodo.7573589
- Terminology Services @ VZG. Presented at NFDI Terminology Services Working Group. 2023-01-12. https://doi.org/10.5281/zenodo.7528447

### 2022

- Einbindung von coli-conc Mappings in den Digitalen Assistenten (DA-3). [6. Online-Workshop Computerstützte Inhaltserschließung](https://wiki.dnb.de/display/COMUNIE). 2022-11-16. ([PDF]({{ "/publications/2022-11_Einbindung-von-coli-conc-Mappings-in-den-DA_final.pdf" | url}}))
- coli-ana: Automatische Analyse der Dewey Dezimal Klassifikation. Eine Dienstleistung der Verbundzentrale des GBV. [HdM Stuttgart](https://openup.iuk.hdm-stuttgart.de/programm-der-webinar-reihe-sommer-2022/). 2022-06-21. ([PDF]({{ "/publications/coli-ana-hdm2022.pdf" | url }}))
- coli-ana: Automatic analysis of the Dewey Decimal Classification. A service of the Verbundzentrale GBV (VZG). [ELAG 2022](https://elag2022.lnb.lv/). 2022-06-08. <https://doi.org/10.5281/zenodo.6623490>
- coli-conc: Einführung in die Dienste und das Mapping-Tool Cocoda. [HdM Stuttgart](https://openup.iuk.hdm-stuttgart.de/programm-der-webinar-reihe-winter-2021-22/). 2022-01-25. ([PDF]({{ "/publications/2022-25-01-coli-conc-webseminar_hdm_final.pdf" | url }}))

### 2021

-  coli-ana – Automatic analysis of the Dewey Decimal Classification, a service of the Verbundzentrale des GBV. [SWIB21](https://swib.org/swib21/programme.html). 2021-12-01. ([PDF](https://doi.org/10.5281/zenodo.5883534), [Video](https://youtu.be/gNm8HuX71rI))

-  Support of Metadata Mapping with coli-conc Infrastructure. [DCMI conference](https://www.dublincore.org/conferences/2021/). 2021-10-15 ([PDF]({{ "/publications/2021-10-15-DCMI-Tutorial.pdf" | url }}))

-  Unified Access to controlled vocabularies with BARTOC. [Mini ELAG II](https://elag.org/2021/06/02/mini-elag-2021-program/). 2021-06-30  ([PDF]({{ "/publications/2021-06-30-minielag-bartoc.pdf" | url }}))

- Vom Vokabularverzeichnis zum interdisziplinären KOS-Datendienst: 8 Jahre BARTOC. [109. Bib*tag](https://bibliothekartag2021.de/) 2021-06-16 [urn:nbn:de:0290-opus4-175636](https://nbn-resolving.org/urn:nbn:de:0290-opus4-175636)

- Sacherschließungsdienste und -projekte der VZG – ein Überblick. Sprechstunde Bibliothekartag 2021. 2021-06-16 ([PDF](https://coli-conc.gbv.de/publications/2021-06-17-sprechstunde-bibliothekartag.pdf))

- Wie verlinken wir unsere Daten mit der GND? Mapping mit Cocoda. [GNDCon 2021](https://wiki.dnb.de/display/GNDCON/Programm++%7C+GNDCon+2.0). 2021-06-10 ([PDF](https://coli-conc.gbv.de/publications/gndcon2021.pdf))

- BARTOC: Looking both ways, then and now as it prepares for the future of Knowledge Organisation. [ISKO UK Research Observatory](https://www.iskouk.org/event-4255162). 2021-05-19 <https://doi.org/10.5281/zenodo.4766970>

- BARTOC & coli-conc: The story of a partnership and future plans. [EDUG 2021](https://edug.pansoft.de/tiki-index.php?page=2021+meeting). 2021-05-06. ([PDF](https://coli-conc.gbv.de/publications/2021-05-06-bartoc-coli-conc.pdf))

- Analysis of Synthesized DDC Numbers. [Code4Lib 2021](https://2021.code4lib.org/). 2021-04-06 <https://doi.org/10.5281/zenodo.4637183> (see also [the recording](https://www.youtube.com/watch?v=pIY65nr8Byo&t=1441s))

- Unification of vocabulary services in BARTOC. 2021-03-23. Poster at [Code4Lib 2021](https://2021.code4lib.org/). <https://doi.org/10.5281/zenodo.4629367>

### 2020

- [Making use of the coli-conc infrastructure for controlled vocabularies](https://swib.org/swib20/programme.html#abs06). Workshop at SWIB 2020-11-24.

- [Mapping Wikidata and other vocabularies with Cocoda](https://www.wikidata.org/wiki/File:Wikidata_Cocoda_Screencast.webm). WikiCite Virtual Conference 2020 (see also [event description](https://coli-conc.gbv.de/de/blog/2020/11/19/wikidata-mapping/))

- Wikidata-Normdatenverknüpfung mit Cocoda. WikiCite Virtual Conference 2020. <https://doi.org/10.5446/51060>

- Webinar coli-conc: Einführung in die Dienste und das Mapping-Tool Cocoda. 2020-10-08 ([PDF](https://coli-conc.gbv.de/publications/2020-10-08-coli-conc-webinar.pdf))

- Das Projekt coli-conc. Bericht der FAG  Erschließung und Informationsvermittlung auf der Verbundkonferenzen des GBV, 2020-24-08 ([PDF](https://verbundkonferenz.gbv.de/wp-content/uploads/2020/08/Bericht_FAG_EI_VK2020.pdf))

### 2019

- RVK-Mapping mit cocoda und ccmapper. 2019-08-14 13:30-16:00 at UB Regensburg (Tutorial & Workshop)

- Short presentation at [International Dewey Users Meeting](https://www.eventbrite.com/e/oclc-at-ifla-wlic-2019-tickets-64562192255), August 27th 2019, Athens

- Concept mapping through a hub: [Coli-conc pilot study](https://isko-lc.org/timetable/event/concept-mapping-through-a-hub-coli-conc-pilot-study/).
June 21st, 2019 at [ISKO-LC 2019 conference](https://isko-lc.org/) in Brüssel.
<https://doi.org/10.5281/zenodo.3257136>

- coli-conc : Mapping Knowledge Organisation Systems.
May 10th, 2019 at [EDUG 2019 Meeting](http://edug.pansoft.de/tiki-index.php?page=2019+meeting) in Stockholm.
<http://edug.pansoft.de/tiki-download_file.php?fileId=194>

- Lessons learned while building the vocabulary mapping tool Cocoda.
  May 8ᵗʰ, 2019 at [ELAG 2019 conference](https://www.elag2019.de) in Berlin.
  <https://doi.org/10.5281/zenodo.2677601>

- Vortrag auf dem Bibliothekskongress: Nutzung und Erstellung von Normdaten-Mappings. Presentation at [7. Bibliothekskongress](https://www.bid-kongress-leipzig.de/), March 20ᵗʰ, 2019 in Leipzig. <https://opus4.kobv.de/opus4-bib-info/frontdoor/index/index/docId/16404>

### 2018

- Werkstattbericht Coli-conc: Stand des Mapping-Tools Cocoda.
  Presentation at [RVK Anwendertreffen](https://rvk.uni-regensburg.de/2-uncategorised/171-rvk-anwendertreffen-2018-anmeldung-programm),
  November 7ᵗʰ, 2018 in Regensburg. <https://doi.org/10.5281/zenodo.1477899>

### 2017

- Voraussetzungen für die offene Nutzung der RVK. Presentation at [RVK Anwendertreffen](https://rvk.uni-regensburg.de/2-uncategorised/156-rvk-anwendertreffen-2017),
    November 8ᵗʰ, 2017 in Regensburg.
    <https://doi.org/10.5281/zenodo.1043635>
-   State of identifiers in Wikidata. Presentation at
    [WikidataCon](https://www.wikidata.org/wiki/Wikidata:WikidataCon_2017),
    October, 28ᵗʰ, 2017 in Berlin.
    <https://doi.org/10.5281/zenodo.1037673>
- Infrastruktur zur Erstellung, Austausch und Pflege zwischen KOS in Anwendung auf bibliothekarische KOS at [BBK](https://www.ibi.hu-berlin.de/de/von-uns/bbk/termine/2410),Oktober 24, 2017 in Berlin
-   coli-conc: Mapping Knowledge Organization System. Presentation at
    [17ᵗʰ European NKOS
    Workshop](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2017/programme.html),
    September, 15ˢᵗ, 2017 in Thessaloniki. ([PDF
    slides](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2017/content/akter.pdf)).
-   Wikidata as authority linking hub. Presented at DINI AG KIM
    Workshop, May, 4ᵗʰ, 2017 and at [ELAG 2017](http://elag2017.org/),
    June 8ᵗʰ, 2017
    ([Slides](https://de.slideshare.net/jneubert/wikidata-as-authority-linking-hub))

### 2016

-   Automatic Analysis of DDC Numbers based on MARC21. Presented at EDUG Symposium 2016. [PDF](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2016/pdf/reiner_160425_EDUG_Symposium.pdf)
-   Interoperability of KOS Metadata Schemas in BARTOC and JSKOS.
    Presentation at [16ᵗʰ European NKOS
    Workshop](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2016-dc/programme.html),
    October, 15ᵗʰ, 2016 in Copenhagen.
    <https://doi.org/10.5281/zenodo.160926>
-   Classification of Knowledge Organization Systems with Wikidata.
    Presentation at [15ᵗʰ European NKOS workshop at
    TPDL](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2016/programme.html),
    September, 9ᵗʰ, 2016 in Hannover.
    <https://doi.org/10.5281/zenodo.61767>
-   Describing Knowledge Organization Systems in BARTOC and JSKOS.
    Presentation at [TKE
    2016](http://sf.cbs.dk/gtw/conferences_terminology_and_knowledge_engineering/tke_2016_copenhagen),
    June 24ᵗʰ, 2016. <http://hdl.handle.net/10760/29572>
-   Mapping Project coli-conc Progress, learning & next steps.
    Presentation at [EDUG 2016
    Symposium](http://edug.pansoft.de/tiki-index.php?page=2016+meeting),
    April 25ᵗʰ, 2016. ([PDF
    slides](http://edug.pansoft.de/tiki-download_file.php?fileId=143))

### 2015

-   The Cocoda Mapping Tool. Presentation at [14th European Networked
    Knowledge Organization Systems (NKOS)
    Workshop](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2015/programme.html),
    September 18ᵗʰ, 2015. ([Abstract and
    PDF](http://eprints.rclis.org/28007/))
-   The mapping tool \"Cocoda\". Presentation at [European Conference on
    Data Analysis 2015](http://ecda2015.com/), September 3ʳᵈ, 2015.
-   Cocoda - ein Konkordanztool für bibliothekarische
    Klassifikationssysteme. Vortrag auf dem 104. Deutscher
    Bibliothekartag in Nürnberg 2015, May 27ᵗʰ, 2015.
    ([Abstract](https://opus4.kobv.de/opus4-bib-info/frontdoor/index/index/docId/1676))
-   Mapping Tool „Colibri Concordance Database (Cocoda)". Presentation
    at [European DDC Users Group
    (EDUG)](http://edug.pansoft.de/tiki-index.php?page=2015meeting),
    April 15ᵗʰ, 2015. ([PDF
    slides](http://edug.pansoft.de/tiki-download_file.php?fileId=106))

### before 2015

-   Das VZG-Projekt „coli-conc" - Brückenbildung zwischen DDC und RVK.
    November 20ᵗʰ, 2013. ([PDF
    slides](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2013/pdf/Balakrishnan_131120_RVK_WS_Konkordanz.pdf))

-   Computer-aided Assignment of DDC Numbers. [32nd Annual Conference of the German Classification Society](https://web.archive.org/web/20081222041725/http://gfkl2008.hsu-hh.de/) July 17, 2008. [urn:nbn:de:bsz:ch1-200801508](https://nbn-resolving.org/urn:nbn:de:bsz:ch1-200801508).

-   Automatic Analysis of DDC Notations. Presented at EDUG Workshop June 11, 2007 [PDF](https://www.gbv.de/Verbundzentrale/Publikationen/2007/2007/pdf/pdf_3024.pdf)

-   DDC-basierte Suche in heterogenen digitalen Bibliotheks- und Wissensbeständen. 94. Deutscher Bibliothekartag, March 15, 2005. [urn:nbn:de:0290-opus-1112](https://nbn-resolving.org/urn:nbn:de:0290-opus-1112)

## Posters

-   Voß, Jakob: [Cocoda web application for mapping Wikidata and authority files](https://commons.wikimedia.org/wiki/File:Cocoda-poster-wikidatacon2019.pdf).
    Presented at [WikidataCon 2019](https://www.wikidata.org/wiki/Wikidata:WikidataCon_2019)
-   Voß, Jakob; Agne, Jana Maria; Balakrishnan, U.; Akter, Morsheda:
    Terminology Registries and Services. Presented at Research Data
    Alliance Deutschland Treffen and SWIB 2016.
    <https://doi.org/10.5281/zenodo.166717>

{% endsection %}

{% section %}

## Project Reports

## coli-conc

-   coli-conc Technical Report 1: [Cocoda primer](tr1.html). (April
    2015) <https://doi.org/10.5281/zenodo.16786>.
-   coli-conc Technical Report 2: [Open Source KOS software](tr2.html).
    (March 2016) <https://doi.org/10.5281/zenodo.48227>.
-   coli-conc Technical Report 3: [A novel approach to terminology
    mappings](tr3.html). (April 2016)
    <https://doi.org/10.5281/zenodo.48740>.
-   coli-conc report 4: [Anforderungen an Normdatendienste](tr4.html).
    (April 2016) <https://doi.org/10.5281/zenodo.50180>.
-   coli-conc report 5: European DDC Users Group (EDUG) Symposium &
    Business Meeting. (August 2016) [PDF]({{ "/publications/EDUG2016Bericht.pdf" | urla }})
-   coli-conc report 6: Ergebnisse der Online-Umfrage zur
    Sacherschließung und Konkordanzprojekten. (August 2016)
    [PDF]({{ "/publications/Umfrageergebnisse.pdf" | urla }})
-   coli-conc report 7: [Open Source web applications for Knowledge
    Organization Systems](tr7.html). (August 2016)
    <https://doi.org/10.5281/zenodo.61262>.
-   coli-conc report 8: Zusammenfassung des Zwischenberichts. (Februar
    2017) [PDF]({{ "/publications/coli-conczusammenfassung.pdf" | urla }})
-   coli-conc report 9: Umfrage zur Basisklassifikation 2017 (Mai 2017)
    [PDF](https://si-it-workshop.gbv.de/wp-content/uploads/2017/01/BKUmfrage_Ergebnisse.pdf)
-   coli-conc report 10: [Ein Vergleich ausgewählter
    Normdatendienste](tr10.html) (Mai 2017)
    <https://doi.org/10.5281/zenodo.800577>
-   coli-conc report 11: [Cocoda Technical Architecture](tr11.html) (May
    2018) <https://doi.org/10.5281/zenodo.1256498>
-   coli-conc report 12: [Übersicht von GND-Konkordanzen](tr12.html)
    (November 2018) <https://doi.org/10.5281/zenodo.1689997>

### Colibri/DDC

VZG-Project Colibri/DDC was started in 2003 by Ulrike Reiner. It consists of subprojects coli-ana, coli-auto, coli-corr and coli-conc.

-   VZG-Colibri-Bericht 1/2003: Ulrike Reiner: VZG-Projekt Colibri: Überblick, Stand, Ergebnisse Juli-Dezember 2003 (2003) ([PDF](https://verbundwiki.gbv.de/download/attachments/884990/colibri01-04-03-11-without-appendix.pdf))
-   VZG-Colibri-Bericht 2/2004: Ulrike Reiner: DDC-Notationsanalyse und synthese September 2004-Februar 2005. (2005) ([PDF]({{ "/publications/colibri03.pdf" | urla }}))
-   VZG-Colibri-Bericht 1/2008: Ulrike Reiner: Bewertung von automatisch DDC-klassifizierten Titeldatensätzen der Deutschen Nationalbibliothek (DNB). (2008) ([PDF]({{ "/publications/colibri05.pdf" | urla }}))
-   VZG Colibri/DDC Report 1/2017: Ulrike Reiner: VZG Project Colibri/DDC. DDC Number Logicology. (August 2017) ([PDF]({{ "/publications/colibri07.pdf" | urla }}))
-   VZG-Colibri-Bericht 1/2011: Uma Balakrishnan: An EZB-DDC Concordance (June 2011) <https://doi.org/10.5281/zenodo.28263>

{% endsection %}

{% section %}

## Other Articles

-   Basic Register of Thesauri, Ontologies & Classification (BARTOC):
    DFG-Projektantrag. <https://doi.org/10.5281/zenodo.7673393>
    (BARTOC grant proposal, abbreviated version)
-   DFG-Antrag zur Entwicklung einer Infrastruktur für den Austausch,
    die Erstellung, und die Wartung von Konkordanzen zwischen
    bibliothekarischen Wissensorganisationssystemen (November
    2014/August 2015). <https://doi.org/10.5281/zenodo.28290> (coli-conc
    grant proposal, abbreviated version)
-   Projekt coli-conc Zwischenbericht 01.05.2018 - 30.04.2019.
    (coli-conc grant report) <https://doi.org/10.5281/zenodo.2668205>.
-   Das Projekt „coli-conc" Ein Bericht zur semi-automatischen
    Erstellung von Konkordanzen zur Dewey Dezimalklassifikation. (2013)
    [PDF, page
    12-16](https://www.gbv.de/Verbundzentrale/Publikationen/broschueren/vzg-aktuell/vzg_aktuell_2013_01.pdf).
-   Balakrishnan, U.: DFG-Projekt coli conc -- Projektphase I . In: VZG
    Aktuell. 2/2016 (September), p. 8-12 ([PDF](https://www.gbv.de/Verbundzentrale/Publikationen/broschueren/vzg-aktuell/VZG_Aktuell_2016_02.pdf))
-   Anreicherung der Sacherschließung durch Konkordanzen (coli-rich). VZG Aktuell, 2021 Ausgabe 2, S. 19-22. 2021-12-01 ([PDF](https://www.gbv.de/Verbundzentrale/Publikationen/broschueren/vzg-aktuell/VZG_Aktuell_2021_02.pdf))
-   An EZB-DDC Condordance (2011). VZG-Project Colibri Sub: Project
    Coli-Conc. <https://doi.org/10.5281/zenodo.28263>.

See also [related works](/partners/#related-works) by other organizations and individuals.

{% endsection %}

{% section %}{% endsection %}
