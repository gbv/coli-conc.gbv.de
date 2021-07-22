---
layout: layouts/page
title: coli-ana
---

{% section %}

**coli-ana** is a project focused on the analysis of synthesized DDC numbers.
The number analyzer (vz_day) is being developed as part of the VZG project
colibri, of which coli-conc is also a sub-project. coli-conc plans to
intergrate the results of coli-ana into its infrastructure and offer
information on decomposed DDC numbers in different formats (JSKOS, MARC,
PICA...). The results can be of a great value for subject-indexers, concept
mapping, and for the research community.

A tool to analyze a given synthesized DDC number is made available for testing:

{% button "https://coli-conc.gbv.de/coli-ana/app/", "Start coli-ana release version" %}

→ [Start coli-ana development version](https://coli-conc.gbv.de/coli-ana/dev/)

{% small %}
[What is the difference?](#faq)
{% endsmall %}

{% endsection %}

{% section %}

## Example

Given a synthesized DDC number, it can be hard to find out how the number was built. For instance, the DDC number **700.90440747471** contains the following DDC classes:

* [700](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F700%2Fe23%2F) The arts
* [T1--09044](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--09044%2Fe23%2F) 1940-1949
* [T1--074](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--074%2Fe23%2F) Museums, collections, exhibits
* [T2--7471](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F2--7471%2Fe23%2F) New York

With coli-ana it is possible [to analyze the DDC number](https://coli-conc.gbv.de/coli-ana/app/?notation=700.90440747471) and determine every single DDC class that was used for building the number. The result can also [be queried via an API](https://coli-conc.gbv.de/coli-ana/app/analyze?notation=700.90440747471) in [JSKOS data format](https://gbv.github.io/jskos/) and other formats.

{% endsection %}

{% section %}

## Documentation

A brief introduction to coli-ana was given [in this Code4Lib 2021 lightening talk](https://www.youtube.com/watch?v=pIY65nr8Byo&t=1441s).

The primary application of coli-ana is to enrich the [K10plus union catalog](https://www.bszgbv.de/services/k10plus/). Bibliographic records with DDC number will be extended [in PICA format](https://format.k10plus.de/k10plushelp.pl?cmd=kat&val=5400&katalog=Standard).

More information about coli-ana can be found in the presentation [Automatic Analysis of DDC Numbers based on MARC21](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2016/pdf/reiner_160425_EDUG_Symposium.pdf) given by Ulrike Reiner at the EDUG Symposium 2016 and in the article [Automatic Analysis of Dewey Decimal Classification Notations](https://www.gbv.de/Verbundzentrale/Publikationen/2008/2008/pdf/pdf_3936.pdf) (2008). An earlier attempt to decompose DDC numbers was conducted by Songqiao Liu, see the article [Decomposing DDC Synthesized Numbers](http://archive.ifla.org/IV/ifla62/62-sonl.htm) (1996).

{% endsection %}

{% section %}

## FAQ

### What is the difference between the development and the release version?

The development version contains all the latest features and changes and usually represents the most current status of development of the tool. However, this means that it might also contain bugs or other issues that haven't been fixed yet.

When the development version reaches a point where bugs are fixed and everything works well, it will be merged into the release version. Therefore, the release version is always a bit behind the development version, but will be more stable and is less likely to break.

### What is the difference between "analyze" and "lookup"?

In the coli-ana web interface, there are two buttons: "analyze" and "lookup". "analyze" analyzes a given DDC number and shows how the number was built. This will usually be performed on the fly and represents the latest analysis of the vz_day number analyzer.

"lookup", however, uses pre-analyzed DDC numbers of the GVK union catalog (soon to be updated to the latest data of the K10plus union catalog) and searches for a given number inside those analyses. This means that a lookup will show the DDC numbers **which were built using one of the given DDC numbers**. This currently has limited application since the result sets are usually very large and can't be fully explored in the interface.

### I have gotten a different result for the same number. How can that happen?

There are two ways how a result can differ from previous results:

1. The vz_day number analyzer was updated and the analysis of the given number has changed.
2. There is a problem in the backend and the result comes from a database cache (that potentially contains old results).

The database cache contains pre-analyzed numbers from the GVK union catalog and might not have used the current version of the number analyzer.

{% endsection %}
