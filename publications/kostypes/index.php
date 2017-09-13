<?php
$BASE = '../..';
include "$BASE/header.php";

//$url = "http://api.dante.gbv.de/voc/license/top?properties=*";
//$licenses = json_decode(file_get_contents($url), true);
?>

<!--p>
  The following classification of Knowledge Organization Systems has been extracted from Wikidata
  <a href="#references"as described below</a>. 
</p-->

<h3 id='references'>Background and references</h3>
<p>
  <ul>
    <li>Voß, Jakob: 
      Classification of Knowledge Organization Systems with Wikidata.
      In: <a href="http://ceur-ws.org/Vol-1676/">Proceedings of the 15th European Networked Knowledge Organization Systems Workshop (NKOS 2016)</a>, p 15-22. CEUR Workshop Proceedings, Volume 1676.
      <a href="http://ceur-ws.org/Vol-1676/paper2.pdf">http://ceur-ws.org/Vol-1676/paper2.pdf</a>
    </li>
    <li>
    Presentation at <a href="https://at-web1.comp.glam.ac.uk/pages/research/hypermedia/nkos/nkos2016/programme.html">15<sup>th</sup> European NKOS workshop at TPDL</a>,
    September, 9<sup>th</sup>, 2016 in Hannover.
    <a href="http://dx.doi.org/10.5281/zenodo.61767">http://doi.org/10.5281/zenodo.61767</a>
    </li>
    <li>
    <a href="https://github.com/nichtich/wikidata-taxonomy">wikidata-taxonomy</a> command-line tool to extract taxonomies from Wikidata
    </li> 
  </ul>
</p>

<?php
include "$BASE/footer.php";
