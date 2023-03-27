<?php

namespace App\Composers;

use App\LinkConfiguration;

class ComposerLinkConfig
{

    protected $linkConfiguration;

    public function __construct()
    {
        $this->linkConfiguration = new LinkConfiguration;
    }

    public function getKeyValues()
    {
        $collection   = $this->linkConfiguration->orderBy('key', 'ASC')->get();
        $collectionFilter = array();

        foreach($collection as $collectionItem)
        {
            $collectionFilter[$collectionItem->key] = "{$collectionItem->value}";
        }

        return $collectionFilter;
    }
}
