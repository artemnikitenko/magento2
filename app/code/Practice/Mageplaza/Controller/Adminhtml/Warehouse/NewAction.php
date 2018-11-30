<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;
/**
 * Class NewAction
 * @package Practice\Mageplaza\Controller\Adminhtml\Warehouse
 */
class NewAction extends Index
{
    /**
     * @return $this|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultForwardFactory->create()->forward('edit');
    }
}