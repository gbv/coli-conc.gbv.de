<?php
$BASE = '..';
$TITLE = 'Registries';
include "$BASE/header.php";
?>

<p>Uniform access to knowledge organization systems and concordances from diverse sources is established with:</p>
<ul>
<li>a data format that all related information as converted to (<a href="https://gbv.github.io/jskos/">JSKOS format</a>)</li>
<li>a set of web services that provide JSKOS format (JSKOS API, not fully specified yet)</li>
<li>a set of Node libraries to access data sources in JSKOS format (see <a href="../publications/software">software</a>)</li>
</ul>
<p><a href="../cocoda">Cocoda web application</a> makes use of these unification via <strong>registries</strong>. A registry is an individual source of data, for instance the <a href="../concordances">concordance registry</a> or another public web service (see <a href="https://gbv.github.io/cocoda/#registries">Cocoda manual</a>).</p>

<h4>Available registries</h4>
<?php
require_once 'registries.php';
echo '<ul>';
foreach ($registries as $reg) {
    $title = $reg['prefLabel']['en'] ?? $reg['prefLabel']['de'];
    $url = $reg['uri'];
    echo "<li><a href='$url'>$title</a></li>";
}
echo '</ul>';
?>
