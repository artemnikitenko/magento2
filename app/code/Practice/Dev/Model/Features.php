<?php

namespace Practice\Dev\Model;


use Practice\Dev\Api\Data\FeaturesInterface;

class Features implements FeaturesInterface
{
    /**
     * {@inheritdoc}
     */
    public function getFeatures()
    {
        return $this->getData(self::FEATURE);
    }

    /**
     * {@inheritdoc}
     */
    public function setFeatures($features)
    {
        return $this->setData(self::FEATURE, $features);
    }
}