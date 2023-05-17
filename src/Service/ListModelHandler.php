<?php
namespace Service;

use PDO;

class ListModelHandler
{
    protected ?float $minPrice = null;
    protected ?float $maxPrice = null;
    protected ?string $sortBy = null;
    protected ?bool $isArchived = null;

    protected ?bool $nonReadComent = null;
    protected ?bool $complete = true;

    protected ?array $errors = [];

    public function __construct(array $postData)
    {
        if (!empty($postData['nonReadComent'])) {
            $this->setNonReadComent($postData['nonReadComent']);
        } else {
            $this->complete = false;
        }
        if (!empty($postData['minPrice'])) {
            $this->setMinPrice(intval($postData['minPrice']));
        } else {
            $this->complete = false;
        }
        if (!empty($postData['maxPrice'])) {
            $this->setMaxPrice(intval($postData['maxPrice']));
        } else {
            $this->complete = false;
        }
        if (!empty($postData['isArchived'])) {
            $this->setIsArchived($postData['isArchived']);
        } else {
            $this->complete = false;
        }
        if (!empty($postData['sortBy'])) {
            $this->setSortBy($postData['sortBy']);
        } else {
            $this->complete = false;
        }
    }


    public function getMinPrice(): ?float
    {

        return $this->minPrice;
    }

    public function setMinPrice(?float $minPrice): self
    {
        if (!empty($minPrice)) {
            $this->minPrice = $minPrice;

        }

        return $this;
    }

    public function getMaxPrice(): ?float
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(?float $maxPrice): self
    {
        if (!empty($maxPrice)) {
            $this->maxPrice = $maxPrice;

        }

        return $this;
    }

    public function getIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(?bool $isArchived): self
    {
        if (!empty($isArchived)) {
            $this->isArchived = $isArchived;
        }
        return $this;
    }
    public function addError(string $error): self
    {
        if (!in_array($error, $this->errors))
            $this->errors[] = $error;
        return $this;
    }

    public function getNonReadComent(): ?bool
    {
        return $this->nonReadComent;
    }

    public function setNonReadComent(?bool $nonReadComent): self
    {
        $this->nonReadComent = $nonReadComent;
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
}