<?php

namespace Practice\Mageplaza\Api;

use Magento\Framework\Api\SearchResultsInterface;
use Practice\Mageplaza\Api\Data\WarehouseInterface;

interface WarehouseSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return WarehouseInterface[]
     */
    public function getItems();

    /**
     * @param WarehouseInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}