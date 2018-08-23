<?php

namespace Practice\First\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

use \Practice\First\Model\PostFactory;

class First extends Template
{
    protected $_postFactory;

    public function __construct(Context $context, PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function showWelcome()
    {
        return 'Welcome to Practice First';
    }

    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}