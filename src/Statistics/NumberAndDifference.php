<?php

namespace Marshmallow\Statistics\Statistics;

use Marshmallow\Statistics\Statistics\Traits\StandardOptions;

class NumberAndDifference
{
	use StandardOptions;

	public function value(int $value)
	{
		$this->data['data'][] = [
			'value' => $value
		];
		return $this;
	}

	public function compareTo(int $value)
	{
		return $this->value($value);
	}
}
