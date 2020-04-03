<?php

namespace Marshmallow\Statistics\App\Statistics;

use Marshmallow\Statistics\App\Statistics\Traits\StandardOptions;

class PieChart {

	use StandardOptions;

	public function value (string $name, int $value)
	{
		$this->data['data'][] = [
			'name' => $name,
			'value' => $value
		];
		return $this;
	}

}