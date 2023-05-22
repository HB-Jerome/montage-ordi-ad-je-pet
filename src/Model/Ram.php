<?php
namespace Model;

use Model\Component;

// Creation class enfant RAM which extends Component
class Ram extends Component
{
	protected ?int $ramCapacity = null;
	protected ?int $numberOfBars = null;
	protected ?string $detail = null;

	public function __construct()
	{

	}



	public function getNumberOfBars(): ?int
	{
		return $this->numberOfBars;
	}


	public function setNumberOfBars(int $numberOfBars): self
	{
		$this->numberOfBars = $numberOfBars;
		return $this;
	}


	public function getDetail(): ?string
	{
		return $this->detail;
	}


	public function setDetail(string $detail): self
	{
		$this->detail = $detail;
		return $this;
	}
	public function GetCategory(): ?string
	{
		return self::RAM;
	}

	public function getRamCapacity(): ?int
	{
		return $this->ramCapacity;
	}

	public function setRamCapacity(int $ramCapacity): self
	{
		$this->ramCapacity = $ramCapacity;
		return $this;
	}
}
?>