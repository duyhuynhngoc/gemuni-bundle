<?php
/**
 * Modified date: 8/27/2015
 * Modified by: Duy Huynh
 */

namespace Gemuni\ElasticBundle\Lib\Elasticsearch;


use Gemuni\UtilityBundle\Lib\KernelUtility;

class Configuration {
    public static function getConfig()
    {
        $configs = KernelUtility::getParameter('elastic');
        return $configs['elasticsearch'];
    }
}