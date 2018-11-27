<?php

namespace Practice\Mageplaza\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Practice\Mageplaza\Api\Data\WarehouseInterface;
use Practice\Mageplaza\Api\WarehouseRepositoryInterface;
use Practice\Mageplaza\Model\ResourceModel\Warehouse;
use Practice\Mageplaza\Model\ResourceModel\Warehouse\CollectionFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;


class WarehouseRepository implements WarehouseRepositoryInterface
{
    private $warehouseFactory;
    private $warehouseResource;
    private $warehouseCollectionFactory;
    private $warehouseSearchResultInterfaceFactory;

    public function __construct(
        WarehouseFactory $warehouseFactory,
        Warehouse $warehouseResource,
        CollectionFactory $warehouseCollectionFactory,
        WarehouseSearchResultInterfaceFactory $warehouseSearchResultInterfaceFactory
    )
    {
        $this->warehouseFactory = $warehouseFactory;
        $this->warehouseResource = $warehouseResource;
        $this->warehouseCollectionFactory = $warehouseCollectionFactory;
        $this->warehouseSearchResultInterfaceFactory = $warehouseSearchResultInterfaceFactory;
    }

    /**
     * @param $id
     * @return WarehouseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $warehouse = $this->warehouseFactory->create();
        $this->warehouseResource->load($warehouse, $id);
        if (!$warehouse->getId()) {
            throw new NoSuchEntityException(__('Warehouse with id %1 does	not	exist.', $id));
        }
        return $warehouse;
    }

    /**
     * @param WarehouseInterface $warehouse
     * @return WarehouseInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     *
     */
    public function save(WarehouseInterface $warehouse)
    {
        try {
            $this->warehouseResource->save($warehouse);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $warehouse;
    }

    /**
     * @param WarehouseInterface $warehouse
     * @throws CouldNotDeleteExceptio
     */
    public function delete(WarehouseInterface $warehouse)
    {
        try {
            $this->warehouseResource->delete($warehouse);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param WarehouseInterface $warehouse
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }


    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->warehouseCollectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

}