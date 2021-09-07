<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('translatable_extras');

        $treeBuilder->getRootNode()
            ->children()
                ->booleanNode('serializer')
                    ->defaultFalse()
                ->end()
            ->end()
        ;
    }
}
