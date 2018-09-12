<?php

namespace Practice\Dev\Model;

use \Magento\Checkout\Model\ConfigProviderInterface;
use \Magento\Payment\Helper\Data;

class PayboxConfigProvider implements ConfigProviderInterface
{
    protected $methodCode = \Practice\Dev\Model\Paybox::PAYMENT_METHOD_PAYBOX_CODE;
    protected $method;
    protected $escaper;
    public function __construct(Data $paymentHelper)
    {
        $this->method = $paymentHelper->getMethodInstance($this->methodCode);
    }
    public function getConfig()
    {
        return $this->method->isAvailable() ? [
            'payment' => [
                'paybox' => [
                    'mailingAddress' => $this-> getMailingAddress(),
                    'payableTo' => $this->getPayableTo(),
                ],
            ],
        ] : [];
    }
    protected function getMailingAddress()
    {
        $this->method->getMailingAddress();
    }

    protected function getPayableTo()
    {
        return $this->method->getPayableTo();
    }
}