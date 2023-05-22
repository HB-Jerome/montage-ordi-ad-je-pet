<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class HardDisc extends Component
{
	protected ?int $discCapacity = null;
	protected ?bool $ssd = null;
	public function getSsd(): ?bool
	{
		return $this->ssd;
	}

	public function setSsd(bool $ssd): self
	{
		$this->ssd = $ssd;
		return $this;
	}
	public function GetCategory(): ?string
	{
		return self::HARD_DISC;
	}

	public function getDiscCapacity(): ?int
	{
		return $this->discCapacity;
	}

	public function setDiscCapacity(int $discCapacity): self
	{
		$this->discCapacity = $discCapacity;
		return $this;
	}
}