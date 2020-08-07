---
layout: layouts/page
title: Publications
---

{% section %}

- [Screencasts](#screencasts)
- [Software](#software)
- [Specifications](#specifications)
- [Data](#data)
- [Presentations and Workshops](#presentations-and-workshops)
- [Reviewed Articles](#reviewed-articles)
- [Posters](#posters)
- [Reports](#reports)
- [Other Articles](#other-articles)

{% endsection %}

{% section %}

###### Screencasts

- [Normdaten-Mapping mit Cocoda @vBIB20](https://doi.org/10.5446/36465) German (2020-05-27)
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

###### Software

<table>
  <thead>
    <tr>
      <th>name and description</th>
      <th class="tiny-hide">type</th>
      <th>status</th>
      <th class="medium-hide"></th>
      <th class="small-hide">language</th>
      <th>release</th>
    </tr>
  </thead>
  <tbody>
    {% for item in software %}
    <tr>
      <td>
        <a href="{{ item.repository }}" target="_blank">{{ item.name }}</a>
        {{ item.description }}
      </td>
      <td class="tiny-hide">{{ item.type }}</td>
      <td>{{ item.status }}</td>
      <td class="medium-hide">
        {%- if item.travis -%}
        {%- set url = item.repository | replace("github.com", "travis-ci." + item.travis) -%}
        <a href="{{ url }}"><img src="{{ url }}.svg"></a>
        {%- endif -%}
      </td>
      <td class="small-hide">{{ item.language }}</td>
      <td>
        {%- if item.release -%}
          {%- set shield = "" -%}
          {%- set regExp = r/^https?:/ -%}
          {%- if regExp.test(item.release) -%}
            {%- set url = item.release -%}
          {%- elif item.language == "PHP" -%}
            {%- set url = "https://packagist.org/packages/" -%}
            {%- set shield = "packagist" -%}
          {%- elif item.language == "JavaScript" -%}
            {%- set url = "https://www.npmjs.com/package/" -%}
            {%- set shield = "npm" -%}
          {%- elif item.language == "Python" -%}
            {%- set url = "https://pypi.python.org/pypi/" -%}
            {%- set shield = "pypi" -%}
          {%- elif item.language == "Perl" -%}
            {%- set url = "https://metacpan.org/release/" -%}
            {%- set shield = "cpan" -%}
          {%- endif -%}
          {%- if shield -%}
            [![](https://img.shields.io/{{ shield }}/v/{{ item.release }}.svg?style=flat)]({{ url + item.release }})
          {%- else -%}
            [link]({{ url }})
          {%- endif -%}
        {%- endif -%}
      </td>
    </tr>
    {% endfor %}
  <tbody>
</table>

{% endsection %}

{% section %}

###### Specifications

- [JSKOS](https://gbv.github.io/jskos/)          JSON based data format for KOS
-  [ELMA](https://gbv.github.io/elma/)            Simple subset of JSKOS-API
-  [JSKOS-API](https://gbv.github.io/jskos-api)   API to access KOS data           *early notes*

{% endsection %}

{% section %}

###### Data

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

{% section %}

###### Presentations and Workshops

- RVK-Mapping mit cocoda und ccmapper. 2019-08-14 13:30-16:00 at UB Regensburg (Tutorial & Workshop)

- Short presentation at [International Dewey Users Meeting](https://www.eventbrite.com/e/oclc-at-ifla-wlic-2019-tickets-64562192255), August 27th, Athens

- Concept mapping through a hub: [Coli-conc pilot study](https://isko-lc.org/timetable/event/concept-mapping-through-a-hub-coli-conc-pilot-study/).
June 21st, 2019 at [ISKO-LC 2019 conference](https://isko-lc.org/) in Brüssel.
<https://doi.org/10.5281/zenodo.3257136>

- coli-conc : Mapping Knowledge Organisation Systems.
May 10th, 2019 at [EDUG 2019 Meeting](http://edug.pansoft.de/tiki-index.php?page=2019+meeting) in Stockholm.
<http://edug.pansoft.de/tiki-download_file.php?fileId=194>
-   Lessons learned while building the vocabulary mapping tool Cocoda.
    May 8ᵗʰ, 2019 at [ELAG 2019 conference](https://www.elag2019.de) in Berlin.
    <https://doi.org/10.5281/zenodo.2677601>
-   Vortrag auf dem Bibliothekskongress: Nutzung und Erstellung von Normdaten-Mappings.
     Presentation at [7. Bibliothekskongress](https://www.bid-kongress-leipzig.de/),
     March 20ᵗʰ, 2019 in Leipzig.
     <https://opus4.kobv.de/opus4-bib-info/frontdoor/index/index/docId/16404>
-   Werkstattbericht Coli-conc: Stand des Mapping-Tools Cocoda.
    Presentation at [RVK
    Anwendertreffen](https://rvk.uni-regensburg.de/2-uncategorised/171-rvk-anwendertreffen-2018-anmeldung-programm),
    November 7ᵗʰ, 2018 in Regensburg.
    <https://doi.org/10.5281/zenodo.1477899>
-   Voraussetzungen für die offene Nutzung der RVK. Presentation at [RVK
    Anwendertreffen](https://rvk.uni-regensburg.de/2-uncategorised/156-rvk-anwendertreffen-2017),
    November 8ᵗʰ, 2017 in Regensburg.
    <https://doi.org/10.5281/zenodo.1043635>
-   State of identifiers in Wikidata. Presentation at
    [WikidataCon](https://www.wikidata.org/wiki/Wikidata:WikidataCon_2017),
    October, 28ᵗʰ, 2017 in Berlin.
    <https://doi.org/10.5281/zenodo.1037673>
-   coli-conc: Mapping Knowledge Organization System. Presentation at
    [17ᵗʰ European NKOS
    Workshop](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2017/programme.html),
    September, 15ˢᵗ, 2017 in Thessaloniki. ([PDF
    slides](https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2017/content/akter.pdf)).
-   Wikidata as authority linking hub. Presented at DINI AG KIM
    Workshop, May, 4ᵗʰ, 2017 and at [ELAG 2017](http://elag2017.org/),
    June 8ᵗʰ, 2017
    ([Slides](https://de.slideshare.net/jneubert/wikidata-as-authority-linking-hub))
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
-   Das VZG-Projekt „coli-conc" - Brückenbildung zwischen DDC und RVK.
    November 20ᵗʰ, 2013. ([PDF
    slides](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2013/pdf/Balakrishnan_131120_RVK_WS_Konkordanz.pdf))

{% endsection %}

{% section %}

###### Reviewed Articles

-   Balakrishnan, Uma; Voß, Jakob; Soergel, Dagobert: Towards integrated
    systems for KOS management, mapping, and access. Coli-conc and its
    collaborative computer-assisted KOS mapping tool Cocoda. In:
    Ribeiro, Fernanda; Cerveira, Maria Elisa (eds.): Challenges and
    Opportunities for Knowledge Organization in the Digital Age.
    Proceedings of the Fifteenth International ISKO Conference 9-11 July
    2018 Porto. pp. 693-701.
    [https://doi.org/10.5771/9783956504211-693](https://doi.org/10.5771/9783956504211-693)
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

{% endsection %}

{% section %}

###### Posters

-   Voß, Jakob: [Cocoda web application for mapping Wikidata and authority files](https://commons.wikimedia.org/wiki/File:Cocoda-poster-wikidatacon2019.pdf).
    Presented at [WikidataCon 2019](https://www.wikidata.org/wiki/Wikidata:WikidataCon_2019)
-   Voß, Jakob; Agne, Jana Maria; Balakrishnan, U.; Akter, Morsheda:
    Terminology Registries and Services. Presented at Research Data
    Alliance Deutschland Treffen and SWIB 2016.
    <https://doi.org/10.5281/zenodo.166717>

{% endsection %}

{% section %}

###### Reports

-   [coli-conc Technical Report 1: Cocoda primer](tr1.html). (April
    2015) <https://doi.org/10.5281/zenodo.16786>.
-   [coli-conc Technical Report 2: Open Source KOS software](tr2.html).
    (March 2016) <https://doi.org/10.5281/zenodo.48227>.
-   [coli-conc Technical Report 3: A novel approach to terminology
    mappings](tr3.html). (April 2016)
    <https://doi.org/10.5281/zenodo.48740>.
-   [coli-conc report 4: Anforderungen an Normdatendienste](tr4.html).
    (April 2016) <https://doi.org/10.5281/zenodo.50180>.
-   coli-conc report 5: European DDC Users Group (EDUG) Symposium &
    Business Meeting. (August 2016) [PDF](EDUG2016Bericht.pdf)
-   coli-conc report 6: Ergebnisse der Online-Umfrage zur
    Sacherschließung und Konkordanzprojekten. (August 2016)
    [PDF](Umfrageergebnisse.pdf)
-   [coli-conc report 7: Open Source web applications for Knowledge
    Organization Systems](tr7.html). (August 2016)
    <https://doi.org/10.5281/zenodo.61262>.
-   coli-conc report 8: Zusammenfassung des Zwischenberichts. (Februar
    2017) [PDF](coli-conczusammenfassung.pdf)
-   coli-conc report 9: Umfrage zur Basisklassifikation 2017 (Mai 2017)
    [PDF](https://si-it-workshop.gbv.de/wp-content/uploads/2017/01/BKUmfrage_Ergebnisse.pdf)
-   coli-conc report 10: [Ein Vergleich ausgewählter
    Normdatendienste](tr10.html) (Mai 2017)
    <https://doi.org/10.5281/zenodo.800577>
-   coli-conc report 11: [Cocoda Technical Architecture](tr11.html) (May
    2018) <https://doi.org/10.5281/zenodo.1256498>
-   coli-conc report 12: [Übersicht von GND-Konkordanzen](tr12.html)
    (November 2018) <https://doi.org/10.5281/zenodo.1689997>

{% endsection %}

{% section %}

###### Other Articles

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
    Aktuell. 2/2016 (September), p. 8-12 ([PDF](vzgaktuell.pdf))
-   An EZB-DDC Condordance (2011). VZG-Project Colibri Sub: Project
    Coli-Conc. <https://doi.org/10.5281/zenodo.28263>.

{% endsection %}
