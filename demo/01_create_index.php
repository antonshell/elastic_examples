<?php

use src\ElasticClient;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();
$index = new \src\Index\PostIndex();

echo "Delete Index\n";
$client->deleteIndex($index);

echo "Create Index\n";
$client->createIndex($index);

echo "Create Mapping\n";
$client->createMapping($index);