<?php
namespace Service;

use PDO;
use Model\Component;

class ComponentFactory
{
    public function create(array $assocArray)
    {
        $category = $assocArray['category'];
        $class = Component::AVAILABLE_CLASSES[$category];
        $component = new $class();
        $component
            ->setName($assocArray['name'])
            ->setIdComponent($assocArray['idComponent'])
            ->setBrand($assocArray['brand'])
            ->setDescription($assocArray['description'])
            ->setPrice($assocArray['price'])
            ->setComponentType($assocArray['componentType'])
            ->setIsArchived($assocArray['isArchived'])
            ->setQuantity($assocArray['quantity'])
            ->setCategory($assocArray['category']);

        switch ($category) {
            case (Component::GRAPHIC_CARD):
                $component->setChipset($assocArray['chipset'])
                    ->setMemory($assocArray['memory']);
                break;
            case (Component::HARD_DISC):
                $component->setDiscCapacity($assocArray['discCapacity'])
                    ->setSsd($assocArray['ssd']);
                break;
            case (Component::KEYBOARD):
                $component->setKeybordIsWireless($assocArray['keybordIsWireless'])
                    ->setWithPad($assocArray['withPad'])
                    ->setKeyType($assocArray['keyType']);
                break;
            case (Component::MOTHER_BOARD):
                $component->setSocket($assocArray['socket'])
                    ->setFormat($assocArray['format']);
                break;
            case (Component::MOUSE_AND_PAD):
                $component->setMouseIsWireless($assocArray['mouseIsWireless'])
                    ->setNumberOfKey($assocArray['numberOfKey']);
                break;
            case (Component::POWER_SUPPLY):
                $component->setBatteryPower($assocArray['batteryPower']);

                break;
            case (Component::PROCESSOR):
                $component->setCoreNumber($assocArray['coreNumber'])
                    ->setCompatibleChipset($assocArray['compatibleChipset'])
                    ->setCpuFrequency($assocArray['cpuFrequency']);
                break;
            case (Component::RAM):
                $component->setRamCapacity($assocArray['ramCapacity'])
                    ->setNumberOfBars($assocArray['numberOfBars'])
                    ->setDetail($assocArray['detail']);
                break;
            case (Component::SCREEN):
                $component->setSize($assocArray['size']);
                break;
        }
        return $component;

    }
}