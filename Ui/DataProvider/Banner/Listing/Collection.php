<?php
namespace Dev\Banner\Ui\DataProvider\Banner\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

// Tao 1 subclass cua SearchResult

class Collection extends SearchResult
{
    protected function _initSelect()
    {
        // $this->addFilterToMap('entity_id', 'main_table.entity_id');
        // $this->addFilterToMap('name', 'devgridname.value');
        parent::_initSelect();
    }
}
