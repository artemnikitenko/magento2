<?php

namespace Practice\Dev\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;


class Data extends AbstractHelper
{
    public function getData()
    {
        return "data from helper!";
    }
}