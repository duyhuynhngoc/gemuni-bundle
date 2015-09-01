<?php

namespace Gemuni\RabbitMQBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GemuniRabbitMQExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        //setting paramerter
        if(!isset($configs['connection']))
            $configs['connection'] = array();
        if(!isset($configs['connection']['host']))
            $configs['connection']['host'] = "localhost";
        if(!isset($configs['connection']['port']))
            $configs['connection']['port'] = array(5672);

        if(!isset($configs['queue_declare']))
            $configs['queue_declare'] = array();
        if(!isset($configs['queue_declare']['passive']))
            $configs['queue_declare']['passive'] = false;
        if(!isset($configs['queue_declare']['durable']))
            $configs['queue_declare']['durable'] = false;
        if(!isset($configs['queue_declare']['exclusive']))
            $configs['queue_declare']['exclusive'] = false;
        if(!isset($configs['queue_declare']['autodelete']))
            $configs['queue_declare']['autodelete'] = false;

        if(!isset($configs['basic_consume']))
            $configs['basic_consume'] = array();
        if(!isset($configs['basic_consume']['no_local']))
            $configs['basic_consume']['no_local'] = false;
        if(!isset($configs['basic_consume']['no_ask']))
            $configs['basic_consume']['no_ask'] = true;
        if(!isset($configs['basic_consume']['exclusive']))
            $configs['basic_consume']['exclusive'] = false;
        if(!isset($configs['basic_consume']['no_wait']))
            $configs['basic_consume']['no_wait'] = false;

        $container->setParametr("rabitt_mq_config", $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
