<?php

namespace Practice\Mageplaza\Api;

use Practice\Mageplaza\Api\Data\WarehouseInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface WarehouseRepositoryInterface
{
    /**
     * @param $id
     * @return WarehouseInterface
     */
    public function getById($id);

    /**
     * @param WarehouseInterface $warehouse
     * @return WarehouseInterface
     */
    public function save(WarehouseInterface $warehouse);

    /**
     * @param WarehouseInterface $warehouse
     * @return void
     */
    public function delete(WarehouseInterface $warehouse);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}