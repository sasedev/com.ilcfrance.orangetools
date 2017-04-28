<?php

namespace Sasedev\ExtraToolsBundle\Util\UnitConverter\Extension;

use Sasedev\ExtraToolsBundle\Util\UnitConverter\BaseRatioUnitProvider;
use Sasedev\ExtraToolsBundle\Util\UnitConverter\RatioUnitProviderInterface;

/**
 * Description of DistanceUnitProvider
 * 
 * @author michel
 */
class FrequencyUnitProvider extends BaseRatioUnitProvider
{

	/**
	 *
	 * {@inheritDoc} @see RatioUnitProviderInterface::getRatios()
	 */
	public function getRatios()
	{
		return array('Hz' => 1);
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
		return self::FREQUENCY;
	}
}
