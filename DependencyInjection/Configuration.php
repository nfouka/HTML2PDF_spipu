<?php

namespace UGA\Html2PDFBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('uga_html2_pdf');

                $rootNode
                ->children()
                ->scalarNode('html2_pdf_orientation')->defaultValue('P')->end()
                ->scalarNode('html2_pdf_format')->defaultValue('A4')->end()
                ->scalarNode('html2_pdf_lang')->defaultValue('en')->end()
                ->booleanNode('html2_pdf_unicode')->defaultTrue()->end()
                ->scalarNode('html2_pdf_encoding')->defaultValue('UTF-8')->end()
                ->arrayNode('html2_pdf_margin')
                    ->prototype('scalar')->end()
                    ->defaultValue(array(10, 15, 10, 15))
                ->end()
            ->end() ; 

        return $treeBuilder;
    }
}
