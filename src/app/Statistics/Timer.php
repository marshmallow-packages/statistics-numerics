<?php

namespace Marshmallow\Statistics\App\Statistics;

use Carbon\Carbon;
use Marshmallow\Statistics\App\Statistics\Traits\StandardOptions;

class Timer {

	use StandardOptions;

	public function title (string $value)
	{
		$this->data['data']['name'] = $value;
		return $this;
	}

	public function date (Carbon $date)
	{
		$this->data['data']['dateValue'] = $date->format('Y-m-d') . 'T' . $date->format('H:i') . $date->format('O');
		$this->data['data']['dateFormat'] = "yyyy-MM-dd'T'HH:mmZ";
		return $this;
	}
}