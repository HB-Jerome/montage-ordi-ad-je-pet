<?php
namespace Model;

use Model\Component;

// Création de la classe enfant processor extends Component
class Processor extends Component
{
	protected ?int $coreNumber = null;
	protected ?string $compatibleChipset = null;
	protected ?float $cpuFrequency = null;

	public function __construct()
	{
	}


	public function getCoreNumber(): ?int
	{
		return $this->coreNumber;
	}

	public function setCoreNumber($coreNumber): self
	{
		$this->coreNumber = $coreNumber;
		return $this;
	}

	public function getCompatibleChipset(): ?string
	{
		return $this->compatibleChipset;
	}


	public function setCompatibleChipset($compatibleChipset): self
	{
		$this->compatibleChipset = $compatibleChipset;
		return $this;
	}

	public function getCpuFrequency(): ?string
	{
		return $this->cpuFrequency;
	}

	public function setCpuFrequency($cpuFrequency): self
	{
		$this->cpuFrequency = $cpuFrequency;
		return $this;
	}
	public function GetCategory(): string
	{
		return self::PROCESSOR;
	}
}
?>