<?php

namespace src\index;

/**
 * Class IngestIndex
 * @package src\index
 */
class IngestIndex extends BaseIndex implements IndexInterface
{
    private $indexName = 'ingest';

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
        $integer = ['type'=> 'integer'];

        $properties = [
            'properties' => [
                'id' => $integer,
                'name' => $typeText,
            ],
        ];

        return $properties;
    }
}