<?php

namespace Sasedev\ExtraToolsBundle\Util\UnitConverter\Extension\fr;

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
		return array('seconde' => 1, 'secondes' => 1, 'minute' => 60, 'minutes' => 60, 'heure' => 60 * 60, 'heures' => 60 * 60);
	}

	/**
	 *
	 * {@inheritDoc} @see RatioUnitProviderInterface::getLocale()
	 */
	public function getLocale()
	{
		return 'fr';
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
