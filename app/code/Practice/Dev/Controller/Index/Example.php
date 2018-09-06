<?php

namespace Practice\Dev\Controller\Index;

use \Magento\Framework\App\Action\Action;

class Example extends Action
{
    protected $title;

    public function execute()
    {
        $this->setTitle('Welcome');
        echo $this->getTitle();
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}