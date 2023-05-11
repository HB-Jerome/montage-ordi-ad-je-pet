<?php
namespace Model;

use Model\Component;

// Creation de class PowerSupply extends Component
class PowerSupply extends Component
{


	protected string $batteryPower;

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

	public function getBatteryPower(): string
	{
		return $this->batteryPower;
	}

	public function setBatteryPower(string $batteryPower): self
	{
		$this->batteryPower = $batteryPower;
		return $this;
	}
	public function GetCategory(): string
	{
		return self::POWER_SUPPLY;
	}
}
?>