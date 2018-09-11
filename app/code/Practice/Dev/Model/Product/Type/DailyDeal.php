<?php

namespace Practice\Dev\Model\Product\Type;

use \Magento\Catalog\Model\Product\Type\AbstractType;
use \Magento\Catalog\Model\Product;

class DailyDeal extends AbstractType
{
    const TYPE_DAILY_DEAL = 'devdailydeal';
    public function deleteTypeSpecificData (Product $product)
    {
// TODO: Implement deleteTypeSpecificData() method.
    }
}