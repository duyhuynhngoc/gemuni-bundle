<?php

namespace Gemuni\RabbitMQBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gemuni_rabbit_mq');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->arrayNode('connection')
                    ->children()
                        ->scalarNode('host')->end()
                        ->arrayNode('port')
                            ->propertype('scalar')->end()
                        ->end()
                        ->scalarNode('user')
                            ->isRequired()
                        ->end()
                        ->scalarNode('password')
                            ->isRequired()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('queue_declare')
                    ->children()
                        ->scalarNode('queue_name')
                            ->isRequired()
                        ->end()
                        ->booleanNode('passive')->end() //Can use this to check whether an exchange exists without modifying the server state
                        ->booleanNode('durable')->end() //Make suer that RabbitMQ will never lose our queue if a crash occurs - the queue will survive a broker restart
                        ->booleanNode('exclusive')->end() //Used by only one connection and the queue will be deleted when that connection loses
                        ->booleanNode('autodelete')->end() //Queue is deleted when last consumer unsubscribes.
                    ->end()
                ->end()
                ->arrayNode('basic_consume')
                    ->children()
                        ->scalarNode('queue_name')
                            ->isRequired()
                        ->end()
                        ->scalarNode('tag')->end() //Identifier for the consumer, valid within the current channel.
                        ->booleanNode('no_local')->end() //True: The sever will not send messages to the connection that published them
                        ->booleanNode('no_ask')->end()//Send a proper acknowledgment from the worker, once we are done with a task.
                        ->booleanNode('exclusive')->end() //Queue my only be accesed by the current connection.
                        ->booleanNode('no_wait')->end()//TrueL the server will not respond to the method. The client should not wait for a reply method.
                    ->end()
                ->end()
            ->end();
        return $treeBuilder;
    }
}
