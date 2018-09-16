<?php

namespace Practice\DecimalTotalSum\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Practice Slide resource
 */
class Decimal extends AbstractDb
{
    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('decimal_total_sum', 'decimal_id');
    }
}