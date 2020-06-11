<?php

namespace Marshmallow\Statistics\Statistics;

use Marshmallow\Statistics\Statistics\Traits\StandardOptions;

class PieChart
{
	use StandardOptions;

	public function value(string $name, int $value)
	{
		$this->data['data'][] = [
			'name' => $name,
			'value' => $value
		];
		return $this;
	}
}
