<?php

namespace Practice\Mageplaza\Model;

use Practice\Mageplaza\Model\ResourceModel\Warehouse\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
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
        }

        return $this->loadedData;

    }
}