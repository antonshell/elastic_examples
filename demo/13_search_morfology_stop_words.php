<?php

use src\ElasticClient;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();

$search = $argv[1];
$url = 'post/type/_search';
$body = '{
    "query": {
    "multi_match" : {
        "query": "' . $search . '",
      "fields": ["name", "content"]
    }
  }
}';
$results = $client->runQuery($url, 'POST', $body);
$results = json_encode($results, JSON_UNESCAPED_UNICODE);
echo $results . "\n";
