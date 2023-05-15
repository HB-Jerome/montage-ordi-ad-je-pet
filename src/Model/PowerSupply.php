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