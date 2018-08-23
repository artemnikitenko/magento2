<?php

namespace Practice\First\Controller\Adminhtml\Post;

use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory = false;

    public function __construct(Context $context, PageFactory $_pageFactory)
    {
        parent::__construct($context);
        $this->_pageFactory = $_pageFactory;
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('My Posts')));

        return $resultPage;
    }
}