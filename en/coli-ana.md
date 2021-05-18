---
layout: layouts/page
title: coli-ana
---

{% section %}

**coli-ana** is a project aimed for the analysis of synthesized DDC numbers.
The number analyzer (vz_day) is being developed as part of the VZG project
colibri, of which coli-conc is also a sub-project. coli-conc plans to
intergrate the results of coli-ana into its infrastructure and make available
information on decomposed DDC numbers in different formats (JSKOS, MARC,
PICA...). The results can be of a great value for subject-indexers, concept
mapping and for the research community.

A tool to query and display analyzed DDC numbers is made available for testing.
By now it only contains a limited set of notations imported from vz_day:

{% button "https://coli-conc.gbv.de/coli-ana/app/", "Start coli-ana release version" %}

→ [Start coli-ana development version](https://coli-conc.gbv.de/coli-ana/dev/)

{% endsection %}

{% section %}

## Example

Given a synthesized DDC number, it can be hard to find out how the number was build. For instance the DDC number **700.90440747471** contains the following DDC classes:

* [700](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F700%2Fe23%2F) Modern arts
* [T1--09044](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--09044%2Fe23%2F) 1940-1949
* [T1--074](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--074%2Fe23%2F) Museums, collections, exhibits
* [T2--7471](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F2--7471%2Fe23%2F) New York Metropolitan Area

With coli-ana it is possible [to look up the DDC number](https://coli-conc.gbv.de/coli-ana/app/700.90440747471) with every single DDC class contained. The result can also [be queried via an API](https://coli-conc.gbv.de/coli-ana/app/decompose?notation=700.90440747471) in [JSKOS data format](https://gbv.github.io/jskos/) and in other forms.

{% endsection %}

{% section %}

## Documentation

A brief introduction to coli-ana was given [in this Code4Lib 2021 lightening talk](https://www.youtube.com/watch?v=pIY65nr8Byo&t=1441s).

The primary application of coli-ana is to enrich the [K10plus union catalog](https://www.bszgbv.de/services/k10plus/). Bibliographic records with DDC number will be extended [in PICA format](https://format.k10plus.de/k10plushelp.pl?cmd=kat&val=5400&katalog=Standard).

More information about coli-ana can be found in the presentation [Automatic Analysis of DDC Numbers based on MARC21](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2016/pdf/reiner_160425_EDUG_Symposium.pdf) given by Ulrike Reiner at the EDUG Symposium 2016 and in the article [Automatic Analysis of Dewey Decimal Classification Notations](https://www.gbv.de/Verbundzentrale/Publikationen/2008/2008/pdf/pdf_3936.pdf) (2008). An earlier attempt to decompose DDC numbers was conducted by Songqiao Liu, see the article [Decomposing DDC Synthesized Numbers](http://archive.ifla.org/IV/ifla62/62-sonl.htm) (1996).

{% endsection %}
