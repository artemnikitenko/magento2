<?php

namespace Practice\Dev\Plugin;

use Practice\Dev\Controller\Index\Example;

class DevPlugin
{

    public function beforeSetTitle(Example $subject, $title)
    {
        $title = "Test interceptor";
        return $title;

    }

    public function afterGetTitle(Example $subject, $result)
    {

        $result = "After title";
        return '<h1>'. $result .'</h1>';

    }

    public function aroundGetTitle(Example $subject, callable $proceed)
    {
        $result = $proceed();

        return $result;
    }

}