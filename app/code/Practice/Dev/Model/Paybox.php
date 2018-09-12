<?php

namespace Practice\Dev\Model;

use \Magento\Payment\Model\Method\AbstractMethod;

class Paybox extends AbstractMethod
{
    const PAYMENT_METHOD_PAYBOX_CODE = 'paybox';
    protected $_code = self::PAYMENT_METHOD_PAYBOX_CODE;
    protected $_isOffline = true;

    public function getPayableTo()
    {
        return $this->getConfigData('payable_to');
    }

    public function getMailingAddress()
    {
        return $this->getConfigData('mailing_address');
    }
}