<?php

namespace Marshmallow\Statistics\Statistics;

use Marshmallow\Statistics\Statistics\Traits\StandardOptions;
use Exception;

class HourDensity
{
	use StandardOptions;

	public function addHours(array $hours)
	{
		if (count($hours) != 24) {
			throw new Exception("The hours array should have exactly 24 items");
		}

		foreach ($hours as $hour => $value) {
			$this->data['data'][] = [
				'hour' => $hour,
				'value' => $value
			];
		}

		return $this;
	}
}
