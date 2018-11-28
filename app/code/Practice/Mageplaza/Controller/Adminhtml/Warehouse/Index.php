<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $resultPageFactory;
    protected $resultForwardFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory, ForwardFactory $resultForwardFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Warehouse')));

        return $resultPage;
    }
}