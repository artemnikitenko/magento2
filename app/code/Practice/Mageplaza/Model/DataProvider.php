<?php

namespace Practice\Mageplaza\Model;

use Practice\Mageplaza\Model\ResourceModel\Warehouse\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class DataProvider
 * @package Practice\Mageplaza\Model
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * DataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param CollectionFactory $warehouseCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $warehouseCollectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $warehouseCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Warehouse $warehouse */
        foreach ($items as $warehouse) {
            $this->loadedData[$warehouse->getId()]['warehouse'] = $warehouse->getData();
            $this->loadedData[$warehouse->getId()]['warehouse_city_ru'] = ['city_ru' => $warehouse->getData('city_ru')];
            $this->loadedData[$warehouse->getId()]['warehouse_city_uk'] = ['city_uk' => $warehouse->getData('city_uk')];
        }

        return $this->loadedData;

    }
}