<?php

namespace Marshmallow\Statistics\App\Statistics;

use Marshmallow\Statistics\App\Statistics\Traits\StandardOptions;

class TopList {

	use StandardOptions;

	public function title (string $name)
	{
		$this->data['valueNameHeader'] = $name;
		return $this;
	}

	public function valueTitle (string $name)
	{
		$this->data['valueHeader'] = $name;
		return $this;
	}

	public function value (string $name, int $value)
	{
		$this->data['data'][] = [
			'name' => $name,
			'value' => $value
		];
		return $this;
	}

}