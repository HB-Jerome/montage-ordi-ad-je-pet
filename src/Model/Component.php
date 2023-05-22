<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

// use DateTime;

// Création de la classe parent Component
class Component
{
	const AVAILABLE_CATEGORIES = [
		self::GRAPHIC_CARD,
		self::HARD_DISC,
		self::KEYBOARD,
		self::MOTHER_BOARD,
		self::MOUSE_AND_PAD,
		self::POWER_SUPPLY,
		self::PROCESSOR,
		self::RAM,
		self::SCREEN,
	];

	// Classes associées aux catégories

	const AVAILABLE_CLASSES = [
		self::GRAPHIC_CARD => GraphicCard::class,
		self::HARD_DISC => HardDisc::class,
		self::KEYBOARD => Keyboard::class,
		self::MOTHER_BOARD => MotherBoard::class,
		self::POWER_SUPPLY => PowerSupply::class,
		self::MOUSE_AND_PAD => MouseAndPad::class,
		self::PROCESSOR => Processor::class,
		self::RAM => Ram::class,
		self::SCREEN => Screen::class,
	];

	// Constantes
	const GRAPHIC_CARD = "GraphicCard";
	const HARD_DISC = "HardDisc";
	const KEYBOARD = "Keyboard";
	const MOTHER_BOARD = "MotherBoard";
	const MOUSE_AND_PAD = "MouseAndPad";
	const POWER_SUPPLY = "PowerSupply";
	const PROCESSOR = "Processor";
	const RAM = "Ram";
	const SCREEN = "Screen";
	const TYPES = [
		self::FIXE,
		self::LAPTOP,
	];

	const FIXE = "fixe";
	const LAPTOP = "laptop";

	protected ?int $idComponent = null;
	protected ?string $name = null;
	protected ?string $brand = null;
	protected ?string $description = null;
	protected ?int $quantity = null;

	protected ?float $price = null;
	protected ?string $componentType = null;
	protected ?bool $isArchived = null;
	protected ?string $category = null;
	protected ?string $addDate = null;

	public function getIdComponent(): ?int
	{
		return $this->idComponent;
	}
	public function setIdComponent(int $idComponent): self
	{
		$this->idComponent = $idComponent;
		return $this;
	}
	public function getName(): ?string
	{
		return $this->name;
	}
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}
	public function getBrand(): ?string
	{
		return $this->brand;
	}
	public function setBrand(string $brand): self
	{
		$this->brand = $brand;
		return $this;
	}
	public function getDescription(): ?string
	{
		return $this->description;
	}
	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}
	public function getPrice(): ?float
	{
		return $this->price;
	}
	public function setPrice(float $price): self
	{
		$this->price = $price;
		return $this;
	}
	public function getIsArchived(): ?bool
	{
		return $this->isArchived;
	}
	public function setIsArchived(bool $isArchived): self
	{
		$this->isArchived = $isArchived;
		return $this;
	}
	public function getQuantity(): ?int
	{
		return $this->quantity;
	}
	public function setQuantity(int $quantity): self
	{
		$this->quantity = $quantity;
		return $this;
	}
	public function GetAVAILABLE_CATEGORIES(): array
	{
		return self::AVAILABLE_CATEGORIES;
	}
	public function getCategory(): ?string
	{
		return $this->category;
	}

	public function setCategory(string $category): self
	{
		$this->category = $category;
		return $this;
	}
	public function getComponentType(): ?string
	{
		return $this->componentType;
	}
	public function setComponentType(string $componentType): self
	{
		$this->componentType = $componentType;
		return $this;
	}
	public function getAddDate(): ?string
	{
		return $this->addDate;
	}

	public function setAddDate(string $addDate): self
	{
		$this->addDate = $addDate;
		return $this;
	}

}