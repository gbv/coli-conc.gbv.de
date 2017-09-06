<?php

if (PHP_SAPI != "cli") exit;

require '../vendor/autoload.php';

$viaf = new \VIAF\JSKOS\Service();

class CachedService extends \BARTOC\JSKOS\Service {
    protected $cache;

    function query(array $query) {
        $key = md5(serialize($query));
        if (!isset($this->cache[$key])) {
            $this->cache[$key] = parent::query($query);
        }
        return $this->cache[$key];
    }
}

$service = new \BARTOC\JSKOS\Service();

foreach( file('bartoc-ids.txt') as $line ) {
    if (preg_match('/^(\d+)/', $line, $match)) {        
        $jskos = $service->query(["notation" => $match[1]]);
        
        # Expand creators via VIAF
        if ($jskos->creator) {
            $jskos->creator = array_map(
                function ($c) {
                    global $viaf;
                    return $viaf->query(['uri' => $c->uri]);
                },
                iterator_to_array($jskos->creator)
            );
        }

        # TODO: expand types via Wikidata
        # TODO: expand licenses via license-API

        echo "$jskos\n";
        exit;
    }
}
?>
