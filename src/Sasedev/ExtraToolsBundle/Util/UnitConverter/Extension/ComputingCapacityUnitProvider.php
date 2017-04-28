<?php

namespace Sasedev\ExtraToolsBundle\Util\UnitConverter\Extension;

use Sasedev\ExtraToolsBundle\Util\UnitConverter\BaseRatioUnitProvider;
use Sasedev\ExtraToolsBundle\Util\UnitConverter\RatioUnitProviderInterface;

/**
 * Description of DistanceUnitProvider
 * 
 * @author michel
 */
class ComputingCapacityUnitProvider extends BaseRatioUnitProvider
{

	/**
	 *
	 * {@inheritDoc} @see RatioUnitProviderInterface::getRatios()
	 */
	public function getRatios()
	{
		return array('o' => 1, 'O' => 1, 'b' => 1, 'B' => 1 / 8);
	}

	/**
	 *
	 * {@inheritDoc} @see BaseRatioUnitProvider::getPrefixes()
	 */
	public function getPrefixes()
	{
		return array('Y' => 1000000000000000000000000, 'Z' => 1000000000000000000000, 'E' => 1000000000000000000, 'P' => 1000000000000000, 
			'T' => 1000000000000, 'G' => 1000000000, 'M' => 1000000, 'k' => 1000, 'h' => 100, 'da' => 10);
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
		return self::COMPUTING_CAPACITY;
	}
}
