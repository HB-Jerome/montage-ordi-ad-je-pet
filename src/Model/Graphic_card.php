<?php 
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class Graphic_card extends Component
{
    protected string $chipset;
    protected string $emory_in_go;

//Méthodes (Set et Get)

	public function getChipset(): string {
		return $this->chipset;
	}
	
	public function setChipset(string $chipset): self {
		$this->chipset = $chipset;
		return $this;
	}

	public function getEmory_in_go(): string {
		return $this->emory_in_go;
	}
	
	public function setEmory_in_go(string $emory_in_go): self {
		$this->emory_in_go = $emory_in_go;
		return $this;
	}
}

