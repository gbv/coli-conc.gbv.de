<?php

require_once '../vendor/autoload.php';

use JSKOS\{Server, Service,  Result, ConceptScheme};
use Symfony\Component\Yaml\Yaml;

class WikidataService extends JSKOS\ConfiguredService {

    protected $supportedParameters = ['notation'];

    public function __construct() {
        $config = Yaml::parse(file_get_contents(__DIR__.'/WikidataService.yaml'));
        parent::__construct($config);
    }

    public function query(array $query, string $path=''): Result {
        $jskos = $this->queryUriSpace($query);
        if (!count($jskos)) return $jskos;

		# TODO: select languages
		$languages = ['de', 'en', 'ja'];

		$concept = $jskos[0];
		try {
            $url = "https://www.wikidata.org/wiki/Special:EntityData/"
                 . $concept->notation[0] . ".json?cache=2";
            # TODO: avoid caching?
            $json = @file_get_contents($url);
            $data = @json_decode($json);
            $data = $data->entities->{$concept->notation[0]};
        } catch (Exception $e) {
            error_log($e);
        }
        if (!isset($data)) return new Result();

		$concept->modified = $data->modified;

#		error_log(print_r(json_encode($data, JSON_PRETTY_PRINT),true));
		$prefLabel = ['-' => '?'];
        foreach ($data->labels as $language => $value) {
			if (in_array($language, $languages)) {
            	$prefLabel[$language] = $value->value;
			}
        }
		$concept->prefLabel = $prefLabel;
		
		$scopeNote = ['-' => []];
     	foreach ($data->descriptions as $language => $value) {
			if (in_array($language, $languages)) {
            	$scopeNote[$language][] = $value->value;
			}
        }
		$concept->scopeNote = $scopeNote;

		$altLabel = ['-'=>[]]; 
        foreach ($data->aliases as $language => $values) {
			if (in_array($language, $languages)) {
            	foreach ($values as $value) {
                	$altLabel[$language][] = $value->value;
	            }
			}
        }
		$concept->altLabel = $altLabel;

		# TODO: type (item or property) wikibase:Item / wikibase:Property / ...

        #foreach ($jskos as $concept) {

        #    $concept->inScheme = [ new ConceptScheme(["uri" => "http://bartoc.org/en/node/430"]) ];
        #}
/*
        $uri = $jskos[0]->uri;
        $rdf = Mapper::loadRDF($uri ."/about/lds", $uri);
        if (!$rdf) return new Result();

        # TODO: fix date format
        #error_log($rdf->getGraph()->serialise('turtle'));
        try {
            # FIXME: relatedDate and other fields may throw an error, better ignore instead
            $this->mapper->applyAtResource($rdf->getGraph()->resource($uri), $jskos[0]);
        } catch(Exception $e) {
            return $jskos;
        }
 */

        # depiction
        $depictions = static::mainsnakValues($data, 'P18', 'commonsMedia');
        foreach ($depictions as $img) {
            $concept->depiction[] = "http://commons.wikimedia.org/wiki/Special:FilePath/"
                                  . rawurlencode($img);
        }
        # homepage
        $urls = static::mainsnakValues($data, 'P856', 'url');
        if (count($urls)) { 
            $concept->url = $urls[0];
        }
        # startDate
        foreach (['P569','P571','P580'] as $p) {
            $date = static::mainsnakValues($data, $p, 'time', 'time');
            if (count($date)) {
                $concept->startDate = preg_replace('/^\+/','',$date[0]);
                break;
            }
        }
        # endDate
        foreach (['P570','P576','P582'] as $p) {
            $date = static::mainsnakValues($data, $p, 'time', 'time');
            if (count($date)) {
                $concept->endDate = preg_replace('/^\+/','',$date[0]);
                break;
            }
        }
        # TODO: more claims
        static::mapItemClaims($data, $concept, 'P279', 'broader'); // subclass of
        static::mapItemClaims($data, $concept, 'P131', 'broader'); // administrative territorial entity
        static::mapItemClaims($data, $concept, 'P155', 'previous');
        static::mapItemClaims($data, $concept, 'P156', 'next');
        # TODO: sitelinks

        return $jskos;
    }

    static function mainsnakValues( $item, $property, $datatype=null, $valuefield=null ) {
        $values = [];
        if (isset($item->claims->$property)) {
            foreach ($item->claims->$property as $statement) {
                $mainsnak = $statement->mainsnak;
                if (!$datatype) {
                    error_log(print_r($mainsnak,1));
                    continue;
                }
                if ($mainsnak->datatype == $datatype) {
                    $value = $mainsnak->datavalue->value;
                    $values[] = $valuefield ? $value->{$valuefield} : $value;
                }
            }
        }
        return $values;
    }
 
    static function mapItemClaims( $item, $concept, $pid, $field ) {
        $values = static::mainsnakValues( $item, $pid, 'wikibase-item', 'id' );
        foreach ($values as $id) {
            $set = $concept->$field;
            $set[] = new Concept(["uri" => "http://www.wikidata.org/entity/$id"]);
            $concept->$field = $set;
        }
    }
}

$server = new Server(new WikidataService());
$response = $server->queryService($_GET, $_SERVER['PATH_INFO'] ?? '');
Server::sendResponse($response);
