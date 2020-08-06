---
layout: layouts/blog
permalink: /publications/tr1.html
tags:
 - blog
title: Cocoda primer
excerpt: This report briefly summarizes prototype and architecture of a mapping tool that is being created as part of project coli-conc.
date: 2015-04-13
# following metadata copied from old TR, not fully processed yet!
series: coli-conc Technical Report
number: 1
author:
    name: Jakob Voß
    email: jakob.voss@gbv.de
    affiliation: Verbundzentrale des GBV (VZG)
doi: 10.5281/zenodo.16786
license: CC-BY-SA
---

This report briefly summarizes prototype and architecture of a mapping tool
that is being created as part of [project coli-conc](https://coli-conc.gbv.de/)
at the head office of GBV Common Library Network (VZG). Project coli-conc aims
at developing an infrastructure to facilitate management and exchange of
concordances between library knowledge organization systems. This includes a
modular web application named Cocoda.

# Overview

For the most part knowledge organization systems in Cocoda are represented in
the popular [SKOS](http://www.w3.org/TR/skos-reference/) data model: a
particular knowledge organization system is called a **concept scheme**
consisting of a set of possibly connected **concepts** with, **labels**,
**notations**, and other properties. A **mapping** relates similar concepts
from one concept scheme to concepts of another concept scheme. A set of
mappings between two concept schemes is called **concordance**. The main
application of Cocoda is going to be the creation and evaluation of mappings
and concordances with Dewey Decimal Classification (DDC) as primary use case.

# Technical architecture

The technical architecture of Cocoda consists of seven layers. The
following table lists each of them with current status and choice of
technologies:

| **description**                 | **state**           | **technology**        |
|:--------------------------------|:--------------------|:----------------------|
| web interface                   | first prototype     | HTML, CSS, JavaScript |
| JavaScript client modules       | alpha releases      | AngularJS             |
| JSKOS data format               | incomplete draft    | JSON(-LD)             |
| JSKOS API and wrappers          | drafts and ideas    | HTTP, JSON            |
| JSKOS databases                 | first prototype     | CouchDB               |
| mapping recommendation services | ideas & experiments | not implemented yet   |
| quality assessment services     | ideas               | not implemented yet   |
| user management                 | ideas               | not implemented yet   |

## Web interface

The current user interface of Cocoda web application is only a
preliminary prototype to test functionalities. Later versions will be
subject to usability studies.

## JavaScript client modules

The web interface is build of independent JavaScript modules, which can also be
used in other applications. Two of these modules have already been published as
early alpha releases: [ng-skos](https://gbv.github.io/ng-skos/) is a general
module for simple knowledge organization systems and
[ng-suggest](https://gbv.github.io/ng-suggest) provides typeahead via
OpenSearch Suggestions API. All modules are based on
[AngularJS](https://angularjs.org/) because it seemed to be the most popular
web application framework. A later version may also choose Web Components,
plain jQuery or another JavaScript framework.

## JSKOS data format

The JSKOS representation of knowledge organization system data is being
developed based on SKOS and [JSON-LD](http://json-ld.org/). This format combines the
benefit of RDF for data aggregation and JSON for easy manipulation and
storage. The current draft of JSKOS is available at
[https://gbv.github.io/jskos/](http://couchdb.apache.org/).

## JSKOS API and wrappers

Several APIs and services exist to query and store knowledge organization
systems ([Skosmos](https://github.com/NatLibFi/Skosmos/),
[Poolparty](http://www.poolparty.biz/)
[iQvoc](http://iqvoc.net/), [VocBench](http://vocbench.uniroma2.it/),
[Wikidata](https://www.wikidata.org/), [lobid.org](http://lobid.org/api)...).
As part of coli-conc we will evaluate and compare these APIs and create
wrappers to a common JSKOS-API. The current prototype makes use of API of
lobid.org RVK. Both wrappers and API specification will be made available at
[https://gbv.github.io/jskos-api/](https://github.com/NatLibFi/Skosmos/).

## JSKOS databases

[CouchDB](http://couchdb.apache.org/) databases are used to store concepts and
mappings in JSKOS format. A copy of German DDC in MARCXML has been transformed
to this format for easy access with Cocoda web application. Both database and
DDC data are not public by now.

## Mapping recommendation services

The creation and management of mappings will be supported by several
mapping recommendation services based automatic search for concept
labels, existing mappings, connected concepts, and occurrences in
library catalogs. The current prototype contains some static examples
for illustration and testing.

