<?php
$BASE = '..';
$TITLE = 'Cocoda';
$FORMAT = 'markdown';
include "$BASE/header.php";
?>

<figure style="float:right; padding-left: 1em;">
  <a href="../img/cocoda-quick-screencast.webm">
  <video autoplay loop muted width="600px" style="border: 2px solid black">
    <source src="../img/cocoda-quick-screencast.webm" type="video/webm">
    <source src="../img/cocoda-quick-screencast.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  </a>
  <figcaption style="text-align:center;">
    mapping with Cocoda is easy: <a href="app/">give it a try!</a>
  </figcaption>
</figure>

Cocoda is a web application to manage and create mappings between knowledge organization systems, such as classifications, authority files, and thesauri. The [cocoda manual](https://gbv.github.io/cocoda/#manual) (see also the [manual in German](https://coli-conc.gbv.de/cocoda/app/user-manual-de.html)) gives a short introduction.

##### ➡  [Start the current Cocoda release version](app/)

##### ➡  [Start Cocoda instance optimized for RVK](rvk/)

##### ➡  [Start Cocoda instance optimized for Wikidata](wikidata/)

&nbsp;

#### Additional resources

* Our [**current development version**](https://coli-conc.gbv.de/cocoda/dev/) (and [at gbv.github.io](https://gbv.github.io/cocoda/dev/))
* [Source code repository](https://github.com/gbv/cocoda) and [issue tracker](https://github.com/gbv/cocoda/issues) are public

##### Screencasts

* [Wikidata-Mappings mit Cocoda 1.1.0](https://vimeo.com/357295989) German (13 minutes, 2019-09-02)
* [Quick Demo of Cocoda 0.9.3](../img/cocoda-quick-screencast.mp4) (30 seconds, 2019-06-25)
* [Neue Features in Cocoda 0.8.0](https://vimeo.com/323457260) (7 minutes, 2019-03-13)
* [Neue Features in Cocoda 0.7.0](https://vimeo.com/312681760) (3 minutes, 2019-01-22)
* [Mapping mit Cocoda 0.6.0](https://vimeo.com/307653028) (5 minutes, 2018-12-21)
* [Kurzeinführung Mapping mit Cocoda 0.5.1](https://vimeo.com/296616305) (3 minutes, 2018-10-23)

##### Release history

The following table lists all releases, most of them can still be used.
The first prototype of Cocoda was started in February 2014: the source
is [archived at GitHub](https://github.com/gbv/cocoda-prototype) and
[this screencast](https://vimeo.com/309446476) gives an impression. 

<table class="table table-sm" id="release-table" style="width: 60%">
 <tr>
   <th>version</th>
   <th>date</th>
   <th>link</th>
 </tr>
</table>

<script type="text/javascript">
$(document).ready(function(){
  $.getJSON('./status/builds.json', function(releases) {
    Object.keys(releases).reverse().forEach( function(version) {
      var date = releases[version].date
      date = date ? date.substr(0,10) : ""
      var row = $('<tr>')
      row.append('<td>'+version+'</td>')
      row.append('<td>'+date+'</td>')
      row.append('<td><a href="./'+version+'/">Try out!</a></td>')
      $('#release-table').append(row)
    })
  })
})
</script>
