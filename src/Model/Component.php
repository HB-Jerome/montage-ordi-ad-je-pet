<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

// Création de la classe parent Component
abstract class Component
{
	protected int $idComponent;
	protected string $name;
	protected string $brand;
	protected string $description;
	protected float $price;
	protected string $pcType;
	protected bool $isArchived;


	public function getidComponent(): int
	{
		return $this->idComponent;
	}

	public function setidComponent(int $idComponent): self
	{
		$this->idComponent = $idComponent;
		return $this;
	}


	public function getName(): string
	{
		return $this->name;
	}


	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}


	public function getBrand(): string
	{
		return $this->brand;
	}


	public function setBrand(string $brand): self
	{
		$this->brand = $brand;
		return $this;
	}


	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

	public function setPrice(float $price): self
	{
		$this->price = $price;
		return $this;
	}

	public function getPc_type(): string
	{
		return $this->pc_type;
	}

	public function setPc_type(string $pcType): self
	{
		$this->pcType = $pcType;
		return $this;
	}

	public function getIs_archived(): bool
	{
		return $this->isArchived;
	}

	public function setIs_archived(bool $isArchived): self
	{
		$this->isArchived = $isArchived;
		return $this;
	}
}