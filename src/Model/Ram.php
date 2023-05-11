<?php
namespace Model;

use Model\Component;

// Creation class enfant RAM which extends Component
class Ram extends Component
{
	protected int $capacity;
	protected int $numberOfBars;
	protected string $description;

	public function __construct()
	{

	}

	public function getIdComponent(): int
	{
		return $this->idComponent;
	}

	public function setIdComponent(int $idComponent): self
	{
		$this->idComponent = $idComponent;
		return $this;
	}

	public function getCapacity(): int
	{
		return $this->capacity;
	}


	public function setCapacity(int $capacity): self
	{
		$this->capacity = $capacity;
		return $this;
	}


	public function getNumberOfBars(): int
	{
		return $this->numberOfBars;
	}


	public function setNumberOfBars(int $numberOfBars): self
	{
		$this->numberOfBars = $numberOfBars;
		return $this;
	}


	public function getDescription(): string
	{
		return $this->description;
	}


	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}
	public function GetCategory(): string
	{
		return self::RAM;
	}
}
?>