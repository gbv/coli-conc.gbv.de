---
isFallback: true
layout: layouts/blog
permalink: /publications/tr2.html
tags:
 - blog
title: Open Source KOS software
excerpt: This report gives an overview about Open Source software for Knowledge Organization Systems (KOS)
date: 2016-03-24
author:
    name: Jakob Voß
    email: jakob.voss@gbv.de
    affiliation: Verbundzentrale des GBV (VZG)
doi: 10.5281/zenodo.48227
license: CC-BY-SA
series: coli-conc Technical Report
number: 2
---

This report gives an overview about Open Source software for Knowledge
Organization Systems (KOS).

# Motivation

Project [coli-conc](https://coli-conc.gbv.de/) aims at concordances between
Knowledge Organization Systems (KOS). To manage such concordances it first
requires access to KOS and its concepts. The lack of a satisfying general data
format and method of access to KOS, apart from SKOS and SPARQL, resulted in the
(ongoing) specification of [JSKOS data format](http://gbv.github.io/jskos/) and
[JSKOS-API](http://gbv.github.io/jskos-api/). To integrate existing KOS via
these standards, there are three options:

1. Conversion of KOS to JSKOS import into a database with support of JSKOS-API
2. Creation of JSKOS-API wrappers to existing terminology services
3. Add support of JSKOS-API to existing KOS software

The first option is executed at VZG for the most needed systems such as Dewey
Decimal Classification (DDC) and Regensburger Verbundklassifikation (RVK).
First examples of the second option are given at
<https://github.com/gbv/jskos-php-examples>. But only the third option will
scale to larger number of KOS. Open source luckily allows to extend existing
software. For this reason an overview of Open Source software for Knowledge
Organization Systems (KOS) is needed.

# Existing lists of KOS software (a metabibliography)

Project coli-conc does not include creation of software to manage KOS because
such software already exists in form of thesaurus editors, vocabulary
management systems and similar tools.  The following lists of KOS software were
used to find open source software (including commercial products with an open
source version):

* The [coli-conc Zotero library](https://www.zotero.org/groups/coli-conc/items/)
  contains [a section on software](https://www.zotero.org/groups/coli-conc/items/collectionKey/W5F4ENNP)
  with almost 30 entries.

* The [*ANDS appraisal of thesaurus software tools*](https://rd-alliance.org/system/files/documents/Thesaurus%20Software%20Tools.xlsx) is an Excel sheet created by members of the
  [Vocabulary Services Interest Group](https://rd-alliance.org/node/47826)
  of Research Data Alliance (RDA). It contains 39 software systems, some of

* The [TaxoBank Terminology Registry](http://www.taxobank.org/) has a list of
  [Software for building and editing thesauri](http://www.taxobank.org/content/thesauri-and-vocabulary-control-thesaurus-software) originally created by Leonard D. Will

Several more lists of taxonomy tools, ontology editors etc. exists so some
tools may have been missed. Feedback is welcome!

# Open Source KOS software

Name and Link|Language|License
-------------|--------|-------
[Apelon Distributed Terminology System (DTS)](http://apelon-dts.sourceforge.net/) | Java | Apache
[ASKOSI](http://www.askosi.org/) | Java | GPL   
[Django Controlled Vocabularies](https://github.com/unt-libraries/django-controlled-vocabularies) | Python | BSD  
[FreeMind](http://freemind.sourceforge.net/) | Java | Apache
[iQvoc](http://iqvoc.net/) | Ruby | Apache
[OpenSKOS](http://openskos.org/) | PHP | GPL
[Protégé](http://protege.stanford.edu/) | Java | BSD
[Semantic MediaWiki](https://www.semantic-mediawiki.org) | PHP | GPL
[SISSVoc](http://www.sissvoc.info/) | Java & XSLT | Apache
[SKOS API](http://skosapi.sourceforge.net/) | Java | LGPL     
[Skosify](https://github.com/NatLibFi/Skosify) | Python | MIT 
[SKOSjs](https://github.com/tkurz/skosjs) | JavaScript | Apache   
[Skosmos](https://github.com/NatLibFi/Skosmos) | PHP | MIT  | 
[skosprovider](https://github.com/koenedaele/skosprovider) | Python | MIT  
[TemaTres](http://vocabularyserver.com/) | PHP | GPL  
[VocBench](http://vocbench.uniroma2.it/) | Java | ?    
[Web Protégé](http://protegewiki.stanford.edu/wiki/WebProtege) | Java | BSD  
[XMind](http://www.xmind.net/developer/) | Java | LGPL & EPL   
[VoCol](https://github.com/vocol/vocol) | Java & JavaScript | MIT  
[Wandora](http://wandora.org/) | Java | GPL  
[Wikibase](http://wikiba.se/) | PHP | GPL

# Summary

The resulting list of software contains small and large projects, web
applications and desktop applications, popular and less used software.
Additional evaluation is needed to decide which products to focus on.
Nevertheless the list shows that Java and PHP are the most used programming
languages, so programming libraries for JSKOS(-API) should first be implemented
in these languages (in addition to JavaScript which is needed for web clients).
A first start has been made with a 
[JSKOS programming library in PHP](https://packagist.org/packages/gbv/jskos).
