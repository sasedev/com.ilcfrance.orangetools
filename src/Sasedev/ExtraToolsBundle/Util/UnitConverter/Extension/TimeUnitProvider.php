<?php

namespace Sasedev\ExtraToolsBundle\Util\UnitConverter\Extension;

use Sasedev\ExtraToolsBundle\Util\UnitConverter\BaseRatioUnitProvider;
use Sasedev\ExtraToolsBundle\Util\UnitConverter\RatioUnitProviderInterface;

/**
 * Description of DistanceUnitProvider
 * 
 * @author michel
 */
class TimeUnitProvider extends BaseRatioUnitProvider
{

	/**
	 *
	 * {@inheritDoc} @see RatioUnitProviderInterface::getRatios()
	 */
	public function getRatios()
	{
		return array('s' => 1, 'sec' => 1, 'm' => 60, 'h' => 60 * 60, 'd' => 60 * 60 * 24);
	}

	/**
	 *
	 * {@inheritDoc} @see RatioUnitProviderInterface::getLocale()
	 */
	public function getLocale()
	{
		return '';
	}

	/**
	 *
	 * {@inheritDoc} @see RatioUnitProviderInterface::getUnit()
	 */
	public function getUnit()
	{
		return self::TIME;
	}
}
