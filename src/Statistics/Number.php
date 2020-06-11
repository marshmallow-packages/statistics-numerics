<?php

namespace Marshmallow\Statistics\Statistics;

use Marshmallow\Statistics\Statistics\Traits\StandardOptions;

class Number
{
	use StandardOptions;

	public function value(int $value)
	{
		$this->data['data'] = [
			'value' => $value
		];
		return $this;
	}
}
