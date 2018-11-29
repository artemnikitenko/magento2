<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

use Practice\Mageplaza\Model\Warehouse;

class Delete extends Index
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('warehouse_id');

        if (!($warehouse = $this->_objectManager->create(Warehouse::class)->load($id))) {
            $this->messageManager->addError(__('Unable to proceed. Please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }
        try{
            $warehouse->delete();
            $this->messageManager->addSuccess(__('Your warehouse has been deleted !'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__('Error while trying to delete warehouse: '));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}