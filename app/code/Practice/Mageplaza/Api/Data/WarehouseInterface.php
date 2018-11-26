<?php

namespace Practice\Mageplaza\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface WarehouseInterface extends ExtensibleDataInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string|null
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string|null
     */
    public function getCode();

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code);

    /**
     * @return string|null
     */
    public function getEmail();

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @return string|null
     */
    public function getImage();

    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image);

    /**
     * @return string|null
     */
    public function getCityRu();

    /**
     * @param string $cityRu
     * @return $this
     */
    public function setCityRu($cityRu);

    /**
     * @return string|null
     */
    public function getCityUa();

    /**
     * @param string $cityUa
     * @return $this
     */
    public function setCityUa($cityUa);

    /**
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * @return WarehouseExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param WarehouseExtensionInterface $extensionAttribute
     * @return $this
     */
    public function setExtensionAttributes(WarehouseExtensionInterface $extensionAttribute);

}