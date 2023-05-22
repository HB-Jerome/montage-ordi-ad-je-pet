<?php

namespace Controller;

use Model\Component;

class CreationComponentController extends AbstractController
{
    protected bool $postIsSubmited = false;
    protected bool $postIsValid = true;
    protected bool $postIsComplete = true;

    public function getContent(): array
    {
        $availlablesCategories = Component::AVAILABLE_CATEGORIES;
        $componentsTypes = Component::TYPES;

        if (isset($_POST['category']) && !empty($_POST['category'])) {
            $class = Component::AVAILABLE_CLASSES[$_POST['category']];
            $component = new $class();
        } else {
            $component = new Component();
        }


        $this->handlePost($_POST, $component);

        if ($this->postIsSubmited && $this->postIsValid && $this->postIsComplete) {
            // $component = $this->createComponent();
            $this->insertInBdd($component);
        }

        return ["availlablesCategories" => $availlablesCategories, "componentsTypes" => $componentsTypes, "errors" => $this->errors, "component" => $component];
    }

    public function getFileName(): string
    {
        return 'creationComponent';
    }

    public function getPageTitle(): string
    {
        return 'Ajouter un composant !';
    }

    public function handlePost(?array $postData, Component $component)
    {
        if ($this->verifieSinglePostdata("name", $postData)) {
            $component->setName($postData['name']);
        }
        if ($this->verifieSinglePostdata("brand", $postData)) {
            $component->setBrand($postData['brand']);
        }
        if ($this->verifieSinglePostdata("description", $postData)) {
            $component->setDescription($postData['description']);
        }
        if ($this->verifieSinglePostdata("price", $postData)) {
            $component->setPrice($postData['price']);
        }
        if ($this->verifieSinglePostdata("componentType", $postData)) {
            $component->setComponentType($postData['componentType']);
        }
        if ($this->verifieSinglePostdata("category", $postData)) {
            $component->setCategory($postData['category']);
        }

        if (!empty($component->getCategory())) {
            $category = $component->getCategory();

            switch ($category) {
                case (Component::GRAPHIC_CARD):
                    if ($this->verifieSinglePostdata("chipset", $postData)) {
                        $component->setChipset($postData['chipset']);
                    }

                    if ($this->verifieSinglePostdata("memory", $postData)) {
                        $component->setMemory($postData['memory']);
                    }

                    break;
                case (Component::HARD_DISC):
                    if ($this->verifieSinglePostdata("discCapacity", $postData)) {
                        $component->setDiscCapacity($postData['discCapacity']);
                    }
                    if ($this->verifieSinglePostdata("ssd", $postData)) {
                        $component->setSsd($postData['ssd']);
                    }
                    break;
                case (Component::KEYBOARD):
                    if ($this->verifieSinglePostdata("keybordIsWireless", $postData)) {
                        $component->setKeybordIsWireless($postData['keybordIsWireless']);
                    }
                    if ($this->verifieSinglePostdata("withPad", $postData)) {
                        $component->setWithPad($postData['withPad']);
                    }
                    if ($this->verifieSinglePostdata("keyType", $postData)) {
                        $component->setkeyType($postData['keyType']);
                    }
                    break;
                case (Component::MOTHER_BOARD):
                    if ($this->verifieSinglePostdata("socket", $postData)) {
                        $component->setSocket($postData['socket']);
                    }
                    if ($this->verifieSinglePostdata("format", $postData)) {
                        $component->setFormat($postData['format']);
                    }

                    break;
                case (Component::MOUSE_AND_PAD):
                    if ($this->verifieSinglePostdata("mouseIsWireless", $postData)) {
                        $component->setMouseIsWireless($postData['mouseIsWireless']);
                    }
                    if ($this->verifieSinglePostdata("numberOfKey", $postData)) {
                        $component->setNumberOfKey($postData['numberOfKey']);
                    }

                    break;
                case (Component::POWER_SUPPLY):
                    if ($this->verifieSinglePostdata("batteryPower", $postData)) {
                        $component->setBatteryPower($postData['batteryPower']);
                    }

                    break;
                case (Component::PROCESSOR):
                    if ($this->verifieSinglePostdata("coreNumber", $postData)) {
                        $component->setCoreNumber($postData['coreNumber']);
                    }
                    if ($this->verifieSinglePostdata("compatibleChipset", $postData)) {
                        $component->setCompatibleChipset($postData['compatibleChipset']);
                    }
                    if ($this->verifieSinglePostdata("cpuFrequency", $postData)) {
                        $component->setCpuFrequency($postData['cpuFrequency']);
                    }

                    break;
                case (Component::RAM):
                    if ($this->verifieSinglePostdata("ramCapacity", $postData)) {
                        $component->setRamCapacity($postData['ramCapacity']);
                    }
                    if ($this->verifieSinglePostdata("numberOfBars", $postData)) {
                        $component->setNumberOfBars($postData['numberOfBars']);
                    }
                    if ($this->verifieSinglePostdata("detail", $postData)) {
                        $component->setDetail($postData['detail']);
                    }

                    break;
                case (Component::SCREEN):
                    if ($this->verifieSinglePostdata("size", $postData)) {
                        $component->setSize($postData['size']);
                    }
                    break;
            }
        }
    }
    function verifieSinglePostdata($key, $postData)
    {
        if (isset($postData[$key])) {
            $this->postIsSubmited = true;
            if (empty($postData[$key]) && ($postData[$key] != 0)) {
                $this->errors[] = "The " . $key . " cannot be empty";
                $this->postIsValid = false;
                return false;
            }
            return true;
        } else {
            $this->postIsComplete = false;
            return false;
        }
    }

