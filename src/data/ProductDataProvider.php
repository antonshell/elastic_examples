<?php

namespace src\data;

/**
 * Class ProductDataProvider
 * @package src\data
 */
class ProductDataProvider extends BaseDataProvider implements DataProviderInterface
{
    /**
     * @return array
     */
    public function getData():array
    {
        $data = file_get_contents(__DIR__ . '/../../data/products.json');
        $data = json_decode($data, true);
        return $data;
    }
}