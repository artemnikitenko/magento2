<?php

namespace Practice\Dev\Block;

use Practice\Dev\Model\PostFactory;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class Test extends Template
{
    protected $_postFactory;

    public function __construct(Context $context, PostFactory $_postFactory)
    {
        $this->_postFactory = $_postFactory;
        parent::__construct($context);
    }

    public function getPostData()
    {
        $postModel = $this->_postFactory->create();
        $collection = $postModel->getCollection();

        return $collection;
    }
}