<?php

namespace Model;

class ModelPc
{
    protected int $idModel;
    protected string $name;
    protected int $quantity;

    protected int $pcNumber;
    protected float $price;
    protected $addDate;
    protected bool $isArchived;
    protected array $configuration;

    public function getIdModel(): int
    {
        return $this->idModel;
    }

    public function setIdModel(int $idModel): self
    {
        $this->idModel = $idModel;
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

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getAddDate()
    {
        return $this->addDate;
    }

    public function setAddDate($addDate): self
    {
        $this->addDate = $addDate;
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

    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    public function setConfiguration(array $configuration): self
    {
        $this->configuration = $configuration;
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



    /**
     * @return 
     */
    public function getPcNumber(): int
    {
        return $this->pcNumber;
    }

    /**
     * @param  $pcNumber 
     * @return self
     */
    public function setPcNumber(int $pcNumber): self
    {
        $this->pcNumber = $pcNumber;
        return $this;
    }
}