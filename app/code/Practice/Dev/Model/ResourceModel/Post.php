<?php

namespace Practice\Dev\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\Context;
use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('practice_dev_post', 'post_id');
    }

}