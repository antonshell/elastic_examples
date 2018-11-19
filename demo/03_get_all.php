<?php

use src\ElasticClient;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();

$url = 'post/type/_search?_source=id,name,content';
$results = $client->runQuery($url);
$results = json_encode($results, JSON_UNESCAPED_UNICODE);
echo $results . "\n";