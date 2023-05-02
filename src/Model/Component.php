<?php 
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

// Création de la classe parent Component
abstract class Component
{
    protected int $id_component ;
    protected string $name ;
    protected  string $brand ;
    protected  string $description ;
    protected  float $price ;
    protected  string $pc_type ;
    protected  bool $is_archived ;


	public function getid_component(): int {
		return $this->id_component;
	}
	
	public function setid_component(int $id_component): self {
		$this->id_component = $id_component;
		return $this;
	}


	public function getName(): string {
		return $this->name;
	}


	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}


	public function getBrand(): string {
		return $this->brand;
	}


	public function setBrand(string $brand): self {
		$this->brand = $brand;
		return $this;
	}


	public function getDescription(): string {
		return $this->description;
	}

		public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}

		public function getPrice(): float {
		return $this->price;
	}

		public function setPrice(float $price): self {
		$this->price = $price;
		return $this;
	}

		public function getPc_type(): string {
		return $this->pc_type;
	}

		public function setPc_type(string $pc_type): self {
		$this->pc_type = $pc_type;
		return $this;
	}

		public function getIs_archived(): bool {
		return $this->is_archived;
	}

		public function setIs_archived(bool $is_archived): self {
		$this->is_archived = $is_archived;
		return $this;
	}
}