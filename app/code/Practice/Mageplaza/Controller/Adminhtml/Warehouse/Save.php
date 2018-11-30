<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

use Practice\Mageplaza\Model\Warehouse;

/**
 * Class Save
 * @package Practice\Mageplaza\Controller\Adminhtml\Warehouse
 */
class Save extends Index
{
    /**
     * @return $this|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $warehouseData = $this->getRequest()->getParam('warehouse');
        $warehouseCityRu = $this->getRequest()->getParam('warehouse_city_ru');
        $warehouseCityUA = $this->getRequest()->getParam('warehouse_city_uk');
        $warehouseData['city_uk'] = $warehouseCityUA['city_uk'];
        $warehouseData['city_ru'] = $warehouseCityRu['city_ru'];
        if(is_array($warehouseData)) {
            /** @var Warehouse $warehouse */
            $warehouse = $this->warehouseFactory->create();
            $warehouse->setData($warehouseData);
            $this->warehouseRepository->save($warehouse);
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}