<?php

namespace Service;

use Model\ModelPc;


class ModelHandler
{
    protected ?string $name = null;
    protected bool $isSubmitted = false;
    protected ?string $graphicCard = null;
    protected ?string $hardDisc = null;
    protected ?string $keyboard = null;
    protected ?string $motherBoard = null;
    protected ?string $mouseAndPad = null;
    protected ?string $powerSupply = null;
    protected ?string $processor = null;
    protected ?string $ram = null;
    protected ?string $screen = null;

    protected ?int $graphicCardQty = null;
    protected ?int $hardDiscQty = null;
    protected ?int $KeyboardQty = null;
    protected ?int $motherBoardQty = null;
    protected ?int $mouseAndPadQty = null;
    protected ?int $powerSupplyQty = null;
    protected ?int $ramQty = null;
    protected ?int $screenQty = null;
    protected ?int $ProcessorQty = null;

    protected ?array $errors = [];

    public function __construct($postData)
    {

        $complete = true;
        if (isset($postData['name'])) {
            $this->setName($postData['name']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['graphicCard'])) {
            $this->setGraphicCard($postData['graphicCard']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['graphicCardQty'])) {
            $this->setGraphicCardQty(intval($postData['graphicCardQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['motherBoard'])) {
            $this->setMotherBoard($postData['motherBoard']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['motherBoardQty'])) {
            $this->setMotherBoardQty(intval($postData['motherBoardQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['hardDisc'])) {
            $this->setHardDisc($postData['hardDisc']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['hardDiscQty'])) {
            $this->setHardDiscQty(intval($postData['hardDiscQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['keyboard'])) {
            $this->setKeyboard($postData['keyboard']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['keyboardQty'])) {
            $this->setKeyboardQty(intval($postData['keyboardQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['hardDisc'])) {
            $this->setHardDisc($postData['hardDisc']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['hardDiscQty'])) {
            $this->setHardDiscQty(intval($postData['hardDiscQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['mouseAndPad'])) {
            $this->setMouseAndPad($postData['mouseAndPad']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['mouseAndPadQty'])) {
            $this->setMouseAndPadQty(intval($postData['mouseAndPadQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['powerSupply'])) {
            $this->setPowerSupply($postData['powerSupply']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['powerSupplyQty'])) {
            $this->setPowerSupplyQty(intval($postData['powerSupplyQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['processor'])) {
            $this->setProcessor($postData['processor']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['processorQty'])) {
            $this->setProcessorQty(intval($postData['processorQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['ram'])) {
            $this->setRam($postData['ram']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['ramQty'])) {
            $this->setRamQty(intval($postData['ramQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['screen'])) {
            $this->setScreen($postData['screen']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['screenQty'])) {
            $this->setScreenQty(intval($postData['screenQty']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (!$complete) {
            $this->errors[] = "Somme field are missing";
        }

    }
    // public function fetchComponent($id, $table, $class)
    // {
    //     $sqlClass = 'SELECT * FROM Component as c 
    //         INNER JOIN ' . $table . '  AS g ON c.idComponent = g.idComponent WHERE c.idComponent=' . $id;
    //     $statementClass = $this->db->prepare($sqlClass);
    //     $statementClass->setFetchMode(PDO::FETCH_CLASS, $class);
    //     $statementClass->execute();
    //     $obj = $statementClass->fetch();
    //     $this->ModelContent[$table] = $obj;
    // }

    public function factory()
    {
        $model = new ModelPc();
        $model
            ->setName($this->name)
            ->setAddDate(date("m.d.y , G:i:s "))
            ->setQuantity(0)
            ->setIsArchived(false)
            ->setConfiguration(
                [
                    ["id" => $this->getGraphicCard(), "quantity" => $this->getGraphicCardQty()],
                    ["id" => $this->getHardDisc(), "quantity" => $this->getHardDiscQty()],
                    ["id" => $this->getKeyboard(), "quantity" => $this->getKeyboardQty()],
                    ["id" => $this->getMotherBoard(), "quantity" => $this->getMotherBoardQty()],
                    ["id" => $this->getMouseAndPad(), "quantity" => $this->getMotherBoardQty()],
                    ["id" => $this->getPowerSupply(), "quantity" => $this->getPowerSupplyQty()],
                    ["id" => $this->getProcessor(), "quantity" => $this->getProcessorQty()],
                    ["id" => $this->getRam(), "quantity" => $this->getRamQty()],
                    ["id" => $this->getScreen(), "quantity" => $this->getScreenQty()]
                ]

            );
        return $model;

    }

    public function modelIsValid()
    {
        if (!empty($this->errors)) {
            return false;
        } else {
            return true;
        }
    }

    public function createModel()
    {

    }

    public function isSubmitted()
    {
        return $this->isSubmitted;
    }

    public function getErrors(): ?array
    {
        return $this->errors;
    }

    public function setErrors(?array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        if (!empty($name)) {
            $this->name = $name;
        } else {
            $this->errors[] = "the name is missing";
        }
        return $this;
    }

    public function getGraphicCard(): ?string
    {
        return $this->graphicCard;
    }

    public function setGraphicCard(?string $graphicCard): self
    {
        if (!empty($graphicCard)) {
            $this->graphicCard = $graphicCard;
        } else {
            $this->errors[] = "the graphicCard is missing";
        }
        return $this;
    }

    public function getHardDisc(): ?string
    {
        return $this->hardDisc;
    }

    public function setHardDisc(?string $hardDisc): self
    {
        if (!empty($hardDisc)) {
            $this->hardDisc = $hardDisc;
        } else {
            $this->errors[] = "the hardDisc is missing";
        }
        return $this;
    }

    public function getKeyboard(): ?string
    {
        return $this->keyboard;
    }

    public function setKeyboard(?string $keyboard): self
    {
        if (!empty($keyboard)) {
            $this->keyboard = $keyboard;
        } else {
            $this->errors[] = "the keyboard is missing";
        }
        return $this;
    }

    public function getMotherBoard(): ?string
    {
        return $this->motherBoard;
    }

    public function setMotherBoard(?string $motherBoard): self
    {
        if (!empty($motherBoard)) {
            $this->motherBoard = $motherBoard;
        } else {
            $this->errors[] = "the motherBoard is missing";
        }
        return $this;
    }
    public function getMouseAndPad(): ?string
    {
        return $this->mouseAndPad;
    }

    public function setMouseAndPad(?string $mouseAndPad): self
    {
        if (!empty($mouseAndPad)) {
            $this->mouseAndPad = $mouseAndPad;
        } else {
            $this->errors[] = "the mouseAndPad is missing";
        }
        return $this;
    }

    public function getPowerSupply(): ?string
    {
        return $this->powerSupply;
    }

    public function setPowerSupply(?string $powerSupply): self
    {
        if (!empty($powerSupply)) {
            $this->powerSupply = $powerSupply;
        } else {
            $this->errors[] = "the powerSupply is missing";
        }
        return $this;
    }

    public function getProcessor(): ?string
    {
        return $this->processor;
    }

    public function setProcessor(?string $processor): self
    {
        if (!empty($processor)) {
            $this->processor = $processor;
        } else {
            $this->errors[] = "the processor is missing";
        }
        return $this;
    }

    public function getRam(): ?string
    {
        return $this->ram;
    }

    public function setRam(?string $ram): self
    {
        if (!empty($ram)) {
            $this->ram = $ram;
        } else {
            $this->errors[] = "the ram is missing";
        }
        return $this;
    }

    public function getScreen(): ?string
    {
        return $this->screen;
    }

    public function setScreen(?string $screen): self
    {
        if (!empty($screen)) {
            $this->screen = $screen;
        } else {
            $this->errors[] = "the screen is missing";
        }
        return $this;
    }

    public function getGraphicCardQty(): ?int
    {
        return $this->graphicCardQty;
    }

    public function setGraphicCardQty(?int $graphicCardQty): self
    {
        if (empty($graphicCardQty) || $graphicCardQty <= 0) {
            $this->errors[] = "the graphicCardQty is not valid";
        } else {
            $this->graphicCardQty = $graphicCardQty;
        }
        return $this;
    }
    public function getHardDiscQty(): ?int
    {
        return $this->hardDiscQty;
    }

    public function setHardDiscQty(?int $hardDiscQty): self
    {
        if (empty($hardDiscQty) || $hardDiscQty <= 0) {
            $this->errors[] = "the hardDiscQty is not valid";
        } else {
            $this->hardDiscQty = $hardDiscQty;
        }
        return $this;
    }

    public function getKeyboardQty(): ?int
    {
        return $this->KeyboardQty;
    }

    public function setKeyboardQty(?int $KeyboardQty): self
    {
        if (empty($KeyboardQty) || $KeyboardQty <= 0) {
            $this->errors[] = "the KeyboardQty is not valid";
        } else {
            $this->KeyboardQty = $KeyboardQty;
        }
        return $this;
    }

    public function getMotherBoardQty(): ?int
    {
        return $this->motherBoardQty;
    }

    public function setMotherBoardQty(?int $motherBoardQty): self
    {
        if (empty($motherBoardQty) || $motherBoardQty <= 0) {
            $this->errors[] = "the motherBoardQty is not valid";
        } else {
            $this->motherBoardQty = $motherBoardQty;
        }
        return $this;
    }

    public function getMouseAndPadQty(): ?int
    {
        return $this->mouseAndPadQty;
    }

    public function setMouseAndPadQty(?int $mouseAndPadQty): self
    {
        if (empty($mouseAndPadQty) || $mouseAndPadQty <= 0) {
            $this->errors[] = "the mouseAndPadQty is not valid";
        } else {
            $this->mouseAndPadQty = $mouseAndPadQty;
        }
        return $this;
    }

    public function getPowerSupplyQty(): ?int
    {
        return $this->powerSupplyQty;
    }

    public function setPowerSupplyQty(?int $powerSupplyQty): self
    {
        if (empty($powerSupplyQty) || $powerSupplyQty <= 0) {
            $this->errors[] = "the powerSupplyQty is not valid";
        } else {
            $this->powerSupplyQty = $powerSupplyQty;
        }
        return $this;
    }
    public function getRamQty(): ?int
    {
        return $this->ramQty;
    }

    public function setRamQty(?int $ramQty): self
    {
        if (empty($ramQty) || $ramQty <= 0) {
            $this->errors[] = "the ramQty is not valid";
        } else {
            $this->ramQty = $ramQty;
        }
        return $this;
    }

    public function getScreenQty(): ?int
    {
        return $this->screenQty;
    }

    public function setScreenQty(?int $screenQty): self
    {
        if (empty($screenQty) || $screenQty <= 0) {
            $this->errors[] = "the screenQty is not valid";
        } else {
            $this->screenQty = $screenQty;
        }
        return $this;
    }

    /**
     * @return 
     */
    public function getProcessorQty(): ?int
    {
        return $this->ProcessorQty;
    }

    /**
     * @param  $ProcessorQty 
     * @return self
     */
    public function setProcessorQty(?int $ProcessorQty): self
    {
        if (empty($ProcessorQty) || $ProcessorQty <= 0) {
            $this->errors[] = "the ProcessorQty is not valid";
        } else {
            $this->ProcessorQty = $ProcessorQty;
        }
        return $this;
    }
}