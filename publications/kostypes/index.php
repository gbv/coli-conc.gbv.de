<?php
$BASE = '../..';
$TITLE = 'Classification of Knowledge Organization Systems';
$REQUIREJS[] = 'bootstrap-treeview.js';
$REQUIREJS[] = 'jskos.js';
include "$BASE/header.php";

?>

<p>
  The following classification of Knowledge Organization Systems has been extracted from Wikidata
  <a href="#references">as described below</a>.
</p>
<h3>Current classification</h3>
<p>
  Wikidata can change quickly so this is a snapshot
  from <?= date('Y-m-d',filemtime('Q6423319.json')) ?>.
  <ul>
    <li><a href="Q6423319.json">JSKOS data (full classification)</a></li>
    <li><a href="Q6423319.ndjson">JSKOS data (classes only)</a></li>
  </ul>
</p>
<div id="tree"></div>

<p>
  The number right of each KOS type indicate the
  <span class="badge badge-default">number of instances</span>
  <!--
  (<?=$totalInstances ?> in total at <?=$withInstances?> of <?=count($kostypes)?> KOS types,
  <?=sprintf("%2d%%", 100*$withInstances/count($kostypes))?>)
  -->
  and the
  <span class="badge badge-success">number of Wikipedia articles</span>.
  <!--
  (<?=$totalSites ?> in total at <?=$withSites?> of <?=count($kostypes)?> KOS types,
  <?=sprintf("%2d%%", 100*$withSites/count($kostypes))?>).
  -->
</p>

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
    <a href="https://doi.org/10.5281/zenodo.61767">https://doi.org/10.5281/zenodo.61767</a>
    </li>
    <li>
    <a href="https://github.com/nichtich/wikidata-taxonomy">wikidata-taxonomy</a> command-line tool to extract taxonomies from Wikidata
    </li> 
  </ul>
</p>

<script type="text/javascript" src="jskos-treeview.js"></script>

<?php
include "$BASE/footer.php";
