<?php

$registries = [];

foreach (@file('registries.ndjson') ?? [] as $line) {
    $data = json_decode($line, true);    
    if ( $data['uri'] ?? false) {
        $registries[$data['uri']] = $data;
    }
}

