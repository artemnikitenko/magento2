<?php

namespace Practice\DecimalTotalSum\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use \Magento\Framework\Exception\LocalizedException;

use \Practice\DecimalTotalSum\Model\ResourceModel\Decimal;
use \Practice\DecimalTotalSum\Api\Data\DecimalInterface;
use \Practice\DecimalTotalSum\Api\DecimalRepositoryInterface;

class DecimalRepository implements DecimalRepositoryInterface
{
    /**
     * @var Decimal
     */
    protected $resource;

    /**
     * @param Decimal $resource
     */
    public function __construct(Decimal $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Save slide.
     *
     * @param DecimalInterface $decimal
     * @return DecimalInterface
     * @throws LocalizedException
     */
    public function save(DecimalInterface $decimal)
    {
        try {
            $this->resource->save($decimal);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $decimal;
    }
}