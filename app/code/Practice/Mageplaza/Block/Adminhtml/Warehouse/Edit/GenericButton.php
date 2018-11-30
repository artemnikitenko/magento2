<?php

namespace Practice\Mageplaza\Block\Adminhtml\Warehouse\Edit;

use \Magento\Backend\Block\Widget\Context;

class GenericButton
{
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var Context
     */
    protected $context;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     */
    public function __construct(Context $context) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->context = $context;
    }

    /**
     * Return warehouseId.
     *
     * @return int|null
     */
    public function getId()
    {
        $warehouseId = $this->context->getRequest()->getParam('id');
        return $warehouseId ? $warehouseId : null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}