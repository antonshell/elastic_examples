<?php

use src\ElasticClient;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();

$url = 'product/type/_search';
$body = '{
  "query": {
    "bool": {
      "must": [
        {
          "match": {
            "vendor": "Intel"
          }
        }
      ]
    }
  },
  "size": 0,
  "aggs": {
    "distinct_cpu": {
      "terms": {
        "field": "cpu.keyword"
      }
    },
    "min_price": {
      "min": {
        "field": "price"
      }
    },
    "max_price": {
      "max": {
        "field": "price"
      }
    }
  }
}';

$results = $client->runQuery($url, 'POST', $body);
$results = json_encode($results, JSON_UNESCAPED_UNICODE);
echo $results . "\n";