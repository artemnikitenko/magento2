<?php

namespace Practice\Dev\Controller\Index;

use Practice\Dev\Model\PostFactory;

use Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;

class Test extends Action
{
    protected $_pageFactory;
    protected $_postFactory;

    public function __construct(Context $context, PageFactory $pageFactory, PostFactory $_postFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $_postFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
