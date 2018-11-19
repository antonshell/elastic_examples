<?php

use src\ElasticClient;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();

// search with existing synonym, return 1 record
$url = 'post/type/_search';
$body = '{
  "query": {
    "multi_match" : {
      "query": "бизнесмен",
      "fields": ["name", "content"]
    }
  }
}';
$results = $client->runQuery($url, 'POST', $body);

// search with not existing synonym, return empty set
$url = 'post/type/_search';
$body = '{
  "query": {
    "multi_match" : {
      "query": "предприниматель",
      "fields": ["name", "content"]
    }
  }
}';
$results = $client->runQuery($url, 'POST', $body);

// close index
$url = 'post/_close';
$results = $client->runQuery($url, 'POST');

// update synonyms
$url = 'post/_settings';
$body = '{
  "settings": {
    "analysis": {
      "filter": {
        "my_synonym_filter": {
          "type": "synonym",
          "synonyms": [
            "законный, легальный",
    		"бизнесмен, предприниматель",
    		"автомобиль, машина"
          ]
        }
      }
    }
  }
}';
$results = $client->runQuery($url, 'PUT', $body);

// open index
$url = 'post/_open';
$results = $client->runQuery($url, 'POST');
sleep(1);

// search with added synonym, return 1 record
$url = 'post/type/_search';
$body = '{
  "query": {
    "multi_match" : {
      "query": "предприниматель",
      "fields": ["name", "content"]
    }
  }
}';
$results = $client->runQuery($url, 'POST', $body);
$results = json_encode($results, JSON_UNESCAPED_UNICODE);
echo $results . "\n";