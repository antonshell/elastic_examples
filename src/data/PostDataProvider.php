<?php

namespace src\data;

/**
 * Class PostDataProvider
 * @package src\data
 */
class PostDataProvider extends BaseDataProvider implements DataProviderInterface
{
    /**
     * @return array
     */
    public function getData():array
    {
        $data = file_get_contents(__DIR__ . '/../../data/posts.json');
        $data = json_decode($data, true);

        foreach ($data as $key => $row){
            $data[$key]['name_suggest'] = $this->getSuggest($row['name']);
        }

        return $data;
    }
}