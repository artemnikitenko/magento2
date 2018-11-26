<?php

namespace Practice\Mageplaza\Model\ResourceModel\Collection;

use Magento\Catalog\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'warehouse_id';
    protected $_eventPrefix = 'practice_warehouse_collection';
    protected $_eventObject = 'warehouse_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Practice\Mageplaza\Model\Warehouse',
            'Practice\Mageplaza\Model\ResourceModel\Warehouse');
    }

}