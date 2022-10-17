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
        $result = new Result();

        foreach (explode('|', $query['uri'] ?? '') as $uri) {
            # Also support https URIs (internally, this is still using http URIs)
            $uri = str_replace("https://", "http://", $uri);
            $query['uri'] = $uri;

            $jskos = $this->queryUriSpace($query);
            if (!count($jskos)) continue;

            $concept = $jskos[0];
            $concept->inScheme = [ new ConceptScheme(["uri" => "http://bartoc.org/en/node/430"]) ];

            $uri = $concept->uri;
            $rdf = Mapper::loadRDF($uri ."/about/lds", $uri, null, true);
            if ($rdf) {
                # TODO: fix date format
                #error_log($rdf->getGraph()->serialise('turtle'));
                try {
                    # FIXME: relatedDate and other fields may throw an error, better ignore instead
                    $this->mapper->applyAtResource($rdf->getGraph()->resource($uri), $concept);
                } catch(Exception $e) {
                }
                # Save http URI in identifier and replace with https URI
                if (empty($concept->identifier)) {
                    $concept->identifier = [];
                }
                $concept->identifier->append($concept->uri);
                $concept->uri = str_replace("http://", "https://", $concept->uri);
                $result->append($concept);
            }
        }

        return $result;
    }
}

$server = new Server(new GNDService());
$response = $server->queryService($_GET, $_SERVER['PATH_INFO'] ?? '');
Server::sendResponse($response);
