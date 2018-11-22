<?php

use src\ElasticClient;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();
$search = $argv[1];

/* works for 5.6 */
/*$url = 'post/_suggest';
$body = '{
    "product_suggest":{
        "text":"' . $search . '",
        "completion": {
            "field" : "name_suggest"
        }
    }
}';*/

/* work for 6.5 */
$url = 'post/_search';
$body = '{
  "suggest" : {
    "name-suggestion" : {
      "text" : "' . $search . '",
      "completion" : {
        "field" : "name_suggest"
      }
    }
  }
}';

$results = $client->runQuery($url, 'POST', $body);
$results = json_encode($results, JSON_UNESCAPED_UNICODE);
echo $results . "\n";