<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\DependencyInjection;

use Lustmored\TranslatableExtrasBundle\Serializer\TranslationNormalizer;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Reference;

class TranslatableExtrasExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        var_dump($config);
        if ($config['serializer']) {
            $definition = new Definition(TranslationNormalizer::class);
            $definition->setPublic(false);
            $definition->addTag('serializer.normalizer');
            $definition->addArgument(new Reference('translator'));
            $container->setDefinition(
                'translatable_extras.normalizer',
                $definition
            )->setPublic(false)->addTag('serializer.normalizer');
        }
    }
}
