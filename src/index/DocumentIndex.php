<?php

namespace src\index;

/**
 * Class DocumentIndex
 * @package src\index
 */
class DocumentIndex extends BaseIndex implements IndexInterface
{
    private $indexName = 'document';

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
        $typeInteger = $this->getIntegerType();

        $properties = [
            'properties' => [
                'id' => $typeInteger,
                'Title' => $typeText,
                'Title_suggest' => $typeSuggest,
                'ZNKnowledgeTags' => $typeText,
                'Created' => $typeDatetime,
                'Modified' => $typeDatetime,
                'ZNPublishDate' => $typeDatetime,
                'CreatedBy' => $typeInteger, // user_id
                'ModifiedBy' => $typeInteger, // user_id
                'ArticleByLine' => $typeText,
                'ZNImageUrl' => $typeText,
                'ZNAnnotation' => $typeText,
                'ZNAnnotation_suggest' => $typeSuggest,
                //'ArticleByLine' => $typeText,
                'ZNPublishingHouse' => $typeText,
                'ZNISBN' => $typeText,
                'ZNConferenceName' => $typeText,
                'ZNConferenceDate' => $typeDatetime,
                'ZNMethodDocType' => $typeText,
                'ZnMethodDocNumber' => $typeText,
                'ArticleByLineity' => $typeText,
                'ZNHelpDocType' => $typeText,
                'ZNTaskDescription' => $typeText,
                'ZNTaskErrors' => $typeText,
                'ZNTaskSolution' => $typeText,
                'ZNLinkUrl' => $typeText,
                'ObjectType' => $typeText,
                'Popularity' => $typeInteger,
            ],
        ];

        return $properties;
    }
}