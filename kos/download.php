<?php

if (PHP_SAPI != "cli") exit;

require '../vendor/autoload.php';

use Cache\Adapter\PHPArray\ArrayCachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;
use JSKOS\CachedService;
use JSKOS\Client;
use JSKOS\Concept;
use JSKOS\Service\VIAF;

$cache = new SimpleCacheBridge(new ArrayCachePool());

$viaf = new CachedService(new VIAF(), $cache);
$dante = new CachedService(new Client("http://api.dante.gbv.de/data"), $cache);


$service = new \BARTOC\JSKOS\Service();

foreach( file('bartoc-ids.txt') as $line ) {
    if (preg_match('/^(\d+)/', $line, $match)) {        
        $r = $service->query(["notation" => $match[1]]);
        if (!count($r)) continue;
        $jskos = $r[0];

        # Expand licenses
        for($i=0; $i<count($jskos->license ?? []); $i++) {
            $uri = $jskos->license[$i]->uri;
            $result = $dante->query([
                'uri' => $uri,
                'properties'=> 'notation,prefLabel,depiction'
            ]);
            if (count($result)) {
                $jskos->license[$i] = new Concept([
                    'uri' => $result[0]->uri,
                    'notation' => $result[0]->notation,
                    'prefLabel' => $result[0]->prefLabel,
                    'depiction' => $result[0]->depiction ?? null
                ]);
            }
		}

        # Expand creators via VIAF
        if ($jskos->creator) {
            $jskos->creator = array_filter(array_map(
                function ($c) {
                    global $viaf;
                    $r = $viaf->query(['uri' => $c->uri]);
                    return count($r) ? $r[0] : null;
                },
                iterator_to_array($jskos->creator)
            ));
        }

        # TODO: expand types via Wikidata

        echo "$jskos\n";
    }
}
?>
