<?php

use src\ElasticClient;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();

$search = $argv[1];
$url = 'ingest/type/_search';
$body = '{
  "_source": ["id", "name", "attachment"],
  "query": {
    "bool": {
      "must": [
        {
          "match": {
            "attachment.content": "' . $search . '"
          }
        }
      ]
    }
  }
}';
$results = $client->runQuery($url, 'POST', $body);
$results = json_encode($results, JSON_UNESCAPED_UNICODE);
echo $results . "\n";