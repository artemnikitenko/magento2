<?php

namespace Practice\Mageplaza\Controller\Adminhtml\Warehouse;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\View\Result\PageFactory;
use Practice\Mageplaza\Api\Data\WarehouseInterfaceFactory;
use Practice\Mageplaza\Api\WarehouseRepositoryInterface;

/**
 * Class Index
 * @package Practice\Mageplaza\Controller\Adminhtml\Warehouse
 */
class Index extends Action
{
    protected $resultPageFactory;
    protected $resultForwardFactory;
    protected $warehouseFactory;
    protected $warehouseRepository;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param WarehouseInterfaceFactory $warehouseFactory
     * @param WarehouseRepositoryInterface $warehouseRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        WarehouseInterfaceFactory $warehouseFactory,
        WarehouseRepositoryInterface $warehouseRepository
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->warehouseFactory = $warehouseFactory;
        $this->warehouseRepository = $warehouseRepository;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Warehouse')));

        return $resultPage;
    }
}