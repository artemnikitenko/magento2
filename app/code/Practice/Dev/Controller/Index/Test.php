<?php

namespace Practice\Dev\Controller\Index;

use Practice\Dev\Model\PostFactory;

use Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;

class Test extends Action
{
    protected $_pageFactory;
    protected $_postFactory;
    protected $title;

    public function __construct(Context $context, PageFactory $pageFactory, PostFactory $_postFactory, $stringPost, $helpData)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $_postFactory;

        var_dump($stringPost);
        var_dump($helpData->getData());
        exit;

        parent::__construct($context);
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function execute()
    {
        echo $this->setTitle('Welcome');
        echo $this->getTitle();
//        return $this->_pageFactory->create();
    }
}
