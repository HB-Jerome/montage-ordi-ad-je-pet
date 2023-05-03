<?php 
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class Mouse_and_pad extends Component
{
    protected bool $is_wireless;
    protected string $key_type;

//Méthodes (Set et Get)

	public function getIs_wireless(): bool {
		return $this->is_wireless;
	}
	
	public function setIs_wireless(bool $is_wireless): self {
		$this->is_wireless = $is_wireless;
		return $this;
	}

	public function getKey_type(): string {
		return $this->key_type;
	}
	
	public function setKey_type(string $key_type): self {
		$this->key_type = $key_type;
		return $this;
	}
}

