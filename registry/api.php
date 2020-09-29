<?php
$base = 'http://coli-conc.gbv.de/registry/';
$id = $_GET['id'] ?? '';
$uri = $base.$id;

require_once 'registries.php';
$data = $registries[$uri] ?? null;

header('Content-Type: application/json; charset=utf-8', true, $data ? 200 : 404);

if (!$data) {
  $data = [
    'uri'   => $uri,
    'error' => "registry not found!"
  ];
}

echo json_encode($data, JSON_PRETTY_PRINT);
