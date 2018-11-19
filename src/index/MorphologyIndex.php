<?php

namespace src\index;

/**
 * Class MorphologyIndex
 * @package src\index
 */
class MorphologyIndex extends BaseIndex implements IndexInterface
{
    private $indexName = 'morphology';

    private $mapperName = 'type';

    /**
     * @return string
     */
    public function getIndexName(): string
    {
        return $this->indexName;
    }

    /**
     * @return string
     */
    public function getMappingName(): string
    {
        return $this->mapperName;
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        $settings = [
            'settings' => [
                'analysis' => [
                    'filter' => [
                        'en_stopwords' => [
                            'type' => 'stop',
                            'stopwords' => 'an,and,are,as,at,be,but,by,for,if,in,into,is,it,no,not,of,on,or,such,that,the,their,then,there,these,they,this,to,was,will,with'
                        ],
                        'ru_stopwords' => [
                            'type' => 'stop',
                            'stopwords' => '_russian_'
                        ],
                    ],
                    'analyzer' => [
                        'my_analyzer' => [
                            'type' => 'custom',
                            'tokenizer' => 'standard',
                            'filter' => [
                                'lowercase',
                                'russian_morphology',
                                'english_morphology',
                                'en_stopwords',
                                'ru_stopwords',
                            ],
                        ],
                    ],
                ],
            ]
        ];

        return $settings;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        $properties = [
            'properties' => [
                'id' => ['type'=> 'integer'],
                'body' => ['type'=> 'text', 'analyzer' => 'russian_morphology'],
                'text' => ['type'=> 'text', 'analyzer' => 'my_analyzer'],
            ],
        ];

        return $properties;
    }
}