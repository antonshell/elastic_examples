<?php

use src\data\IngestDataProvider;
use src\ElasticClient;
use src\index\IngestIndex;

require_once __DIR__ . '/../_bootstrap.php';
require_once __DIR__ . '/../_config.php';

$client = new ElasticClient();

// documents
echo "### Push documents ###\n";
$ingestDataProvider = new IngestDataProvider();
$data = $ingestDataProvider->getData();

$index = new IngestIndex();

$client->deleteIndex($index);
$client->createIndex($index);
$client->createMapping($index);
$client->createPipeline();

foreach ($data as $row){
    // encode file to base64
    $fileName = $row['file'];
    $path = __DIR__ . '/../ingest/' . $fileName;
    $content = file_get_contents($path);
    $encoded = base64_encode($content);
    $row['data'] = $encoded;

    $result = $client->saveItem($index, $row, true);
    $action = $result['result'];
    $id = $result['_id'];
    $message = $action . " item #" . $row['id'] . "\n";
    echo $message;
}
