<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class HardDisc extends Component
{
	protected int $discCapacity;
	protected bool $ssd;
	public function getSsd(): bool
	{
		return $this->ssd;
	}

	public function setSsd(bool $ssd): self
	{
		$this->ssd = $ssd;
		return $this;
	}
	public function GetCategory(): string
	{
		return self::HARD_DISC;
	}


	/**
	 * @return 
	 */
	public function getDiscCapacity(): int
	{
		return $this->discCapacity;
	}

	/**
	 * @param  $discCapacity 
	 * @return self
	 */
	public function setDiscCapacity(int $discCapacity): self
	{
		$this->discCapacity = $discCapacity;
		return $this;
	}
}