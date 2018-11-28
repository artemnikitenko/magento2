<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

class NewAction extends Index
{

    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->forward('edit');
        return $resultForward;
    }
}