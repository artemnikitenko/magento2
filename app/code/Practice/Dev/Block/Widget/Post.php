<?php

namespace Practice\Dev\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Post extends Template implements BlockInterface
{

    protected $_template = "widget/post.phtml";

}