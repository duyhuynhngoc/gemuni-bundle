<?php

namespace Gemuni\ElasticBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('gemuni_elastic');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->arrayNode('elasticsearch')
                    ->children()
                        ->scalarNode('hosts')//array: []
                            ->property('scalar')->end()
                        ->end()
                        ->scalarNode('connectionClass') ->end()
                        ->scalarNode('connectionFactoryClass')  ->end()
                        ->scalarNode('connectionPoolClass')     ->end()
                        ->scalarNode('selectorClass')   ->end()
                        ->scalarNode('serializerClass') ->end()
                        ->booleanNode('sniffOnStart')   ->end()
                        ->scalarNode('connectionParams')
                            ->propertype('scalar')->end()
                        ->end()
                        ->booleanNode('logging')        ->end()
                        ->scalarNode('logPath')         ->end()
                        ->scalarNode('logPermission')   ->end()
                        ->scalarNode('logObject')       ->end()
                        ->scalarNode('logLevel')        ->end()
                        ->scalarNode('traceObject')     ->end()
                        ->scalarNode('tracePath')       ->end()
                        ->scalarNode('traceLevel')      ->end()
                        ->scalarNode('guzzleOptions') //array
                            ->propertype('scalar')->end()
                        ->end()
                        ->scalarNode('connectionPoolParams') //array
                            ->propertype('scalar')->end()
                        ->end()
                        ->scalarNode('retries')         ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
