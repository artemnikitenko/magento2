<?php

namespace Practice\Mageplaza\Controller\Feature;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class One extends Action
{
    protected $_pageFactory;

    public function __construct(Context $context, PageFactory $_pageFactory)
    {
        $this->_pageFactory = $_pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
