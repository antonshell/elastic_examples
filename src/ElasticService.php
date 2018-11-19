<?php

namespace src;

use src\Index\IndexInterface;

/**
 * Class ElasticService
 * @package src
 */
class ElasticService
{
    /**
     * @param $value
     * @return array
     */
    public function getSuggest($value){
        $value = trim($value);
        $words = explode(' ', $value);

        $input = [];
        $count = count($words);
        for($i = 0; $i <$count; $i++){
            $tmpWords = array_slice($words, $i, $count);
            $tmpStr = implode(' ', $tmpWords);
            $input[] = $tmpStr;
        }

        return [
            "input" => $input
        ];
    }
}