<?php
$BASE = '../..';
$TITLE = 'Classification of Knowledge Organization Systems';
$REQUIREJS[] = 'bootstrap-treeview.js';
include "$BASE/header.php";

$kostypes = [];

use JSKOS\Concept;

foreach (file('Q6423319.ndjson') as $line) {
    $kos = new Concept(json_decode($line, true));
    $kostypes[$kos->uri] = [ 'concept' => $kos ];
}

$csv = \League\Csv\Reader::createFromPath('Q6423319.csv','r');
$csv->setHeaderOffset(0);

$totalInstances = 0;
$totalSites = 0;
$withSites = 0;
$withInstances = 0;

foreach ($csv as $row) {
    if (substr($row['level'],1,1)=='=') continue;
    $uri = 'http://www.wikidata.org/entity/'.$row['id'];

    if ($row['sites'] > 0) {
        $kostypes[$uri]['sites'] = $row['sites'];
        $totalSites += $row['sites'];
        $withSites++;
    }
    if ($row['instances'] > 0) {
        $kostypes[$uri]['instances'] = $row['instances'];
        $totalInstances += $row['instances'];
        $withInstances++;
    }
}

$csv = \League\Csv\Reader::createFromPath('mappings.csv','r');
$csv->setHeaderOffset(0);
foreach ($csv as $row) {
    $kos = $kostypes[$row['item']];
    if (!$kos) continue;

    if ($row['type'] == '=') {
      $kos['mappings'][] = $row['match'];
    } elseif ($row['type'] == '>') {
      $kos['concept']->narrower->append(new Concept(['uri' => $row['match']]));
    }
}

?>

<p>
  The following classification of Knowledge Organization Systems has been extracted from Wikidata
  <a href="#references">as described below</a>.
</p>
<h3>Current classification</h3>
<p>
  Wikidata can change quickly so this is a snapshot
  from <?= date('Y-m-d',filemtime('Q6423319.ndjson')) ?>.
  <ul>
    <li><a href="Q6423319.ndjson">JSKOS data</a></li>
    <li><a href="mappings.csv">Mappings (CSV)</a></li>
  </ul>
</p>
<div id="tree"></div>
<?php

function makeTree($uri) {
    global $kostypes;
    $e = $kostypes[$uri];
    $c = $e['concept'];
    if (!$c) {
        return [
            'href' => $uri,            
            'id' => $uri,
        ];
    }

    $node = [ 
        'text' => $c->prefLabel['en'],
        'href' => $c->uri,
        'id' => $c->notation[0],
        'selectable' => 0,
        'tags' => [],
        'mappings' => $e['mappings'],
    ];
    if ($e['sites']) {
        $node['tags'][] = [
            'text' => $e['sites'],
            'class' => 'badge badge-success',
            'href' => $uri.'#sitelinks-wikipedia',
            'title' => 'number of Wikipedia articles',
        ];
    }
    if ($e['instances']) {
        $node['tags'][] = [
            'text' => $e['instances'],
            'class' => 'badge badge-default',
			'href' => "https://query.wikidata.org/#SELECT %3Fitem %3FitemLabel WHERE {%0A %3Fitem wdt%3AP31 <$uri> SERVICE wikibase%3Alabel { bd%3AserviceParam wikibase%3Alanguage \"[AUTO_LANGUAGE]%2Cen\". }%0A}",
            'title' => 'number of Wikidata instances',
        ];
    }
    if ($c->narrower) {
        $node['nodes'] = array_filter(
            $c->narrower->map( function ($n) {
                return makeTree($n->uri);
            } )
        );
    }

    return $node;
}

$jsonTree = makeTree('http://www.wikidata.org/entity/Q6423319');

/*
$kostypes[$uri]['sites'] = $row['sites'];
    $kostypes[$uri]['instances'] = $row['instances'];
 */
?>

<p>
  The number right of each KOS type indicate the
  <span class="badge badge-default">number of instances</span>
  (<?=$totalInstances ?> in total at <?=$withInstances?> of <?=count($kostypes)?> KOS types,
  <?=sprintf("%2d%%", 100*$withInstances/count($kostypes))?>)
  and the
  <span class="badge badge-success">number of Wikipedia articles</span>
  (<?=$totalSites ?> in total at <?=$withSites?> of <?=count($kostypes)?> KOS types,
  <?=sprintf("%2d%%", 100*$withSites/count($kostypes))?>).
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
    <a href="http://dx.doi.org/10.5281/zenodo.61767">http://doi.org/10.5281/zenodo.61767</a>
    </li>
    <li>
    <a href="https://github.com/nichtich/wikidata-taxonomy">wikidata-taxonomy</a> command-line tool to extract taxonomies from Wikidata
    </li> 
  </ul>
</p>

<script type="text/javascript">
  $(function(){ 

    const namespaces = {
      fabio: 'http://purl.org/spar/fabio/',
      nkos: 'http://w3id.org/nkos/nkostype#',
      skos: 'http://www.w3.org/2004/02/skos/core#',
      edma: 'http://edamontology.org/',
    }

    function qname(uri) {
      for (prefix in namespaces) {
        if (uri.startsWith(namespaces[prefix])) {
          return prefix + ':' + uri.substr(namespaces[prefix].length)
        }
      }
      return uri
    }

    function nodeFormatter(node, elem) {
      elem
        .append(' (')
        .append($('<a href="#"></a>')
          .attr('href', node.href)
          .append(node.id)
        ).append(')')
      if (node.mappings) {
        elem.append(' ')
        let sep = ' = '
        node.mappings.forEach(function (uri) {
          elem.append(sep)
          sep = ' | '
          elem.append(
            $('<a href="#"></a>').attr('href', uri).text(qname(uri))
          )
        })
      }
    } 

    $('#tree').treeview({
      data: [<?=json_encode($jsonTree);?>],
      showTags: true,
      depth: 2,
      nodeFormatter: nodeFormatter,
    });
  })
</script>

<?php
include "$BASE/footer.php";
