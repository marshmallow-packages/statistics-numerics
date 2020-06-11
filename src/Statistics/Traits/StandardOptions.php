<?php

namespace Marshmallow\Statistics\Statistics\Traits;

use Exception;

trait StandardOptions
{
	protected $allowed_colors = [
		'red', 'blue', 'green', 'purple', 'orange',
		'midnight_blue', 'coffee', 'burgundy','wintergreen',
	];

	protected $data;

	public function title($title)
	{
		$this->data['postfix'] = $title;
		return $this;
	}

	public function value(string $value)
	{
		$this->data['data'] = [
			'value' => $value
		];
		return $this;
	}

	public function color($color)
	{
		if (!in_array($color, $this->allowed_colors)) {
			throw new Exception("This color is not allowed. Color must be one of: " . join($this->allowed_colors, ', ') . ".");
		}
		$this->data['color'] = $color;
		return $this;
	}

	public function red()
	{
		return $this->color('red');
	}

	public function blue()
	{
		return $this->color('blue');
	}

	public function green()
	{
		return $this->color('green');
	}

	public function purple()
	{
		return $this->color('purple');
	}

	public function orange()
	{
		return $this->color('orange');
	}

	public function midnightBlue()
	{
		return $this->color('midnight_blue');
	}

	public function coffee()
	{
		return $this->color('coffee');
	}

	public function burgundy()
	{
		return $this->color('burgundy');
	}

	public function wintergreen()
	{
		return $this->color('wintergreen');
	}

	public function __toString()
	{
		return json_encode($this->data);
	}
}
