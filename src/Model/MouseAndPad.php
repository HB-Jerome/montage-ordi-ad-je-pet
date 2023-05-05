<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class MouseAndPad extends Component
{
	protected bool $isWireless;
	protected string $keyType;

	//Méthodes (Set et Get)

	public function getIsWireless(): bool
	{
		return $this->isWireless;
	}

	public function setIsWireless(bool $isWireless): self
	{
		$this->isWireless = $isWireless;
		return $this;
	}

	public function getKeyType(): string
	{
		return $this->keyType;
	}

	public function setKeyType(string $keyType): self
	{
		$this->keyType = $keyType;
		return $this;
	}
	public function GetCategory()
	{
		return self::MOUSE_AND_PAD;
	}
}