<?php

namespace Marshmallow\Statistics\App\Statistics;

use Marshmallow\Statistics\App\Statistics\Traits\StandardOptions;

class NumberAndDifference {

	use StandardOptions;

	public function value (int $value)
	{
		$this->data['data'][] = [
			'value' => $value
		];
		return $this;
	}

	public function compareTo (int $value)
	{
		return $this->value($value);
	}

}