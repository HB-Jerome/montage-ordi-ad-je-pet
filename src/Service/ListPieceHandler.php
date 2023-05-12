<?php
namespace Service;

use PDO;

class ListPieceHandler
{
	protected float $minPrice = 0;
	protected float $maxPrice = 0;
	protected string $category = "";
	protected string $brand = "";
	protected int $quantity = 0;
	protected int $numberOfModelePerPiece = 0;
	protected ?string $sortBy = null;

	public function __construct(array $postData)
	{
		if (!empty($postData['minPrice'])) {
			$this->setMinPrice($postData['minPrice']);
		}
		if (!empty($postData['maxPrice'])) {
			$this->setMaxPrice($postData['maxPrice']);
		}
		if (!empty($postData['category'])) {
			$this->setCategory($postData['category']);
		}
		if (!empty($postData['brand'])) {
			$this->setBrand($postData['brand']);
		}
		if (isset($postData['quantity'])) {
			$this->setQuantity($postData['quantity']);
		}
		if (!empty($postData['numberOfModelePerPiece'])) {
			$this->setNumberOfModelePerPiece($postData['numberOfModelePerPiece']);
		}
		if (!empty($postData['trier'])) {
			$this->setSortBy($postData['trier']);
		}
	}

	public function getMinPrice(): float
	{
		return $this->minPrice;
	}

	public function setMinPrice(float $minPrice): self
	{
		$minPrice = floatval($minPrice);
		$this->minPrice = $minPrice;
		return $this;
	}

	public function getMaxPrice(): float
	{
		return $this->maxPrice;
	}

	public function setMaxPrice(float $maxPrice): self
	{
		$maxPrice = floatval($maxPrice);
		$this->maxPrice = $maxPrice;
		return $this;
	}

	public function getCategory(): string
	{
		return $this->category;
	}

	public function setCategory(string $category): self
	{
		$this->category = $category;
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


	public function getNumberOfModelePerPiece(): int
	{
		return $this->numberOfModelePerPiece;
	}

	public function setNumberOfModelePerPiece(int $numberOfModelePerPiece): self
	{
		$this->numberOfModelePerPiece = $numberOfModelePerPiece;
		return $this;
	}

	public function getSortBy(): ?string
	{
		return $this->sortBy;
	}

	public function setSortBy(?string $sortBy): self
	{
		$this->sortBy = $sortBy;
		return $this;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}

	public function setQuantity(int $quantity): self
	{
		$this->quantity = $quantity;
		return $this;
	}
}