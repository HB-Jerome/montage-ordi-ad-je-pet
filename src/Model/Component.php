<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

// Création de la classe parent Component
abstract class Component
{
	const AVAILABLE_CATEGORIES = [
		self::GRAPHIC_CARD,
		self::HARD_DISC,
		self::KEYBORD,
		self::MOTHER_BOARD,
		self::MOUSE_AND_PAD,
		self::POWER_SUPPLY,
		self::PROCESSOR,
		self::RAM,
		self::SCREEN,
	];
	const GRAPHIC_CARD = "GraphicCard";
	const HARD_DISC = "HardDisc";
	const KEYBORD = "Keyboard";
	const MOTHER_BOARD = "MotherBoard";
	const MOUSE_AND_PAD = "MouseAndPad";
	const POWER_SUPPLY = "PowerSupply";
	const PROCESSOR = "Processor";
	const RAM = "Ram";
	const SCREEN = "Screen";
	protected int $idComponent;
	protected string $name;
	protected string $brand;
	protected string $description;
	protected float $price;
	protected string $pcType;
	protected bool $isArchived;
	protected string $category;
	protected array $categoryFilter = [];


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

	public function getPcType(): string
	{
		return $this->pcType;
	}

	public function setPcType(string $pcType): self
	{
		$this->pcType = $pcType;
		return $this;
	}

	public function getIsArchived(): bool
	{
		return $this->isArchived;
	}

	public function setIsArchived(bool $isArchived): self
	{
		$this->isArchived = $isArchived;
		return $this;
	}

	public function getCategory(): string {
		return $this->category;
	}
	
	public function setCategory(string $category): self {
		$this->category = $category;
		return $this;
	}

}