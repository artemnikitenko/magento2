<?php

namespace Practice\DecimalTotalSum\Api\Data;

/**
 * @api
 */
interface DecimalInterface
{
    /**
     * Get Decimal entity 'decimal_id' property value
     * @return int|null
     */
    public function getDecimalId();

    /**
     * Set Decimal entity 'sum_id' property value
     * @param int $id
     * @return $this
     */
    public function setDecimalId($id);

    /**
     * Get Decimal entity 'order_id' property value
     * @return int|null
     */
    public function getOrderId();

    /**
     * Set Decimal entity 'order_id' property value
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId);

    /**
     * Get Decimal entity 'decimal_sum' property value
     * @return float|null
     */
    public function getDecimalSum();

    /**
     * Set Decimal entity 'decimal_sum' property value
     * @param float $decimalSum
     * @return $this
     */
    public function setDecimalSum($decimalSum);
}