<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;


class Save extends Index
{

//    protected $resultPageFactory;
//    protected $resultForwardFactory;
//
//    public function __construct(Context $context, PageFactory $resultPageFactory, ForwardFactory $resultForwardFactory)
//    {
//        parent::__construct($context);
//        $this->resultPageFactory = $resultPageFactory;
//        $this->resultForwardFactory = $resultForwardFactory;
//    }

    public function execute()
    {
        $originalRequestData = $this->getRequest();
        return $this->resultForwardFactory->create()->forward('newaction');
    }
}