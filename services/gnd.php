<?php

require_once '../vendor/autoload.php';

use JSKOS\{Server, Service,  Result, ConceptScheme};
use JSKOS\RDF\Mapper;
use Symfony\Component\Yaml\Yaml;

class GNDService extends JSKOS\ConfiguredService {

    protected $supportedParameters = ['notation'];
    protected $mapper;

    public function __construct() {
        $config = Yaml::parse(file_get_contents(__DIR__.'/GNDService.yaml'));
        parent::__construct($config);
        $this->mapper = new Mapper($config);
    }

    public function query(array $query, string $path=''): Result {
        $jskos = $this->queryUriSpace($query);
        if (!count($jskos)) return $jskos;

        foreach ($jskos as $concept) {
            $concept->inScheme = [ new ConceptScheme(["uri" => "http://bartoc.org/en/node/430"]) ];
        }

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

        return $jskos;
    }
}

$server = new Server(new GNDService());
$response = $server->queryService($_GET, $_SERVER['PATH_INFO'] ?? '');
Server::sendResponse($response);