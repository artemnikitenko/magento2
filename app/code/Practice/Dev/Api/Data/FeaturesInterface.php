<?php

namespace Practice\Dev\Api\Data;

interface FeaturesInterface
{
    const FEATURE = 'feature value';
    /**
     * @return string|null
     */
    public function getFeatures();

    /**
     * @param string $features
     * @return $this
     */
    public function setFeatures($features);

}