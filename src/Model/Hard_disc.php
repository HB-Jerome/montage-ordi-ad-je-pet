<?php 
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class Hard_disc extends Component
{
    protected int $capacity;
    protected bool $is_ssd;

	public function getCapacity(): int {
		return $this->capacity;
	}
	
//Méthodes (Set et Get)

	public function setCapacity(int $capacity): self {
		$this->capacity = $capacity;
		return $this;
	}

	public function getIs_ssd(): bool {
		return $this->is_ssd;
	}
	
	public function setIs_ssd(bool $is_ssd): self {
		$this->is_ssd = $is_ssd;
		return $this;
	}
}
