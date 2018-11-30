<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

use Practice\Mageplaza\Model\Warehouse;

class Delete extends Index
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('warehouse_id');
        /** @var Warehouse $warehouse */
        $warehouse = $this->warehouseRepository->getById($id);
        if (!$warehouse) {
            $this->messageManager->addErrorMessage(__('Unable to proceed. Please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }
        try{
            $this->warehouseRepository->delete($warehouse);
            $this->messageManager->addSuccessMessage(__('Your warehouse has been deleted !'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error while trying to delete warehouse: '));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}