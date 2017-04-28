<?php

namespace Sasedev\ExtraToolsBundle\Util\UnitConverter\Extension\fr;

use Sasedev\ExtraToolsBundle\Util\UnitConverter\BaseRatioUnitProvider;
use Sasedev\ExtraToolsBundle\Util\UnitConverter\RatioUnitProviderInterface;

/**
 * Description of DistanceUnitProvider
 * 
 * @author michel
 */
class DistanceUnitProvider extends BaseRatioUnitProvider
{

	/**
	 *
	 * {@inheritDoc} @see RatioUnitProviderInterface::getRatios()
	 */
	public function getRatios()
	{
		return array('p' => 0.0254, 'po' => 0.0254, 'pouce' => 0.0254, 'pouces' => 0.0254);
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 */
	public function getLocale()
	{
		return 'fr';
	}

	public function getUnit()
	{
		return self::LENGTH;
	}
}
