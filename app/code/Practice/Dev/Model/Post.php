<?php

namespace Practice\Dev\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;


class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'practice_dev_post';

    protected $_cacheTag = 'practice_dev_post';

    protected $_eventPrefix = 'practice_dev_post';

    protected function _construct()
    {
        $this->_init('Practice\Dev\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}