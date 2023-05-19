<?php

namespace Model;

class ModelPc
{
    protected ?int $idModel;
    protected string $name;
    protected ?string $descriptionModel;
    protected int $modelQuantity;
    protected int $nbrPcCreated;
    protected string $modelType;
    protected int $pcNumber;
    protected float $price;
    protected $addDate;
    protected bool $isArchived;


    public function getIdModel(): int
    {
        return $this->idModel;
    }

    public function setIdModel(?int $idModel): self
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

    public function getPrice(): float
    {
        return $this->price;
    }


    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getPcNumber(): int
    {
        return $this->pcNumber;
    }

    public function setPcNumber(int $pcNumber): self
    {
        $this->pcNumber = $pcNumber;
        return $this;
    }
    public function getDescriptionModel(): ?string
    {
        return $this->descriptionModel;
    }

    public function setDescriptionModel(?string $descriptionModel): self
    {
        $this->descriptionModel = $descriptionModel;
        return $this;
    }

    public function getModelType(): string
    {
        return $this->modelType;
    }

    public function setModelType(string $modelType): self
    {
        $this->modelType = $modelType;
        return $this;
    }
    public function getModelQuantity(): int
    {
        return $this->modelQuantity;
    }


    public function setModelQuantity(int $modelQuantity): self
    {
        $this->modelQuantity = $modelQuantity;
        return $this;
    }

    /**
     * @return 
     */
    public function getNbrPcCreated(): int
    {
        return $this->nbrPcCreated;
    }

    /**
     * @param  $nbrPcCreated 
     * @return self
     */
    public function setNbrPcCreated(int $nbrPcCreated): self
    {
        $this->nbrPcCreated = $nbrPcCreated;
        return $this;
    }
}