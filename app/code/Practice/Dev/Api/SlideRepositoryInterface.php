<?php

namespace Practice\Dev\Api;

use \Practice\Dev\Api\Data\SlideInterface;
use \Magento\Framework\Api\SearchCriteriaInterface;

/**
 * @api
 */
interface SlideRepositoryInterface
{
    /**
     * Retrieve slide entity.
     * @param int $slideId
     * @return \Practice\Dev\Api\Data\SlideInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     *  If slide with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($slideId);

    /**
     * Save slide.
     * @param \Practice\Dev\Api\Data\SlideInterface $slide
     * @return \Practice\Dev\Api\Data\SlideInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(SlideInterface $slide);

    /**
     * Retrieve slides matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete slide by ID.
     * @param int $slideId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($slideId);
}