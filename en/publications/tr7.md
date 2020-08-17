---
layout: layouts/blog
permalink: /publications/tr7.html
tags:
  - blog
title: Open Source web applications for Knowledge Organization Systems
excerpt: ....
series: coli-conc report
number: 7
author:
  - name: Jakob Voß
    email: jakob.voss@gbv.de
    affiliation: Verbundzentrale des GBV (VZG)
date: 2016-08-31
doi: 10.5281/zenodo.61262
license: CC-BY-SA
lang: en
language: english
---

This report gives an overview about Open Source web applications to create,
manage, and publish Knowledge Organization Systems (KOS).

# Background

To manage concordances between Knowledge Organization Systems (KOS) in project
[coli-conc](https://coli-conc.gbv.de/), access to each of these KOS is
required.  To access and manage KOS there are several tools, as listed in a
first report [@ColiConcTR2]. This new report contains an update of this list,
narrowed down to web applications. The collection only contains applications
with main focus on KOS management. More application exist to make use of
controlled vocabularies as part of another task, ^[For instance Annotation
applications such as [Annot](http://annot.readthedocs.io/).] but their
evaluation would require a much larger study.

# Open Source web applications for KOS

The list given in [coli-conc report
2](http://coli-conc.gbv.de/publications/tr2.html) has been updated with
information about KOS editing and API features, source code repository, year of
last update, and rough number of contributors.

Name and Link|Editor|API|Language|License|Source|Update|Contributors
-------------|------|---|--------|-------|------|------|------------
[Semantic MediaWiki](https://www.semantic-mediawiki.org) | yes | yes | PHP | GPL | [GitHub](https://github.com/SemanticMediaWiki/SemanticMediaWiki/) | 2016 | 50
[Wikibase](http://wikiba.se/) | yes | yes | PHP | GPL | [Wikimedia](http://wikiba.se/components/) | 2016 | 30
[TemaTres](http://vocabularyserver.com/) | yes | yes | PHP | GPL | [GitHub](https://github.com/tematres/TemaTres-Vocabulary-Server)  | 2016 | 3
[iQvoc](http://iqvoc.net/) | yes | yes | Ruby | Apache | [GitHub](https://github.com/innoq/iqvoc) | 2016 | 12
[SKOS Editor](http://jbiomedsem.biomedcentral.com/articles/10.1186/s13326-015-0043-z) | yes | yes | Java | LGPL | [GitHub](https://github.com/Blulab-Utah/SKOSEditor) | 2016 | 7
[Ginco](http://culturecommunication.github.io/ginco/) | yes | yes | Java | CeCILL | [GitHub](https://github.com/culturecommunication/ginco) | 2016 | 9
[VocBench](http://vocbench.uniroma2.it/) | yes | no | Java | ? | [Bitbucket](https://bitbucket.org/art-uniroma2/vocbench)  | 2016 | 4
[Web Protégé](http://protegewiki.stanford.edu/wiki/WebProtege) | yes | ? | Java | BSD | [GitHub](http://github.com/protegeproject/webprotege) | 2015 | 4
SKOSjs | yes | no | JavaScript | Apache | [GitHub](https://github.com/tkurz/skosjs) | 2014 | 4
VoCol | yes | no | JavaScript | MIT | [GitHub](https://github.com/vocol/vocol) | 2016 | 5
[OpenSKOS](http://openskos.org/) | no | yes | PHP | GPL | [GitHub](https://github.com/OpenSKOS/OpenSKOS) | 2016 | 10
Django C.V.^[Django Controlled Vocabularies] | no | no | Python | BSD | [GitHub](https://github.com/unt-libraries/django-controlled-vocabularies) | 2016 | 4
Skosmos | no | yes | PHP | MIT | [GitHub](https://github.com/NatLibFi/Skosmos) | 2016 | 4
[SKOS Play](http://labs.sparna.fr/skos-play/about) | no | no | Java | CC-BY-SA | [Bitbucket](https://bitbucket.org/tfrancart/sparna) | 2016 | 1
[SISSVoc](http://www.sissvoc.info/) | no | yes | XSLT | Apache | [GitHub](https://github.com/SISS/sissvoc) | 2015 | 6
[ASKOSI](http://www.askosi.org/) | no | ? | Java | GPL | [Archive](http://www.askosi.org/example/) | 2011 | 1

## Software development

The updated list contains 16 web applications for knowledge organization
systems, written in six different programming languages (Java: 7, PHP: 5,
JavaScript: 2, Ruby/Python/XSLT: 1 each).  All applications except SISSVoc and
Django Controlled Vocabularies also use JavaScript for their web interface. All
projects except ASKOSI use git for version control, mainly hosted at GitHub.
At least half of the applications implement a web API to query or modify KOS
content in machine-readable form.

ASKOSI and SKOSjs will be excluded from the following evaluation because they
have not been updated since more then two years. All remaining projects except
SISSVoc have been updated in the last nine month, showing active development.
The number of contributors gives a rough estimate of the developer community.

## Typology of KOS applications

The applications can be grouped by several criteria for further evaluation.

### KOS tools vs. general ontology tools

Semantic MediaWiki, Wikibase, and Web Protégé are no KOS applications in a
stricter sense but they aim at the creation and management of ontologies,
semantic neworks, or knowledge bases.  It is possible to use them for KOSs but
more serious work requires some configuration, usage guidelines, and additional
tools or extensions [@Voss2016].

### KOS editors vs. KOS publishing tools

KOS editors can be used to create and modify taxonomies, thesauri, glossaries
or other kinds of KOS. Nine applications (including the general ontology tools)
can be used as KOS editor and five only provide read access. For instance
VocBench provides advanced editing capabilities with workflow and user
management but it recommends a SKOS Browser such as Skosmos to provide public
access to the resulting systems. KOS editors can further be grouped into simple
KOS editors and tools for KOS management. The latter include an editorial
workflow with user roles (e.g. editors and publishers) and publication 
states (e.g.  new, suggested, published, and deleted concepts).

### Resulting categories

The analysis of Open Source KOS web application types results in four
categories. KOS management tools and editors can mostly be used also for KOS
publishing but with less access-oriented features.

type            | applications
----------------|-----------------------------------------------------------------------
Ontology editor | Semantic MediaWiki, Wikibase, Web Protégé
KOS management  | iQvoc, TemaTres, VocBench, Ginco
KOS editor      | SKOS Editor, VoCol
KOS publishing  | OpenSKOS, Skosmos, SKOS Play, SISSVoc, Django Controlled Vocabularies

Two applications should be sorted out before evaluation because
of their specialized use case:

* SKOS Play generates visualizations and printable forms of KOS given in SKOS
  format.

* VoCol is a framework to support collaborative management of vocabularies in
  git repositories.


# Evaluation

An in-deep evaluation would first require definition of criteria and goals.
This report only gives an overview and recommendations for project coli-conc.
The project does not include editing KOS but creation of uniform access methods
to KOS information from multiple sources in JSKOS format [@JSKOS]. For each KOS
applications the question is whether to

* engage into adding JSKOS features to the software,
* create a wrapper to access the application's API,
* or to use exported SKOS files (if available).

ASKOSI, SKOSjs, SKOS Play and VoCol have been selected to be ignored.  For
ontology editors it neither makes sense to create a dedicated JSKOS API. A
wrapper to convert Wikidata (based on Wikibase) to JSKOS has already been
started instead.^[See <https://github.com/gbv/jskos-php-examples>] Focus on
most used programming languages also makes iQVoc (Ruby), Django Controlled
Vocabularies (Python), and SISSVoc (XSLT) candidates for more wrappers instead
of adding features to them.

Engagement in developer community should be considered for six projects to
natively support an API for querying KOS information in JSKOS format: TemaTres,
Skosmos, OpenSKOS (PHP) and SKOS Editor, Ginco, VocBench (Java). A PHP
framework for JSKOS processing and access is already being developed as part of
project coli-conc to build on.^[See <https://github.com/gbv/jskos-php>]

# Summary

This report collected information about sixteen Open Source web applications
for Knowledge Organization Systems (KOS). The applications can be grouped in
four categories (ontology editor, KOS management, KOS editor, KOS publishing).
The report does not include a detailed evaluation but recommendations for
project coli-conc. Three PHP-based projects and three Java-based projects have
been identified for possible collaboration in software development.

# References

