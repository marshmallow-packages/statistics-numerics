<?php

namespace Marshmallow\Statistics\Statistics;

use Marshmallow\Statistics\Statistics\Traits\StandardOptions;

class TopList
{
	use StandardOptions;

	public function title(string $name)
	{
		$this->data['valueNameHeader'] = $name;
		return $this;
	}

	public function valueTitle(string $name)
	{
		$this->data['valueHeader'] = $name;
		return $this;
	}

	public function value(string $name, int $value)
	{
		$this->data['data'][] = [
			'name' => $name,
			'value' => $value
		];
		return $this;
	}
}
