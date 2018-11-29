<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

use Practice\Mageplaza\Model\Warehouse;

class Save extends Index
{

    public function execute()
    {
        $warehouseData = $this->getRequest()->getParam('warehouse');
        $warehouseCityRu = $this->getRequest()->getParam('warehouse_city_ru');
        $warehouseCityUA = $this->getRequest()->getParam('warehouse_city_uk');
        $warehouseData['city_uk'] = $warehouseCityUA['city_uk'];
        $warehouseData['city_ru'] = $warehouseCityRu['city_ru'];
        if(is_array($warehouseData)) {
            $warehouse = $this->_objectManager->create(Warehouse::class);
            $warehouse->setData($warehouseData)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}