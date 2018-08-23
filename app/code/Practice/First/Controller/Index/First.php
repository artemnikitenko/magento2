<?php

namespace Practice\First\Controller\Index;

use \Magento\Framework\DataObject;
use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

use Practice\First\Helper\Data;
use \Practice\First\Model\PostFactory;

class First extends Action
{
    public function __construct(Context $context, PageFactory $pageFactory, PostFactory $postFactory, Data $helperData)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        $this->_helperData = $helperData;

        return parent::__construct($context);
    }

    public function execute()
    {
        $this->showEventData();

        $this->showConfigData();

        $this->showCollectionData();


        return $this->_pageFactory->create();
    }

    public function showConfigData()
    {
        echo $this->_helperData->getGeneralConfig('enable');
        echo $this->_helperData->getGeneralConfig('display_text');

        exit();
    }

    public function showCollectionData()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
    }

    public function showEventData()
    {
        $textDisplay = new DataObject(array('text' => 'Practice'));
        $this->_eventManager->dispatch('practice_first_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}