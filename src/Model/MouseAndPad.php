<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class MouseAndPad extends Component
{
	protected bool $MouseIsWireless;
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
		return $this->MouseIsWireless;
	}

	/**
	 * @param  $MouseIsWireless 
	 * @return self
	 */
	public function setMouseIsWireless(bool $MouseIsWireless): self
	{
		$this->MouseIsWireless = $MouseIsWireless;
		return $this;
	}
}