    public function insertInBdd($component)
    {
        $sql = 'INSERT INTO Component (name,brand,description,category,quantity,price,componentType)  VALUES (:name,:brand,:description,:category,0,:price,:componentType)';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":name", $component->getName());
        $statement->bindValue(":brand", $component->getBrand());
        $statement->bindValue(":description", $component->getDescription());
        $statement->bindValue(":category", $component->getCategory());
        $statement->bindValue(":price", $component->getPrice());
        $statement->bindValue(":componentType", $component->getComponentType());
        $statement->execute();

        $idComponent = $this->db->lastInsertId();

        $category = $component->getCategory();
        switch ($category) {
            case (Component::GRAPHIC_CARD):
                $chipset = $component->getChipset();
                $memory = $component->getMemory();

                $sqlCat = "INSERT INTO $category
                        ( chipset, memory,idComponent) VALUES (:chipset,:memory,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':chipset', $chipset);
                $statementCat->bindValue(':memory', $memory);
                $statementCat->execute();
                break;

            case (Component::HARD_DISC):
                $discCapacity = $component->getDiscCapacity();
                $ssd = $component->getSsd();

                $sqlCat = "INSERT INTO $category
                        (discCapacity,ssd,idComponent) VALUES (:discCapacity,:ssd,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':discCapacity', $discCapacity);
                $statementCat->bindValue(':ssd', $ssd);
                $statementCat->execute();
                break;

            case (Component::KEYBOARD):

                $keybordIsWireless = $component->getKeybordIsWireless();
                $withPad = $component->getWithPad();
                $keyType = $component->getKeyType();

                $sqlCat = "INSERT INTO $category
                    (keybordIsWireless, withPad,keyType,idComponent) VALUES (:keybordIsWireless,:withPad,:keyType,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':keybordIsWireless', $keybordIsWireless);
                $statementCat->bindValue(':withPad', $withPad);
                $statementCat->bindValue(':keyType', $keyType);
                $statementCat->execute();
                break;

            case (Component::MOTHER_BOARD):
                $socket = $component->getSocket();
                $format = $component->getFormat();

                $sqlCat = "INSERT INTO $category
                    (socket,format,idComponent) VALUES (:socket,:format,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':socket', $socket);
                $statementCat->bindValue(':format', $format);
                $statementCat->execute();
                break;

            case (Component::MOUSE_AND_PAD):
                $mouseIsWireless = $component->getMouseIsWireless();
                $numberOfKey = $component->getNumberOfKey();

                $sqlCat = "INSERT INTO $category
                        (mouseIsWireless, numberOfKey,idComponent) VALUES (:mouseIsWireless,:numberOfKey,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':mouseIsWireless', $mouseIsWireless);
                $statementCat->bindValue(':numberOfKey', $numberOfKey);
                $statementCat->execute();
                break;

            case (Component::POWER_SUPPLY):
                $batteryPower = $component->getBatteryPower();

                $sqlCat = "INSERT INTO $category
                        (batteryPower,idComponent) VALUES (:batteryPower,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':batteryPower', $batteryPower);
                $statementCat->execute();
                break;

            case (Component::PROCESSOR):
                $coreNumber = $component->getCoreNumber();
                $compatibleChipset = $component->getCompatibleChipset();
                $cpuFrequency = $component->getCpuFrequency();

                $sqlCat = "INSERT INTO $category
                        (coreNumber, compatibleChipset, cpuFrequency,idComponent) VALUES (:coreNumber,:compatibleChipset,:cpuFrequency,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':coreNumber', $coreNumber);
                $statementCat->bindValue(':compatibleChipset', $compatibleChipset);
                $statementCat->bindValue(':cpuFrequency', $cpuFrequency);
                $statementCat->execute();
                break;

            case (Component::RAM):
                $ramCapacity = $component->getRamCapacity();
                $numberOfBars = $component->getNumberOfBars();
                $detail = $component->getDetail();

                $sqlCat = "INSERT INTO $category
                        (ramCapacity, numberOfBars, detail, idComponent ) VALUES (:ramCapacity,:numberOfBars,:detail,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':ramCapacity', $ramCapacity);
                $statementCat->bindValue(':numberOfBars', $numberOfBars);
                $statementCat->bindValue(':detail', $detail);
                $statementCat->execute();
                break;

            case (Component::SCREEN):
                $size = $detail = $component->getSize();

                $sqlCat = "INSERT INTO $category
                        (size, idComponent) VALUES (:size,:idComponent)";

                $statementCat = $this->db->prepare($sqlCat);
                $statementCat->bindValue(':idComponent', $idComponent);
                $statementCat->bindValue(':size', $size);
                $statementCat->execute();
                break;
        }
    }
}