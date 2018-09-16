<?php

namespace Practice\DecimalTotalSum\Model\ResourceModel\Decimal;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Practice slides collection
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model and model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Practice\DecimalTotalSum\Model\Decimal','Practice\DecimalTotalSum\Model\ResourceModel\Decimal');
    }
}