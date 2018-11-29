<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

class NewAction extends Index
{

    public function execute()
    {
        return $this->resultForwardFactory->create()->forward('edit');
    }
}