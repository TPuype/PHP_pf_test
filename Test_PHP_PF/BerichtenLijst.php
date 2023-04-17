<?php

declare(strict_types=1);

require_once("Bericht.php");

class BerichtenLijst
{
    public function getLijst(): array
    {
        $dbh = new PDO(dbConfig::$connstring, dbConfig::$username, dbConfig::$password);

        $resultSet = $dbh->query("select * from berichten order by tijdstip desc");

        $lijst = array();
        foreach ($resultSet as $rij) {
            $bericht = new Bericht((int) $rij["id"], (int) $rij["userId"], (string) $rij["boodschap"], (string) $rij["tijdstip"]);
            array_push($lijst, $bericht);
        }
        $dbh = null;
        return $lijst;
    }

    public function addBericht(int $userId, string $boodschap)
    {
        if (!empty($userId) && !empty($boodschap)) {
            $sql = "insert into berichten (userId, boodschap, tijdstip) values (:userId, :boodschap, :tijdstip)";

            $dbh = new PDO(dbConfig::$connstring, dbConfig::$username, dbConfig::$password);

            $tijdstip = date('Y-m-d H:i:s');
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(":userId", $userId);
            $stmt->bindValue(":boodschap", $boodschap);
            $stmt->bindValue(":tijdstip", $tijdstip);
            $stmt->execute();
            $dbh = null;
        }
    }
}
