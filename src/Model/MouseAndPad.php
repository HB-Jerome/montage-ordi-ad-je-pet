<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class MouseAndPad extends Component
{
	protected bool $mouseIsWireless;
	protected string $numberOfKey;

	//Méthodes (Set et Get)

	public function getNumberOfKey(): string
	{
		return $this->numberOfKey;
	}

	public function setNumberOfKey(string $keyType): self
	{
		$this->numberOfKey = $keyType;
		return $this;
	}
	public function GetCategory(): string
	{
		return self::MOUSE_AND_PAD;
	}

	/**
	 * @return 
	 */
	public function getMouseIsWireless(): bool
	{
		return $this->mouseIsWireless;
	}


	public function setMouseIsWireless(bool $mouseIsWireless): self
	{
		$this->mouseIsWireless = $mouseIsWireless;
		return $this;
	}
}