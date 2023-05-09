<?php
namespace Service;

use PDO;

class ListPieceFilter
{
	protected float $minPrice = 0;
	protected float $maxPrice = 0;
	protected string $category = "";
	protected string $brand = "";

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
}