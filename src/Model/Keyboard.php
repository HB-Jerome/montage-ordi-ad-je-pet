<?php
namespace Model;

use Model\Component;
// Creation class enfant Keyboard which extends Component
class Keyboard extends Component {
    protected int $idComponent; 	
    protected  bool $isWireless; 	
    protected  bool $keylessKeyboard; 	
    protected string $keyType; 
    
    public function __construct()
    {
    }

    
	public function getIdComponent(): int {
		return $this->idComponent;
	}
	
	public function setIdComponent(int $idComponent): self {
		$this->idComponent = $idComponent;
		return $this;
	}

	public function getIsWireless(): bool {
		return $this->isWireless;
	}
	
	public function setIsWireless(bool $isWireless): self {
		$this->isWireless = $isWireless;
		return $this;
	}
	
	public function getKeylessKeyboard(): bool {
		return $this->keylessKeyboard;
	}
	
	public function setKeylessKeyboard(bool $keylessKeyboard): self {
		$this->keylessKeyboard = $keylessKeyboard;
		return $this;
	}

	public function getKeyType(): string {
		return $this->keyType;
	}
	
	public function setKeyType(string $keyType): self {
		$this->keyType = $keyType;
		return $this;
	}
}
?>