<?php

namespace Sasedev\ExtraToolsBundle\Translation\Formatter;

use Symfony\Component\Yaml\Yaml;

class YmlFormatter implements FormatterInterface
{

	public function format(array $messages)
	{
		return Yaml::dump($messages);
	}
}
