<?php

namespace Model;

class HistoryComponent
{

    protected int $idStockHistory;
    protected $modificationDate;
    protected int $quantity;
    protected int $addedRemoved;
    protected int $idComponent;

    public function getIdStockHistory(): int
    {
        return $this->idStockHistory;
    }

    public function setIdStockHistory(int $idStockHistory): self
    {
        $this->idStockHistory = $idStockHistory;
        return $this;
    }

    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    public function setModificationDate($modificationDate): self
    {
        $this->modificationDate = $modificationDate;
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

    public function getAddedRemoved(): int
    {
        return $this->addedRemoved;
    }

    public function setAddedRemoved(int $addedRemoved): self
    {
        $this->addedRemoved = $addedRemoved;
        return $this;
    }

    public function getIdComponent(): int
    {
        return $this->idComponent;
    }

    public function setIdComponent(int $idComponent): self
    {
        $this->idComponent = $idComponent;
        return $this;
    }
}