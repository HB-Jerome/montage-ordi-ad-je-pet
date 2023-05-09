<?php

namespace Service;

use Model\Model;
use Model\GraphicCard;
use Model\HardDisc;
use Model\Keyboard;
use Model\ModelPc;
use Model\MouseAndPad;
use Model\PowerSupply;
use Model\Processor;
use Model\Ram;
use Model\Screen;
use Model\MotherBoard;
use PDO;


class ModelHandler
{

    protected $db;
    protected ?string $name = null;
    protected ?array $ModelContent = [];



    protected ?array $errors = [];



    public function __construct($postData, $db)
    {
        $this->db = $db;

        if (isset($postData['name'])) {
            if (!empty($postData['name'])) {
                $this->setName($postData['name']);
            } else {
                $this->errors[] = "the name is missing";
            }
        }
        if (isset($postData['GraphicCard'])) {
            if (!empty($postData['GraphicCard'])) {
                $this->fetchComponent($postData['GraphicCard'], "GraphicCard", GraphicCard::class);
            } else {
                $this->errors[] = "the Graphic Card is missing";
            }
        }

        if (isset($postData['HardDisc'])) {
            if (!empty($postData['HardDisc'])) {
                $this->fetchComponent($postData['HardDisc'], "HardDisc", HardDisc::class);
            } else {
                $this->errors[] = "the Hard Disc est manquant";
            }
        }
        if (isset($postData['Keyboard'])) {
            if (!empty($postData['Keyboard'])) {
                $this->fetchComponent($postData['Keyboard'], 'Keyboard', Keyboard::class);
            } else {
                $this->errors[] = "the Keyboard is missing";
            }
        }

        if (isset($postData['HardDisc'])) {
            if (!empty($postData['MotherBoard'])) {
                $this->fetchComponent($postData['MotherBoard'], "MotherBoard", MotherBoard::class);
            } else {
                $this->errors[] = "the MotherBoard is missing";
            }
        }

        if (isset($postData['MouseAndPad'])) {
            if (!empty($postData['MouseAndPad'])) {
                $this->fetchComponent($postData['MouseAndPad'], "MouseAndPad", MouseAndPad::class);
            } else {
                $this->errors[] = "the Mouse And Pad are missing";
            }
        }

        if (isset($postData['PowerSupply'])) {
            if (!empty($postData['PowerSupply'])) {
                $this->fetchComponent($postData['PowerSupply'], "PowerSupply", PowerSupply::class);
            } else {
                $this->errors[] = "the PowerSupply is missing";
            }
        }
        if (isset($postData['Processor'])) {
            if (!empty($postData['Processor'])) {
                $this->fetchComponent($postData['Processor'], "Processor", Processor::class);
            } else {
                $this->errors[] = "the Processor is missing";
            }
        }
        if (isset($postData['Ram'])) {
            if (!empty($postData['Ram'])) {
                $this->fetchComponent($postData['Ram'], "Ram", Ram::class);
            } else {
                $this->errors[] = "the Ram is missing";
            }
        }
        if (isset($postData['Ram'])) {
            if (!empty($postData['Screen'])) {
                $this->fetchComponent($postData['Screen'], "Screen", Screen::class);
            } else {
                $this->errors[] = "the Screen is missing";
            }
        }

    }
    public function fetchComponent($id, $table, $class)
    {
        $sqlClass = 'SELECT * FROM Component as c 
            INNER JOIN ' . $table . '  AS g ON c.idComponent = g.idComponent WHERE c.idComponent=' . $id;
        $statementClass = $this->db->prepare($sqlClass);
        $statementClass->setFetchMode(PDO::FETCH_CLASS, $class);
        $statementClass->execute();
        $obj = $statementClass->fetch();
        $this->ModelContent[] = $obj;
    }

    public function factory()
    {
        $model = new ModelPc();
        $model
            ->setName($this->name)
            ->setPrice($this->getTotalPrice())
            ->setAddDate(date("m.d.y , G:i:s "))
            ->setPcNumber(0)
            ->setQuantity($this->minQuantity())
            ->setIsArchived(false)
            ->setConfiguration($this->ModelContent);
        return $model;

    }

    public function modelIsValid()
    {
        if (!empty($this->errors)) {
            return false;
        } else {
            return ($this->AreAvailable() && $this->typesAreValid() && empty($this->errors));
        }


    }
    public function AreAvailable()
    {
        $components = $this->getModelContent();
        foreach ($components as $component) {
            if ($component->getQuantity() <= 0) {
                return false;
            }
        }
        return true;

    }

    public function minQuantity()
    {
        $components = $this->getModelContent();
        $minQuantity = $components[0]->getQuantity();
        foreach ($components as $component) {
            $minQuantity = min($minQuantity, $component->getQuantity());
        }
        return $minQuantity;
    }

    public function typesAreValid()
    {
        $components = $this->getModelContent();
        $type = $components[0]->getPcType();
        foreach ($components as $component) {
            if (!$component->getPcType() == $type) {
                return false;
            }
        }
        return true;

    }
    public function isSubmitted()
    {
        if (!empty($this->ModelContent) || !empty($this->name) || !empty($this->errors)) {
            return true;
        } else {
            return false;
        }

    }

    public function getTotalPrice(): float
    {
        $components = $this->getModelContent();
        $total = 0;
        foreach ($components as $component) {
            $total += $component->getPrice();
        }
        return $total;
    }

    public function getModelContent(): array
    {
        return $this->ModelContent;
    }

    public function setModelContent(array $ModelContent): self
    {
        $this->ModelContent = $ModelContent;
        return $this;
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


    /**
     * @return 
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param  $name 
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }
}