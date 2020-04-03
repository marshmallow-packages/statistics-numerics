<?php

namespace Marshmallow\Statistics\App\Statistics;

use Marshmallow\Statistics\App\Statistics\Traits\StandardOptions;

class LineGraph {

	use StandardOptions;

	public function value (int $value)
	{
		$this->data['data'][] = [
			'value' => $value
		];
		return $this;
	}

}