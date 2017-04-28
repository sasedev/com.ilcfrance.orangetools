<?php

namespace Sasedev\ExtraToolsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * RatioUnitProviderPass registers the tagged ratio unit providers to the ratio unit provider.
 * 
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class RatioUnitProviderPass implements CompilerPassInterface
{

	/**
	 *
	 * {@inheritDoc} @see CompilerPassInterface::process()
	 */
	public function process(ContainerBuilder $container)
	{
		if ($container->hasDefinition('sasedev_extra_tools.ratio_unit_converter')) {
			$definition = $container->getDefinition('sasedev_extra_tools.ratio_unit_converter');
			foreach ($container->findTaggedServiceIds('sasedev_extra_tools.ratio_unit_provider') as $id) {
				$definition->addMethodCall('registerRatioUnitProvider', array(new Reference($id)));
			}
		}
	}
}
