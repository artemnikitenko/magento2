<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;


class Edit extends Index
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
        return $this->resultForwardFactory->create()->forward('newaction');
    }
}