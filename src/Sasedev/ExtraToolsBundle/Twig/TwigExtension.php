<?php

namespace Sasedev\ExtraToolsBundle\Twig;

use Symfony\Component\Intl\Intl;
use Symfony\Component\Translation\TranslatorInterface;
use Twig_SimpleFilter;
use Sasedev\ExtraToolsBundle\Util\DateFormatter;
use Sasedev\ExtraToolsBundle\Util\UnitConverter\UnitConverterInterface;

/**
 * The twig extensions of the Sasedev bundle
 * Has a dependency to the apache intl module
 */
class TwigExtension extends \Twig_Extension
{

	protected $converter;

	protected $translator;

	public function setUnitConverter(UnitConverterInterface $converter)
	{
		$this->converter = $converter;
	}

	public function setTranslator(TranslatorInterface $translator)
	{
		$this->translator = $translator;
	}

	public function getFilters()
	{
		return array(new Twig_SimpleFilter('country', array($this, 'countryFilter')),
			new Twig_SimpleFilter('localeDate', array($this, 'localeDateFilter')),
			new Twig_SimpleFilter('convertUnit', array($this, 'convertFilter')));
	}

	/**
	 * Translate a country indicator to its locale full name
	 * Uses default system locale by default.
	 * Pass another locale string to force a different translation
	 *
	 * @param string $country
	 *        	The contry indicator
	 * @param string $default
	 *        	The default value is the country does not exist (optionnal)
	 * @param mixed $locale
	 * @return string The localized string
	 */
	public function countryFilter($country, $default = '', $locale = null)
	{
		$locale = $locale == null ? \Locale::getDefault() : $locale;
		$countries = Intl::getRegionBundle()->getCountryNames($locale);

		return array_key_exists($country, $countries) ? $countries[$country] : $default;
	}

	/**
	 * Translate a timestamp to a localized string representation.
	 * Parameters dateType and timeType defines a kind of format. Allowed values are (none|short|medium|long|full).
	 * Default is medium for the date and no time.
	 * Uses default system locale by default. Pass another locale string to force a different translation.
	 * You might not like the default formats, so you can pass a custom pattern as last argument.
	 *
	 * @param mixed $date
	 * @param string $dateType
	 * @param string $timeType
	 * @param mixed $locale
	 * @param string $pattern
	 *
	 * @return string The string representation
	 */
	public function localeDateFilter($date, $dateType = 'medium', $timeType = 'none', $locale = null, $pattern = null)
	{
		$formatter = new DateFormatter();

		return $formatter->format($date, $dateType, $timeType, $locale, $pattern);
	}

	/**
	 * Convert a value into another unit.
	 * Returns null if fails or not supported.
	 *
	 * @param mixed $value
	 * @param string $sourceUnit
	 * @param string $destinationUnit
	 * @param
	 *        	string the locale (optional)
	 * @return string|null The converted value
	 */
	public function convertFilter($value, $sourceUnit, $destinationUnit, $unitName, $locale = null)
	{
		if (null !== $value) {
			$translatedUnitName = $this->translator->trans($unitName, array(), 'SasedevExtraToolsBundle');

			$value = $this->converter->convert($value, $sourceUnit, $destinationUnit, $locale);
			$value = $value . ' ' . $translatedUnitName;
		}

		return $value;
	}

	/**
	 *
	 * {@inheritDoc} @see Twig_ExtensionInterface::getName()
	 */
	public function getName()
	{
		return 'Sasedev.SasedevExtraTools.Extension.Twig';
	}
}
