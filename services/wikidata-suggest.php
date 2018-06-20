<?php

$response = ['', [], [], []];
$language = 'de';
$search = $_GET['search'] ?? '';

if ($search !== '') {
    $url = "https://www.wikidata.org/w/api.php?action=wbsearchentities&format=json"
        . "&language=$language&uselang=$language&type=item&search=".urlencode($_GET['search']);
    $data = @json_decode(@file_get_contents($url));
    $response[0] = $data->searchinfo->search;
    foreach ($data->search as $item) {
        $response[1][] = $item->label;
        $response[2][] = $item->description;
        $response[3][] = $item->concepturi;
    }
}

header('Content-type:application/json;charset=utf-8');
header("Access-Control-Allow-Origin: *");
print json_encode($response, JSON_UNESCAPED_SLASHES);

?>
