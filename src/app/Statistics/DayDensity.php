<?php

namespace Marshmallow\Statistics\App\Statistics;

use Carbon\Carbon;
use Marshmallow\Statistics\App\Statistics\Traits\StandardOptions;

class DayDensity {

	use StandardOptions;

	public function addDay (Carbon $day, int $value)
	{
		$this->data['data'][] = [
			'date' => $day->format('Y-m-d'),
			'value' => $value
		];

		return $this;
	}

}