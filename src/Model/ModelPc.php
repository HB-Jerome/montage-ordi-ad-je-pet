<?php

namespace Model;

use Model\Component;
use Model\GraphicCard;
use Model\HardDisc;
use Model\Keyboard;
use Model\MotherBoard;
use Model\MouseAndPad;
use Model\PowerSupply;
use Model\Processor;
use Model\Ram;
use Model\Screen;


class ModelPc
{
    protected ?int $idModel;
    protected string $name;
    protected ?string $descriptionModel;
    protected int $modelQuantity;
    protected string $modelType;
    protected int $pcNumber;
    protected float $price;
    protected $addDate;
    protected bool $isArchived;
    // protected ?GraphicCard $graphicCard = null;
    // protected ?HardDisc $hardDisc = null;
    // protected ?Keyboard $keyboard = null;
    // protected ?MotherBoard $motherBoard = null;
    // protected ?MouseAndPad $mouseAndPad = null;
    // protected ?PowerSupply $powerSupply = null;
    // protected ?Processor $processor = null;
    // protected ?Ram $ram = null;
    // protected ?Screen $screen = null;
    // protected ?int $graphicCardQty = null;
    // protected ?int $hardDiscQty = null;
    // protected ?int $KeyboardQty = null;
    // protected ?int $motherBoardQty = null;
    // protected ?int $mouseAndPadQty = null;
    // protected ?int $powerSupplyQty = null;
    // protected ?int $ramQty = null;
    // protected ?int $screenQty = null;
    // protected ?int $ProcessorQty = null;

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


    // public function getGraphicCard(): ?GraphicCard
// {
//     return $this->graphicCard;
// }

    // public function setGraphicCard(?GraphicCard $graphicCard): self
// {
//     $this->graphicCard = $graphicCard;
//     return $this;
// }

    // public function getHardDisc(): ?HardDisc
// {
//     return $this->hardDisc;
// }

    // public function setHardDisc(?HardDisc $hardDisc): self
// {
//     $this->hardDisc = $hardDisc;
//     return $this;
// }


    // public function getKeyboard(): ?Keyboard
// {
//     return $this->keyboard;
// }


    // public function setKeyboard(?Keyboard $keyboard): self
// {
//     $this->keyboard = $keyboard;
//     return $this;
// }
// public function getMotherBoard(): ?MotherBoard
// {
//     return $this->motherBoard;
// }

    // public function setMotherBoard(?MotherBoard $motherBoard): self
// {
//     $this->motherBoard = $motherBoard;
//     return $this;
// }

    // public function getMouseAndPad(): ?MouseAndPad
// {
//     return $this->mouseAndPad;
// }
// public function setMouseAndPad(?MouseAndPad $mouseAndPad): self
// {
//     $this->mouseAndPad = $mouseAndPad;
//     return $this;
// }
// public function getPowerSupply(): ?PowerSupply
// {
//     return $this->powerSupply;
// }

    // public function setPowerSupply(?PowerSupply $powerSupply): self
// {
//     $this->powerSupply = $powerSupply;
//     return $this;
// }

    // public function getProcessor(): ?Processor
// {
//     return $this->processor;
// }
// public function setProcessor(?Processor $processor): self
// {
//     $this->processor = $processor;
//     return $this;
// }
// public function getRam(): ?Ram
// {
//     return $this->ram;
// }

    // public function setRam(?Ram $ram): self
// {
//     $this->ram = $ram;
//     return $this;
// }

    // public function getScreen(): ?Screen
// {
//     return $this->screen;
// }

    // public function setScreen(?Screen $screen): self
// {
//     $this->screen = $screen;
//     return $this;
// }

    // /**
//  * @return 
//  */
// public function getGraphicCardQty(): ?int
// {
//     return $this->graphicCardQty;
// }
// public function setGraphicCardQty(?int $graphicCardQty): self
// {
//     $this->graphicCardQty = $graphicCardQty;
//     return $this;
// }

    // public function getHardDiscQty(): ?int
// {
//     return $this->hardDiscQty;
// }


    // public function setHardDiscQty(?int $hardDiscQty): self
// {
//     $this->hardDiscQty = $hardDiscQty;
//     return $this;
// }
// public function getKeyboardQty(): ?int
// {
//     return $this->KeyboardQty;
// }

    // public function setKeyboardQty(?int $KeyboardQty): self
// {
//     $this->KeyboardQty = $KeyboardQty;
//     return $this;
// }

    // public function getMotherBoardQty(): ?int
// {
//     return $this->motherBoardQty;
// }

    // public function setMotherBoardQty(?int $motherBoardQty): self
// {
//     $this->motherBoardQty = $motherBoardQty;
//     return $this;
// }

    // public function getMouseAndPadQty(): ?int
// {
//     return $this->mouseAndPadQty;
// }

    // public function setMouseAndPadQty(?int $mouseAndPadQty): self
// {
//     $this->mouseAndPadQty = $mouseAndPadQty;
//     return $this;
// }

    // public function getPowerSupplyQty(): ?int
// {
//     return $this->powerSupplyQty;
// }

    // public function setPowerSupplyQty(?int $powerSupplyQty): self
// {
//     $this->powerSupplyQty = $powerSupplyQty;
//     return $this;
// }

    // public function getRamQty(): ?int
// {
//     return $this->ramQty;
// }

    // public function setRamQty(?int $ramQty): self
// {
//     $this->ramQty = $ramQty;
//     return $this;
// }

    // public function getScreenQty(): ?int
// {
//     return $this->screenQty;
// }

    // public function setScreenQty(?int $screenQty): self
// {
//     $this->screenQty = $screenQty;
//     return $this;
// }

    // public function getProcessorQty(): ?int
// {
//     return $this->ProcessorQty;
// }

    // public function setProcessorQty(?int $ProcessorQty): self
// {
//     $this->ProcessorQty = $ProcessorQty;
//     return $this;
// }



    /**
     * @return 
     */
    public function getModelQuantity(): int
    {
        return $this->modelQuantity;
    }

    /**
     * @param  $modelQuantity 
     * @return self
     */
    public function setModelQuantity(int $modelQuantity): self
    {
        $this->modelQuantity = $modelQuantity;
        return $this;
    }
}