<?php

namespace Marshmallow\Statistics\Statistics;

use Carbon\Carbon;
use Marshmallow\Statistics\Statistics\Traits\StandardOptions;

class DayDensity
{
	use StandardOptions;

	public function addDay(Carbon $day, int $value)
	{
		$this->data['data'][] = [
			'date' => $day->format('Y-m-d'),
			'value' => $value
		];

		return $this;
	}
}
