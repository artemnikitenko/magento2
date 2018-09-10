<?php

namespace Practice\Dev\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Practice Slide resource
 */
class Slide extends AbstractDb
{
    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('practice_dev_slide', 'slide_id');
    }
}