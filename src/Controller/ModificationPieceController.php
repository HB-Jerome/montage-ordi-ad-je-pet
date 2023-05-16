<?php

namespace Controller;

use PDO;

class ModificationPieceController extends AbstractController
{
    public function getContent(): array
    {
        $updateResult = null;
        $category = null;
        // WE get the category from the url button 
        if (isset($_GET['idComponent']) && isset($_GET['category'])) // URL from modify button
        
        {
            $idPost = $_GET['idComponent']; // the value of URL from modify button is initialised to take the new values from the form $_POST
            $category = $_GET['category']; // FETCHED from listPiece.php "catResults" => Component::AVAILABLE_CATEGORIES,

            if (isset($_POST['name']) && isset($_POST['brand']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['componentType'])) {
                
                $brand = $_POST['brand']; // the value of URL from modify button is initialised to take the new values from the form $_POST
                $name = $_POST['name'];
                $name = $_POST['brand'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $componentType = $_POST['componentType'];

                $sqlComponent = "UPDATE component
                        SET name = :name, brand = :brand, description = :description, price = :price, componentType = :componentType
                        WHERE component.idComponent = :idComponent";

                $statementComponent = $this->db->prepare($sqlComponent);
                $statementComponent->bindValue(':idComponent', $idPost);
                $statementComponent->bindValue(':name', $name);
                $statementComponent->bindValue(':brand', $brand);
                $statementComponent->bindValue(':description', $description);
                $statementComponent->bindValue(':price', $price);
                $statementComponent->bindValue(':componentType', $componentType);
                $statementComponent->execute();

                switch ($category) {
                    case 'graphicCard':
                        $chipset = $_POST['chipset'];
                        $memory = $_POST['memory'];

                        $sqlCat = "UPDATE $category
                                SET chipset = :chipset, memory = :memory
                                WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':chipset', $chipset);
                                $statementCat->bindValue(':memory', $memory);
                                $statementCat->execute();
                        break;

                    case 'hardDisc':
                        $discCapacity = $_POST['discCapacity'];
                        $ssd = $_POST['ssd'];

                        $sqlCat = "UPDATE $category
                                SET discCapacity = :discCapacity, ssd = :ssd
                                WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':discCapacity', $discCapacity);
                                $statementCat->bindValue(':ssd', $ssd);
                                $statementCat->execute();
                        break;

                    case 'keyBoard':
                        
                        $keybordIsWireless = $_POST['keybordIsWireless'];
                        $withPad = $_POST['withPad'];
                        $keyType = $_POST['keyType'];

                        $sqlCat = "UPDATE $category
                            SET keybordIsWireless = :keybordIsWireless, withPad = :withPad, keyType = :keyType
                            WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':keybordIsWireless', $keybordIsWireless);
                                $statementCat->bindValue(':withPad', $withPad);
                                $statementCat->bindValue(':keyType', $keyType);
                                $statementCat->execute();
                        break;

                    case 'motherBoard':
                        $socket = $_POST['socket'];
                        $format = $_POST['format'];

                        $sqlCat = "UPDATE $category
                            SET socket = :socket, format = :format
                            WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':socket', $socket);
                                $statementCat->bindValue(':format', $format);
                                $statementCat->execute();
                        break;

                    case 'mouseAndPad':
                        $mouseIsWireless = $_POST['mouseIsWireless'];
                        $numberOfKey = $_POST['numberOfKey'];

                        $sqlCat = "UPDATE $category
                                SET mouseIsWireless = :mouseIsWireless, numberOfKey = :numberOfKey
                                WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':mouseIsWireless', $mouseIsWireless);
                                $statementCat->bindValue(':numberOfKey', $numberOfKey);
                                $statementCat->execute();
                        break;

                    case 'powerSupply':
                        $batteryPower = $_POST['batteryPower'];

                        $sqlCat = "UPDATE $category
                                SET batteryPower = :batteryPower
                                WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':batteryPower', $batteryPower);
                                $statementCat->execute();
                        break;

                    case 'processor':
                        $coreNumber = $_POST['coreNumber'];
                        $compatibleChipset = $_POST['compatibleChipset'];
                        $cpuFrequency = $_POST['cpuFrequency'];

                        $sqlCat = "UPDATE $category
                                SET coreNumber = :coreNumber, compatibleChipset = :compatibleChipset, cpuFrequency = :cpuFrequency
                                WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':coreNumber', $coreNumber);
                                $statementCat->bindValue(':compatibleChipset', $compatibleChipset);
                                $statementCat->bindValue(':cpuFrequency', $cpuFrequency);
                                $statementCat->execute();
                        break;

                    case 'ram':
                        $ramCapacity = $_POST['ramCapacity'];
                        $numberOfBars = $_POST['numberOfBars'];
                        $detail = $_POST['detail'];

                        $sqlCat = "UPDATE $category
                                SET ramCapacity = :ramCapacity, numberOfBars = :numberOfBars, detail = :detail
                                WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':ramCapacity', $ramCapacity);
                                $statementCat->bindValue(':numberOfBars', $numberOfBars);
                                $statementCat->bindValue(':detail', $detail);
                                $statementCat->execute();
                        break;

                    case 'screen':
                        $size = $_POST['size'];

                        $sqlCat = "UPDATE $category
                                SET size = :size
                                WHERE $category.idComponent = :idComponent";

                                $statementCat = $this->db->prepare($sqlCat);
                                $statementCat->bindValue(':idComponent', $idPost);
                                $statementCat->bindValue(':size', $size);
                                $statementCat->execute();
                        break;
                }

            }
            $sql = "SELECT * FROM component 
                    INNER JOIN $category ON $category.idComponent = component.idComponent 
                    WHERE $category.idComponent = :idComponent"; // joins all categories to the table component
            $statement = $this->db->prepare($sql);
            $statement->bindValue(':idComponent', $idPost);

            $statement->setFetchMode(PDO::FETCH_CLASS, "Model\\$category");
            $statement->execute();
            $updateResult = $statement->fetch();
        }

        return ["updateResult" => $updateResult, "category" => $category,];
    }



    public function getFileName(): string
    {
        return 'modificationPiece';
    }

    public function getPageTitle(): string
    {
        return 'Mofication de Piece';
    }

}