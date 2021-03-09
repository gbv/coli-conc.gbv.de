---
layout: layouts/page
title: coli-ana
---

{% section %}

**coli-ana** is a tool for analysis of synthesized DDC numbers. The tool is
being developed as part of project colibri, of which coli-conc is also a
sub-project. coli-conc plans to intergrate the results of  coli-ana into its
infrastructure and  provide information on decomposed DDC numbers in different
formats (MARC, JSKOS...). The results of this tool present a great value for
subject-indexers, mapping works and for the research community.

{% button "https://coli-conc.gbv.de/coli-ana/app/", "Start the current coli-ana release version" %}

→ [Start latest development version](https://coli-conc.gbv.de/coli-ana/dev/)

*The current version only supports a limited set of notations for testing!*

More information about coli-ana can be found in the presentation [Automatic Analysis of DDC Numbers based on MARC21](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2016/pdf/reiner_160425_EDUG_Symposium.pdf) given by Ulrike Reiner at EDUG Symposium 2016.

{% endsection %}

{% section %}

## Example

Given a DDC number it is hard to find out which elements it was build from. For instance the synthesized DDC number **700.90440747471** can be composed from:

* [700](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F700%2Fe23%2F) Modern arts
* [T1--09044](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--09044%2Fe23%2F) 1940-1949
* [T1--074](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--074%2Fe23%2F) Museums, collections, exhibits
* [T2--7471](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F2--7471%2Fe23%2F) New York Metropolitan Area

With coli-ana it is possible [to look up the number](https://coli-conc.gbv.de/coli-ana/app/700.90440747471) fully analyzed. The result can also [be queried via an API](https://coli-conc.gbv.de/coli-ana/app/decompose?notation=700.90440747471) in [JSKOS data format](https://gbv.github.io/jskos/) and in other forms.

{% endsection %}
