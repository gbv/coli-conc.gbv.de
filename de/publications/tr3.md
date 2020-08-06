---
isFallback: true
layout: layouts/blog
permalink: /publications/tr3.html
tags:
 - blog
series: coli-conc Technical Report
number: 3
title: A novel approach to terminology mappings
excerpt: This report presents a new architecture for managing large numbers of concordances
author:
    name: Jakob Voß
    email: jakob.voss@gbv.de
    affiliation: Verbundzentrale des GBV (VZG)
date: 2016-04-01
doi: 10.5281/zenodo.48740
license: CC-BY-SA
---

# Introduction

The need of mappings between terminologies, vocabularies, ontologies, and other
kinds of knowledge organization systems has been articulated since introduction
of such systems at large scale.^[For instance at the 1910 conference of the
International Federation for Information and Documentation (FID).] For this
reason [project coli-conc](https://coli-conc.gbv.de/) aims at developing an
infrastructure to facilitate management and exchange of (cross-)concordances
between terminologies.  This report outlines a novel architecure of terminology
mappings to ultimately connect all knowledge organization systems.

# Background

As soon as concordances cross more than two vocabularies, multiple
architectures can be applied [@ISO25964-2]. For small numbers, a many-to-many
architecture is feasable, but for more terminologies a hub architecture becomes
more appropriate [@Binding2015; @Soergel2011].  This requires people to agree
on a common hub, but people tend to not agree especially on issues of knowledge
organization. Networks of cross-concordances have been applied with success
[@Mayr2008] but web-scale applications of distributed mappings require a new
architecure.

| Many-to-many architecture |  Hub architecture |
|---------------------------|------------------|
| ![](/images/m2m.png)      | ![](/images/hub.png) |

# The noodle architecture

We propose the "noodle achitecture" as opposed to the many-to-many architecture
and the hub architecture for managing a large number of concordances. In our
model each knowledge organization system is once mapped to one other system.
This second system is not a central hub but just another terminoloy that
happens to be the last one not connected with two other terminologies yet. The
resulting data structure has the shape of a very long noodle.

| Noodle architecture |
|---------------------|
| ![](/images/noodle.png) |

This architecture scales as well as the hub architecture but no central
terminology is required. We expect this to result in much less debate among
information architects because all terminologies are treated equally.  To
ensure that only one terminology is added at a time at the end of the noodle,
the whole data structure is managed as blockchain: this kind of distributed
database known from Bitcoin can be applied to other domains as well
[@Nakamoto2008].

# Summary

This report introduces a novel approach to manage a very large^[In notions of big
data as explained by @Shaw2015.] number of mappings between any kind of
knowledge organization systems. The so called noodle architecture combines the
benefit of a hub architecture with less struggle about which system to use as
central hub.

# References

