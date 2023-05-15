<?php
namespace Service;

use Model\ModelPc;
use Model\Component;
use PDO;

class ModelHandler
{
    protected ?int $idModel = null;
    protected ?string $name = null;
    protected ?int $modelQuantity = null;
    protected ?string $descriptionModel = null;
    protected ?array $configuration = [];
    protected ?string $modelType = null;
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

    public function handleGet($getData, $db)
    {
        if (isset($getData['idModel'])) {
            $this->idModel = $getData['idModel'];
            $model = $this->fetchModel($this->idModel, $db);
            if (!empty($model)) {
                $this->name = $model->getName();
                $this->descriptionModel = $model->getDescriptionModel();
                $this->name = $model->getName();
                $this->name = $model->getName();


            }
        }
    }
    protected function fetchModel($idModel, $db)
    {
        $sqlModel = 'SELECT * FROM ModelPc WHERE idModel= :idModel';
        $statement = $db->prepare($sqlModel);
        $statement->setFetchMode(PDO::FETCH_CLASS, ModelPc::class);
        $statement->execute();
        $model = $statement->fetch();
        return $model;
    }


    public function handlePost($postData)
    {
        $complete = true;
        if (isset($postData['name'])) {
            $this->setName($postData['name']);
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['modelQuantity'])) {
            $this->setModelQuantity(intval($postData['modelQuantity']));
            $this->isSubmitted = true;
        } else {
            $complete = false;
        }
        if (isset($postData['description'])) {
            $this->setDescriptionModel($postData['description']);
            $this->isSubmitted = true;
        }
        if (isset($postData['Modeltype'])) {
            $this->setModelType($postData['Modeltype']);
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
    public function setConfiguration(): self
    {
        $this->configuration = [
            "GraphicCard" => ["id" => $this->getGraphicCard(), "quantity" => $this->getGraphicCardQty()],
            "HardDisc" => ["id" => $this->getHardDisc(), "quantity" => $this->getHardDiscQty()],
            "Keyboard" => ["id" => $this->getKeyboard(), "quantity" => $this->getKeyboardQty()],
            "MotherBoard" => ["id" => $this->getMotherBoard(), "quantity" => $this->getMotherBoardQty()],
            "MouseAndPad" => ["id" => $this->getMouseAndPad(), "quantity" => $this->getMouseAndPad()],
            "PowerSupply" => ["id" => $this->getPowerSupply(), "quantity" => $this->getPowerSupplyQty()],
            "Ram" => ["id" => $this->getRam(), "quantity" => $this->getRamQty()],
            "Processor" => ["id" => $this->getProcessor(), "quantity" => $this->getProcessorQty()],
            "Screen" => ["id" => $this->getScreen(), "quantity" => $this->getScreenQty()],
        ];
        return $this;
    }
    public function factory()
    {
        $model = new ModelPc();
        $model
            ->setName($this->name)
            ->setAddDate(date("y/m/d H:i"))
            ->setModelQuantity($this->modelQuantity)
            ->setDescriptionModel($this->getDescriptionModel())
            ->setModelType($this->modelType)
            ->setIsArchived(false);
        return $model;
    }
    public function postIsValid()
    {
        if (!empty($this->errors)) {
            return false;
        } else {
            $this->setConfiguration();
            return true;
        }
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
    public function addError(string $error): self
    {
        if (!in_array($error, $this->errors))
            $this->errors[] = $error;
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
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
            $this->addError("Tous les composants doivent être selectionnés");
        }
        return $this;
    }
    public function getGraphicCardQty(): ?int
    {
        return $this->graphicCardQty;
    }
    public function setGraphicCardQty(?int $graphicCardQty): self
    {
        if (empty($graphicCardQty) || $graphicCardQty != 1) {
            $this->errors[] = "the graphicCard Qty must be 1";
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
        if (empty($hardDiscQty) || $hardDiscQty < 1) {
            $this->errors[] = "the hardDisc Qty must be > 1";
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
        if (empty($KeyboardQty) || $KeyboardQty != 1) {
            $this->errors[] = "the Keyboard Qty must be 1";
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
        if (empty($motherBoardQty) || $motherBoardQty != 1) {
            $this->errors[] = "the motherBoard Qty must be 1";
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
        if (empty($mouseAndPadQty) || $mouseAndPadQty != 1) {
            $this->errors[] = "the mouseAndPad Qty must be 1";
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
        if (empty($powerSupplyQty) || $powerSupplyQty != 1) {
            $this->errors[] = "the powerSupply Qty must be 1";
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
        if (empty($ramQty) || $ramQty < 1) {
            $this->errors[] = "the ram Qty must be > 1";
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
        if (empty($screenQty) || $screenQty < 1) {
            $this->errors[] = "the screenQty is not valid";
        } else {
            $this->screenQty = $screenQty;
        }
        return $this;
    }
    public function setProcessorQty(?int $ProcessorQty): self
    {
        if (empty($ProcessorQty) || $ProcessorQty != 1) {
            $this->errors[] = "the Processor Qty must be 1";
        } else {
            $this->ProcessorQty = $ProcessorQty;
        }
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
    public function getModelType()
    {
        return $this->modelType;
    }
    public function setModelType($modelType): self
    {
        if (!in_array($modelType, Component::TYPES)) {
            $this->errors[] = "Type invalid";
        } else {
            $this->modelType = $modelType;
        }

        return $this;
    }
    public function getProcessorQty(): ?int
    {
        return $this->ProcessorQty;
    }
    public function getConfiguration(): ?array
    {
        return $this->configuration;
    }

    /**
     * @return 
     */
    public function getModelQuantity(): ?int
    {
        return $this->modelQuantity;
    }

    /**
     * @param  $modelQuantity 
     * @return self
     */
    public function setModelQuantity(?int $modelQuantity): self
    {
        $this->modelQuantity = $modelQuantity;
        return $this;
    }
}