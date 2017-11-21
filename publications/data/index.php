<?php
$BASE = '../..';
include "$BASE/header.php";
?>

<p>
  We collect and (re)publish data related to concordances and knowledge organization systems.
</p>
<ul>
  <li>
    Basisiklassifikation in <a href="bk.ttl">RDF (Turtle)</a> and <a href="bk.ndjson">JSKOS (ndjson)</a>
  </li>
  <li>
    <a href="../../concordances/">Concordances</a>
  </li>
  <li>
    We daily harvest and convert 
    <a href="../../concordances/wikidata">authority file mappings from Wikidata</a>.
  </li>
  <li>
    <a href="../bartoc">BARTOC database dumps</a>
  </li>
  <li>
    <a href="../licenses">List of common licenses</a>
  </li>
  <li>
    <a href="../kostypes">Classification of Knowledge Organization Systems</a>
  </li>
</ul>

<p>
  See also <a href="https://github.com/gbv/jskos-data">jskos-data</a> repository for a collection
  of knowledge organization systems encoded in JSKOS
<p>

<?php
include "$BASE/footer.php";
