<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

use Practice\Mageplaza\Model\Warehouse;

class Edit extends Index
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $warehouseData = $this->getRequest()->getParam('warehouse');
        if(is_array($warehouseData)) {
            $warehouse = $this->_objectManager->create(Warehouse::class);
            $warehouse->setData($warehouseData)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}