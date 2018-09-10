<?php

namespace Practice\Dev\Model;

use Magento\Framework\Api\DataObjectHelper;
use \Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;

use \Practice\Dev\Model\SlideFactory;
use \Practice\Dev\Api\Data\SlideInterface;
use \Practice\Dev\Model\ResourceModel\Slide;
use \Practice\Dev\Api\SlideRepositoryInterface;
use \Practice\Dev\Api\Data\SlideInterfaceFactory;
use \Practice\Dev\Model\ResourceModel\Slide\CollectionFactory;

class SlideRepository implements SlideRepositoryInterface
{
    /**
     * @var \Practice\Dev\Model\ResourceModel\Slide
     */
    protected $resource;
    /**
     * @var \Practice\Dev\Model\SlideFactory
     */
    protected $slideFactory;
    /**
     * @var \Practice\Dev\Model\ResourceModel\Slide\CollectionFactory
     */
    protected $slideCollectionFactory;
    /**
     * @var \Magento\Framework\Api\SearchResultsInterface
     */
    protected $searchResultsFactory;
    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;
    /**
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;
    /**
     * @var \Practice\Dev\Api\Data\SlideInterfaceFactory
     */
    protected $dataSlideFactory;

    /**
     * @param ResourceModel\Slide $resource
     * @param SlideFactory $slideFactory
     * @param ResourceModel\Slide\CollectionFactory $slideCollectionFactory
     * @param \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param \Practice\Dev\Api\Data\SlideInterfaceFactory $dataSlideFactory
     */
    public function __construct(Slide $resource,
                                SlideFactory $slideFactory,
                                CollectionFactory $slideCollectionFactory,
                                SearchResultsInterface $searchResultsFactory,
                                DataObjectHelper $dataObjectHelper,
                                DataObjectProcessor $dataObjectProcessor,
                                SlideInterfaceFactory $dataSlideFactory
    )
    {
        $this->resource = $resource;
        $this->slideFactory = $slideFactory;
        $this->slideCollectionFactory = $slideCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->dataSlideFactory = $dataSlideFactory;
    }

    /**
     * Save slide.
     *
     * @param \Practice\Dev\Api\Data\SlideInterface $slide
     * @return \Practice\Dev\Api\Data\SlideInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(SlideInterface $slide)
    {
        try {
            $this->resource->save($slide);
        } catch (\Exception    $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $slide;
    }

    /**
     * Retrieve slides matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $this->searchResultsFactory->setSearchCriteria($searchCriteria);
        $collection = $this->slideCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition
                => $filter->getValue()]);
            }
        }
        $this->searchResultsFactory->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    (strtoupper($sortOrder->getDirection()) === 'ASC') ? 'ASC'
                        : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $slides = [];
        /** @var \Practice\Dev\Model\Slide $slideModel */
        foreach ($collection as $slideModel) {
            $slideData = $this->dataSlideFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $slideData,
                $slideModel->getData(),
                '\Practice\Dev\Api\Data\SlideInterface'
            );
            $slides[] = $this->dataObjectProcessor->buildOutputDataArray($slideData,
                '\Practice\Dev\Api\Data\SlideInterface'
            );
        }
        $this->searchResultsFactory->setItems($slides);
        return $this->searchResultsFactory;
    }

    /**
     * Retrieve slide entity.
     *
     * @api
     * @param int $slideId
     * @return \Practice\Dev\Api\Data\SlideInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * If slide with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($slideId)
    {
        $slide = $this->slideFactory->create();
        $this->resource->load($slide, $slideId);
        if (!$slide->getId()) {
            throw new NoSuchEntityException(__('Slide with id	%1 does	not	exist.', $slideId));
        }
        return $slide;
    }

    /**
     * Delete slide by ID.
     *
     * @param int $slideId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($slideId)
    {
        return $this->delete($this->getById($slideId));
    }

    /**
     * Delete Slide
     *
     * @param \Practice\Dev\Api\Data\SlideInterface $slide
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(SlideInterface $slide)
    {
        try {
            $this->resource->delete($slide);
        } catch (\Exception    $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }
}