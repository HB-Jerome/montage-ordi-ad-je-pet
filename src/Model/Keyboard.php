<?php
namespace Model;

use Model\Component;

// Creation class enfant Keyboard which extends Component
class Keyboard extends Component
{
	protected ?bool $keybordIsWireless = null;
	protected ?bool $withPad = null;
	protected ?string $keyType = null;




	public function getWithPad(): ?bool
	{
		return $this->withPad;
	}

	public function setWithPad(bool $withPad): self
	{
		$this->withPad = $withPad;
		return $this;
	}


	public function getKeyType(): ?string
	{
		return $this->keyType;
	}

	public function setKeyType(string $keyType): self
	{
		$this->keyType = $keyType;
		return $this;
	}

	public function GetCategory(): ?string
	{
		return self::KEYBOARD;
	}

	/**
	 * @return 
	 */
	public function getKeybordIsWireless(): ?bool
	{
		return $this->keybordIsWireless;
	}

	/**
	 * @param  $keybordIsWireless 
	 * @return self
	 */
	public function setKeybordIsWireless(bool $keybordIsWireless): self
	{
		$this->keybordIsWireless = $keybordIsWireless;
		return $this;
	}
}
?>