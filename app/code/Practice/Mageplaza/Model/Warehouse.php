<?php

namespace Practice\Mageplaza\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
//use Practice\Mageplaza\Api\Data\WarehouseExtensionInterface;
use Practice\Mageplaza\Api\Data\WarehouseInterface;
use Practice\Mageplaza\Model\ResourceModel\Warehouse as WarehouseResource;

class Warehouse extends AbstractModel implements IdentityInterface, WarehouseInterface
{
    const CACHE_TAG = 'practice_warehouse';

    protected $_cacheTag = 'practice_warehouse';

    protected $_eventPrefix = 'practice_warehouse';

    /**
     * @param WarehouseResource
     */
    public function _construct()
    {
        $this->_init(WarehouseResource::class);
    }

    /**
     * @return array|string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return mixed|null|string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @return mixed|null|string
     */
    public function getCode()
    {
        return $this->getData(self::CODE);
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setData(self::CODE, $code);
    }

    /**
     * @return mixed|null|string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @return mixed|null|string
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * @return mixed|null|string
     */
    public function getCityRu()
    {
        return $this->getData(self::CITY_RU);
    }

    /**
     * @param string $cityRu
     * @return $this
     */
    public function setCityRu($cityRu)
    {
        return $this->setData(self::CITY_RU, $cityRu);
    }

    /**
     * @return mixed|null|string
     */
    public function getCityUa()
    {
        return $this->getData(self::CITY_RU);
    }

    /**
     * @param string $cityUa
     * @return $this
     */
    public function setCityUa($cityUa)
    {
        return $this->setData(self::CITY_UA, $cityUa);
    }

    /**
     * @return mixed|null|string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return mixed|null|string
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

//    /**
//     * @return mixed|null|WarehouseExtensionInterface
//     */
//    public function getExtensionAttributes()
//    {
//        return $this->getData(self::EXTENSION_ATTRIBUTES_KEY);
//    }
//
//    public function setExtensionAttributes(WarehouseExtensionInterface $extensionAttribute)
//    {
//        // TODO: Implement setExtensionAttributes() method.
//    }

}