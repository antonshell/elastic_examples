<?php

use src\data\IngestDataProvider;
use src\data\PostDataProvider;
use src\data\ProductDataProvider;
use src\ElasticClient;
use src\index\IngestIndex;
use src\index\ProductIndex;

require_once '_bootstrap.php';
require_once '_config.php';

$client = new ElasticClient();

$service = new \src\ElasticService();

// posts
echo "### Push posts ###\n";
//$data = file_get_contents(__DIR__ . '/data/MOCK_DATA.json');
//$data = json_decode($data, true);
$postDataProvider = new PostDataProvider();
$data = $postDataProvider->getData();

$index = new \src\Index\PostIndex();

$client->deleteIndex($index);
$client->createIndex($index);
$client->createMapping($index);

foreach ($data as $row){
    //$row['name_suggest'] = $service->getSuggest($row['name']);
    //$row['content_suggest'] = $service->getNameSuggest($row['content']);

    $result = $client->saveItem($index, $row);

    $action = $result['result'];
    $id = $result['_id'];

    $message = $action . " item #" . $row['id'] . "\n";
    echo $message;
}

// products
echo "### Push products ###\n";
$postDataProvider = new ProductDataProvider();
$data = $postDataProvider->getData();
$index = new ProductIndex();

$client->deleteIndex($index);
$client->createIndex($index);
$client->createMapping($index);

foreach ($data as $row){
    //$row['content_suggest'] = $service->getNameSuggest($row['content']);
    $result = $client->saveItem($index, $row);

    $action = $result['result'];
    $id = $result['_id'];

    $message = $action . " item #" . $row['id'] . "\n";
    echo $message;
}

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
    $path = __DIR__ . '/ingest/' . $fileName;
    $content = file_get_contents($path);
    $encoded = base64_encode($content);
    $row['data'] = $encoded;

    $result = $client->saveItem($index, $row, true);
    $action = $result['result'];
    $id = $result['_id'];
    $message = $action . " item #" . $row['id'] . "\n";
    echo $message;
}
