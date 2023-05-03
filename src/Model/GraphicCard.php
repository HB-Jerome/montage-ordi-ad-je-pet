<?php 
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class GraphicCard extends Component
{
    protected string $chipset;
    protected string $memory;

//Méthodes (Set et Get)

	public function getChipset(): string {
		return $this->chipset;
	}
	
	public function setChipset(string $chipset): self {
		$this->chipset = $chipset;
		return $this;
	}

	public function getMemory(): string {
		return $this->memory;
	}
	
	public function setMemory(string $memory): self {
		$this->memory = $memory;
		return $this;
	}
}

