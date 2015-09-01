<?php
/**
 * Modified date: 8/27/2015
 * Modified by: Duy Huynh
 */

namespace Gemuni\UtilityBundle\Lib;
/**
 * Utility for kernel Symfony 2 bundle
 * Class KernelUtility
 */
class KernelUtility {
    public static function getParameter($parameterName)
    {
        return self::getContainer()->getParameter($parameterName);
    }

    public static function getContainer()
    {
        $kernal = $GLOBALS['kernel'];
        if('AppCache' == get_class($kernal))
            $kernal = $kernal->getKernel();

        return $kernal->getContainer();
    }
}