<?php

namespace Practice\DecimalTotalSum\Api;

use \Practice\DecimalTotalSum\Api\Data\DecimalInterface;

/**
 * @api
 */
interface DecimalRepositoryInterface
{
    /**
     * Save slide.
     * @param \Practice\DecimalTotalSum\Api\Data\DecimalInterface $decimal
     * @return \Practice\DecimalTotalSum\Api\Data\DecimalInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(DecimalInterface $decimal);
}