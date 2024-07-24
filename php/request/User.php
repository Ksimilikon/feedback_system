<?php
class User{
    private $email;
    private $firstName;
    private $secondName;
    private $thirdName = null;
    private $role;
    private $date_reg;
    //

    function __construct($idUser)
    {
        require '../config.php';
        $userData=$mysqli->query('SELECT * FROM users WHERE id='.$idUser);
        $userData = $userData->fetch_object();
        self::fill($userData);
    }
    
    private function fill($userData_mysqliObject){
        $this->email = $userData_mysqliObject->email;
        $this->firstName = $userData_mysqliObject->FName;
        $this->secondName=$userData_mysqliObject->SName;
        $this->thirdName = $userData_mysqliObject->TName;
        $this->role=$userData_mysqliObject->id_role;
        $this->date_reg=$userData_mysqliObject->date_reg;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getSecondName() {
        return $this->secondName;
    }
    public function getThirdName() {
        return $this->thirdName;
    }
    public function getRole() {
        return $this->role;
    }
    public function getDateReg(){
        return $this->date_reg;
    }
    public function getFIO(){
        $fio = $this->secondName.' '.$this->firstName.' '.$this->thirdName;
        return $fio;
    }
}