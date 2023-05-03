<?php
namespace Model;
use Model\Component;
// Création de la classe enfant processor extends Component
class Processor extends Component {
    protected  int $idComponent;	
    protected int $coreNumber;	
    protected string $compatibleChipset;	
    protected float $cpuFrequency; 

    public function __construct()
    {
    }


	public function getidComponent() {
		return $this->idComponent;
	}

	public function setidComponent($idComponent): self {
		$this->idComponent = $idComponent;
		return $this;
	} 

    public function getCoreNumber() {
		return $this->coreNumber;
	}

	public function setCoreNumber($coreNumber): self {
		$this->coreNumber = $coreNumber;
		return $this;
	}
    
	public function getCompatibleChipset() {
		return $this->compatibleChipset;
	}
	
	
	public function setCompatibleChipset($compatibleChipset): self {
		$this->compatibleChipset = $compatibleChipset;
		return $this;
	}

	public function getCpuFrequency() {
		return $this->cpuFrequency;
	}
	
	public function setCpuFrequency($cpuFrequency): self {
		$this->cpuFrequency = $cpuFrequency;
		return $this;
	}

}
?>