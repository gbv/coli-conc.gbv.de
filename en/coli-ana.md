---
layout: layouts/page
title: coli-ana
subtitle: "[![Status](https://coli-conc-status.fly.dev/api/badge/20/status)](https://coli-conc-status.fly.dev/status/all)"
---

{% section "textPadding" %}

**coli-ana** is a tool that analyzes and decomposes synthesized DDC numbers.
The number analyzer (vc_day) has been developed as part of the VZG project
colibri, of which coli-conc is also a sub-project. The results of coli-ana has been
intergrated into the infrastructure of coli-conc and information on the decomposed DDC numbers are provided in different formats (JSKOS, MARC,
PICA...). The results could be of a great value not only for subject indexers and for concept
mapping, but also for the research community.

A tool to analyze any given synthesized DDC number is made available for trial purposes:

{% button "/coli-ana/app/", "Start coli-ana release version" %}

→ [Start coli-ana development version](/coli-ana/dev/)

{% small %}
[What is the difference?](#faq)
{% endsmall %}

A snapshot with 473.161 decomposed DDC numbers from K10plus catalogue is made available as open data at <https://doi.org/10.5281/zenodo.10569320>.

A German summary of coli-ana and its application can be found [in this article (spring 2022)](/de/blog/2022/02/04/coli-ana/).

{% endsection %}

{% section "textPadding" %}

## Example

For a given  synthesized DDC number, it can be hard to find out, how the number was built. For instance, the DDC number **700.90440747471** contains the following DDC classes:

* [700](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F700%2Fe23%2F) {{ { en: "The arts", de: "Künste" } | localize }}
* [T1--09044](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--09044%2Fe23%2F) {{ { en: "1940-1949", de: "*1940-1949" } | localize }}
* [T1--074](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--074%2Fe23%2F) {{ { en: "Museums, collections, exhibits", de: "Museen, Sammlungen, Ausstellungen" } | localize }}
* [T2--7471](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F2--7471%2Fe23%2F) New York

coli-ana enables [to analyze the DDC number](/coli-ana/app/?notation=700.90440747471) and determine every single DDC class that was used to build the number. The result can also [be queried via an API](https://coli-conc.gbv.de/coli-ana/app/analyze?notation=700.90440747471) in [JSKOS data format](https://gbv.github.io/jskos/) and in various other formats.

{% endsection %}

{% section "textPadding" %}

## Documentation

The presentation *Automatic Analysis of the Dewey Decimal Classification: A Service of the Verbundzentrale des GBV* at SWIB 2021 conference gives an overview about the project. See [video recording](https://youtu.be/gNm8HuX71rI) and [slides](https://doi.org/10.5281/zenodo.5883534).

A brief introduction to coli-ana was given at: [in this Code4Lib 2021 lightening talk](https://www.youtube.com/watch?v=pIY65nr8Byo&t=1441s).

The primary goal of coli-ana is to enrich the [K10plus union catalog](https://www.bszgbv.de/services/k10plus/). Bibliographic records with DDC number will be extended [in PICA format](https://format.k10plus.de/k10plushelp.pl?cmd=kat&val=5400&katalog=Standard).

More information about coli-ana can be found in the presentation [Automatic Analysis of DDC Numbers based on MARC21](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2016/pdf/reiner_160425_EDUG_Symposium.pdf) given by Ulrike Reiner at the EDUG Symposium 2016 and in the article [Automatic Analysis of Dewey Decimal Classification Notations](https://www.gbv.de/Verbundzentrale/Publikationen/2008/2008/pdf/pdf_3936.pdf) (2008). An earlier attempt to decompose DDC numbers was conducted by Songqiao Liu, see the article [Decomposing DDC Synthesized Numbers](http://archive.ifla.org/IV/ifla62/62-sonl.htm) (1996).

{% endsection %}

{% section "textPadding" %}

## FAQ

##### What is the difference between the development and the release version?

The development version contains all the latest features and changes. It usually represents the most current status of development of the tool. However, this means that it might also contain bugs or other issues that haven't been fixed yet.

When the development version reaches a point where bugs are fixed and everything works well, it will be merged into the release version. Therefore, the release version is always a bit behind than the development version, but is more stable and less likely to break.

##### I have got a different result for the same number. How can that happen?

There are two reasons why a result can differ from previous results:

1. The vc_day number analyzer was updated and the analysis of the given number has changed.
2. There is a problem in the backend and the result comes from a database cache (that potentially contains old results).

The database cache contains pre-analyzed numbers from the GVK union catalog and might not have used the current version of the number analyzer.

##### Where do I find details to each DDC class?

Links with details about each element of a built number are available via icons right to each notation.

##### How do I access the rules applied in the analysis of a built number?

It is planned to display rules applied in the analysis of each built number.

##### What other features does the coli-ana web-service provide?

The webservice offers several other features:

* A list of titles indexed with the current notation in K10plus union catalog. A deep link to search in the catalog interface is shown next to each notation.
* Seamless transition to the mapping tool Cocoda.

{% endsection %}
