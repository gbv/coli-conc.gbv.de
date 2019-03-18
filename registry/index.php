<?php
$BASE = '..';
$TITLE = 'Data sources and registries';
include "$BASE/header.php";
?>

<p>
  Data about Knowledge organization systems and their concordances can be 
  available from many sources. We unify access to diverse data sources,
  including those with write-access, by mapping their data formats to
  <a href="https://gbv.github.io/jskos/">JSKOS format</a>.
  <a href="../cocoda">Cocoda</a> organizes access to multiple data sources
  as <strong>registries</strong>. A registry is an individual source of data
  with known capabilities
  (see <a href="https://gbv.github.io/cocoda/#registries">Cocoda manual</a>).
</p>

<h4>Supported registries</h4>
<p>See <a href="registries.ndjson">registries.ndjson</a> for full list and metadata.</p>
<?php
require_once 'registries.php';
echo '<ul style="padding-left: 1em;">';
foreach ($registries as $reg) {
    $title = $reg['prefLabel']['en'] ?? $reg['prefLabel']['de'];
    $uri = $reg['uri'];
    $descr = $reg['definition']['en'][0] ?? '';
    $notation = $reg['notation'][0];
?>
    <li style="list-style:none; margin-bottom: 10px;">
      <b><?=$notation?></b> 
      <a href='<?=$uri?>'><?=$title?></a>
      <?php if ($descr) { echo "<br>$descr"; } ?>
    </li>
<?php
}
echo '</ul>';
?>
