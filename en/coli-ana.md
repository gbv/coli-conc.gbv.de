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

More information about coli-ana can be found in the presentation [Automatic Analysis of DDC Numbers based on MARC21](https://www.gbv.de/Verbundzentrale/Publikationen/publikationen-der-vzg-2016/pdf/reiner_160425_EDUG_Symposium.pdf) given by Ulrike Reiner at EDUG Symposium 2016.


{% endsection %}

{% section %}

###### Example

The synthesized DDC number [700.90440747471](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F700.90440747471%2Fe23%2F) can be composed from:

* [700](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F700%2Fe23%2F) Modern arts
* [T1--09044](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--09044%2Fe23%2F) 1940-1949
* [T1--074](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F1--074%2Fe23%2F) Museums, collections, exhibits
* [T2--7471](https://coli-conc.gbv.de/cocoda/app/?fromScheme=http%3A%2F%2Fdewey.info%2Fscheme%2Fedition%2Fe23%2F&from=http%3A%2F%2Fdewey.info%2Fclass%2F2--7471%2Fe23%2F) New York Metropolitan Area

The following mockup show how integration of coli-ana into [Cocoda mapping
tool]({{ "/cocoda/" | url }}) could look like:

{% image "/images/coli-ana.png", "", "mockup of coli-ana" %}

In [JSKOS data format](https://gbv.github.io/jskos/) this would be expressed as:

~~~json
{
  "notation": [ "700.90440747471" ],
  "memberList": [
    { "uri": "http://dewey.info/class/700/e23/", "notation": "700" },
    { "uri": "http://dewey.info/class/1--09044/e23/", "notation": "T1--09044" },
    { "uri": "http://dewey.info/class/1--074/e23/", "notation": "T1--074" },
    { "uri": "http://dewey.info/class/2--7471/e23/", "notation": "T2--7471" }
  ]
}
~~~

{% endsection %}
