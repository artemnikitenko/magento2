<?php

namespace Practice\Dev\Block;

use \Magento\Framework\View\Element\Template;

class Test extends Template
{
    public function getHelloWorld()
    {
        return 'Hello World';
    }
}