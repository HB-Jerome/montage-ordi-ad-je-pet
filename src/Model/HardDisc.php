<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class HardDisc extends Component
{
	protected int $capacity;
	protected bool $ssd;

	public function getCapacity(): int
	{
		return $this->capacity;
	}

	//Méthodes (Set et Get)

	public function setCapacity(int $capacity): self
	{
		$this->capacity = $capacity;
		return $this;
	}

	public function getSsd(): bool
	{
		return $this->ssd;
	}

	public function setSsd(bool $ssd): self
	{
		$this->ssd = $ssd;
		return $this;
	}
	public function GetCategory()
	{
		return self::HARD_DISC;
	}
}