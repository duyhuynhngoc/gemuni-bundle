<?php
/**
 * Modified date: 9/1/2015
 * Modified by: Duy Huynh
 */

namespace Gemuni\RabbitMQBundle\Lib;


use Gemuni\UtilityBundle\Lib\KernelUtility;
use PhpAmqpLib\Connection\AMQPConnection;

class RabitMQManager {
    const RABBIT_MQ_CONFIG = "rabbit_mq_config";
    private static $configs = null;

    public static function getConnection()
    {
        $config = self::getConnectionConfig();
        return new AMQPConnection($config['host'], $config['port'], $config['user'], $config['password']);
    }

    public static function getConnectionConfig()
    {
        self::init();
        return self::$configs['connection'];
    }

    public static function getQueueConfig()
    {
        self::init();
        return self::$configs['queue_declare'];
    }

    public static function getConsumeCofig()
    {
        self::init();
        return self::$configs['basic_consume'];
    }

    private static function init()
    {
        if(self::$configs == null){
            self::$configs = KernelUtility::getParameter(self::RABBIT_MQ_CONFIG);
        }
    }
}