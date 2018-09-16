<?php

namespace Practice\DecimalTotalSum\Plugin;

use Magento\Sales\Model\Order\InvoiceFactory;
use Magento\Sales\Api\Data\InvoiceExtensionFactory;
use Magento\Sales\Api\Data\InvoiceInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Practice\DecimalTotalSum\Api\DecimalRepositoryInterface;
use Practice\DecimalTotalSum\Api\Data\DecimalInterfaceFactory;

class DecimalTotalSum
{
    protected $invoiceExtensionFactory;
    protected $invoiceFactory;
    protected $decimalRepository;
    protected $scopeConfig;
    protected $decimalInterfaceFactory;

    public function __construct(InvoiceExtensionFactory $invoiceExtensionFactory,
                                InvoiceFactory $invoiceFactory,
                                DecimalRepositoryInterface $decimalRepository,
                                ScopeConfigInterface $scopeConfig,
                                DecimalInterfaceFactory $decimalInterfaceFactory
)
    {
        $this->invoiceFactory = $invoiceFactory;
        $this->invoiceExtensionFactory = $invoiceExtensionFactory;
        $this->decimalRepository = $decimalRepository;
        $this->scopeConfig = $scopeConfig;
        $this->decimalInterfaceFactory = $decimalInterfaceFactory;
    }

    public function afterPay(InvoiceInterface $invoice)
    {
        $factorFunctionEnable = $this->scopeConfig->getValue('decsection/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if ($factorFunctionEnable) {
            $order = $invoice->getOrder();
            $decimalTotalSum = $this->_multiplyByDecimal($order);
            $this->_saveDecimalTotalSum($decimalTotalSum, $order);

            if ($invoice->getExtensionAttributes() && $invoice->getExtensionAttributes()->getDecimalTotalSum()) {
                return $invoice;
            }
            if (!$invoice->getExtensionAttributes()) {
                $invoiceExtension = $this->invoiceExtensionFactory->create();
                $invoice->setExtensionAttributes($invoiceExtension);
            }

            $invoice->getExtensionAttributes()->setDecimalTotalSum($decimalTotalSum);
        }

        return $invoice;
    }

    protected function _multiplyByDecimal($order)
    {
        $totalPaid = $order->getTotalPaid();
        $decimalFactor = $this->scopeConfig->getValue('decsection/general/factor',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if (!empty($totalPaid) && !empty($decimalFactor)){
            return $decimalFactor * $totalPaid;
        }
    }

    protected function _saveDecimalTotalSum($decimalTotalSum, $order)
    {
        $decimalData = $this->decimalInterfaceFactory->create();
        $decimalData->setDecimalSum($decimalTotalSum);
        $decimalData->setOrderId($order->getId());
        $this->decimalRepository->save($decimalData);
    }
}