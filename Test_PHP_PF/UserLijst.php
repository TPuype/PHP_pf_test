<?php

declare(strict_types=1);

require_once 'dbConfig.php';

class UserLijst
{
    public function getNaamByEmail(string $email): string
    {
        $sql = "select naam from users where email = :email";

        $dbh = new PDO(dbConfig::$connstring, dbConfig::$username, dbConfig::$password);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $naam = $rij["naam"];
        $dbh = null;
        return $naam;
    }

    public function getNaamById(int $userId): string
    {
        $sql = "select naam from users where id = :userId";

        $dbh = new PDO(dbConfig::$connstring, dbConfig::$username, dbConfig::$password);
       
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':userId' => $userId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $naam = $rij["naam"];
        $dbh = null;
        return $naam;
    }
}
