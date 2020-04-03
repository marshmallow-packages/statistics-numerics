<?php

namespace Marshmallow\Statistics\App\Statistics;

use Marshmallow\Statistics\App\Statistics\Traits\StandardOptions;

class Gauge {

	use StandardOptions;

	public function min (int $value)
	{
		$this->data['data']['minValue'] = $value;
		return $this;
	}

	public function value (int $value)
	{
		$this->data['data']['value'] = $value;
		return $this;
	}

	public function max (int $value)
	{
		$this->data['data']['maxValue'] = $value;
		return $this;
	}

}