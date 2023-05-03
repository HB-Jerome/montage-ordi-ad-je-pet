<?php 
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class Hard_disc extends Component
{
    protected int $capacity;
    protected bool $isSsd;

	public function getCapacity(): int {
		return $this->capacity;
	}
	
//Méthodes (Set et Get)

	public function setCapacity(int $capacity): self {
		$this->capacity = $capacity;
		return $this;
	}

	public function getIsSsd(): bool {
		return $this->isSsd;
	}
	
	public function setIsSsd(bool $isSsd): self {
		$this->isSsd = $isSsd;
		return $this;
	}
}
