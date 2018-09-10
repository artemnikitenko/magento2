<?php

namespace Practice\Dev\Model\ResourceModel\Slide;

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
        $this->_init('Practice\Dev\Model\Slide','Practice\Dev\Model\ResourceModel\Slide');
    }
}