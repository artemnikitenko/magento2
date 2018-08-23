<?php

namespace Practice\First\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;

class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'practice_first_post';

    protected $cacheTag = 'practice_first_post';

    protected $eventPrefix = 'practice_first_post';

    protected function _construct()
    {
        $this->_init('Practice\First\Model\ResourceModel\Post');
    }

     public function getIdentities()
     {
         return [self::CACHE_TAG . '_' . $this->getId()];
     }

     public function getDefaultValues()
     {
         $value = [];

         return $value;
     }
}