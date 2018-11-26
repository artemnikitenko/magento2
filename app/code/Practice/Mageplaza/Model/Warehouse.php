<?php

namespace Practice\Mageplaza\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Warehouse extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'practice_warehouse';

    protected $_cacheTag = 'practice_warehouse';

    protected $_eventPrefix = 'practice_warehouse';

    public function _construct()
    {
        $this->_init('Practice\Mageplaza\Model\ResourceModel\Warehouse');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}