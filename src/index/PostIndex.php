<?php

namespace src\index;

/**
 * Class PostIndex
 * @package src\index
 */
class PostIndex extends BaseIndex implements IndexInterface
{
    private $indexName = 'post';

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
    public function getProperties(): array
    {
        $typeText = $this->getTextType();
        $typeDatetime = $this->getDatetimeType();
        $typeSuggest = $this->getSuggestType();

        $properties = [
            'properties' => [
                'id' => ['type'=> 'integer'],
                'name' => $typeText,
                'content' => $typeText,
                'content_suggest' => $typeSuggest,
                'name_suggest' => $typeSuggest,
            ],
        ];

        return $properties;
    }
}