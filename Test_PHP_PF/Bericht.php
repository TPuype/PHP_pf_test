<?php
declare(strict_types=1);

class Bericht{
    private int $id;
    private int $userId;
    private string $boodschap;
    private string $tijdstip; 

    public function __construct(int $id, int $userId, string $boodschap, string $tijdstip){
        $this->id = $id;
        $this->userId = $userId;
        $this->boodschap = $boodschap;
        $this->tijdstip = $tijdstip;
    }

    public function getId() : int{
        return $this->id;
    }
        
    public function getUserId() : int{
        return $this->userId;
    }

    public function getBoodschap() : string{
        return $this->boodschap;
    }

    public function getTijdstip() : string{
        return $this->tijdstip;
    }

    public function setuserId(int $userId){
        $this->userId = $userId;
    }

    public function setBoodschap(string $boodschap){
        $this->boodschap = $boodschap;
    }

    public function setTijdstip(string $tijdstip){
        $this->tijdstip = $tijdstip;
    }

}
