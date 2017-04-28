<?php

namespace Sasedev\ExtraToolsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * UnitConverterPass registers the tagged unit converter with the chain unit converter.
 * 
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class UnitConverterPass implements CompilerPassInterface
{

	/**
	 *
	 * {@inheritDoc} @see CompilerPassInterface::process()
	 */
	public function process(ContainerBuilder $container)
	{
		if ($container->hasDefinition('sasedev_extra_tools.unit_converter')) {
			$definition = $container->getDefinition('sasedev_extra_tools.unit_converter');
			foreach ($container->findTaggedServiceIds('sasedev_extra_tools.unit_converter') as $id) {
				$definition->addMethodCall('registerConverter', array(new Reference($id)));
			}
		}
	}
}
