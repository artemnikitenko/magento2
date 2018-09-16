<?php

namespace Practice\DecimalTotalSum\Model;

use \Magento\Framework\Model\AbstractModel;
use Practice\DecimalTotalSum\Api\Data\DecimalInterface;

class Decimal extends AbstractModel implements DecimalInterface
{
    /** Initialize Decimal Model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Practice\DecimalTotalSum\Model\ResourceModel\Decimal');
    }

    /**
     * Get Decimal entity 'decimal_id' property value
     * @return int|null
     */
    public function getDecimalId()
    {
        return $this->getData('decimal_id');
    }

    /**
     * Set Decimal entity 'sum_id' property value
     * @param int $id
     * @return $this
     */
    public function setDecimalId($id)
    {
        $this->setData('sum_id', $id);
        return $this;
    }

    /**
     * Get Decimal entity 'order_id' property value
     * @return int|null
     */
    public function getOrderId()
    {
        return $this->getData('order_id');
    }

    /**
     * Set Decimal entity 'order_id' property value
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->setData('order_id', $orderId);
        return $this;
    }

    /**
     * Get Decimal entity 'decimal_sum' property value
     * @return float|null
     */
    public function getDecimalSum()
    {
        return $this->getData('decimal_sum');
    }

    /**
     * Set Decimal entity 'decimal_sum' property value
     * @param float $decimalSum
     * @return $this
     */
    public function setDecimalSum($decimalSum)
    {
        $this->setData('decimal_sum', $decimalSum);
        return $this;
    }
}