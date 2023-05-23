<?php
namespace Model;

use Model\Component;

// Creation de class PowerSupply extends Componen
class Screen extends Component
{
	protected ?float $size = null;


	public function getSize(): ?float
	{
		return $this->size;
	}

	public function setSize(float $size): self
	{
		$this->size = $size;
		return $this;
	}
	public function GetCategory(): string
	{
		return self::SCREEN;
	}
}
?>