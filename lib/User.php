<?php

class User
{
    private $name;
    private $surname;
    private $password;
    private $ePosta;

    function __construct($name, $surname)
    {
        $this->setName($name);
        $this->setSurname($surname);
        $this->createPassword();
        $this->createEposta();
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEposta($ePosta)
    {
        $this->ePosta = $ePosta;
    }

    public function getEposta()
    {
        return $this->ePosta;
    }
    public function createEposta()
    {
        $addition = ['gmail.com', 'outlook.com', 'hotmail.com', 'yahoo.com', '90pixel.com'];
        $randomEk = array_rand($addition, 1);
        $name = $this->name;
        $surname = $this->surname;
        $tr = array ('ı', 'İ', 'ç', 'Ç', 'Ü', 'ü', 'Ö', 'ö', 'ş', 'Ş', 'ğ', 'Ğ', ' ');
        $eng = array ('i', 'i', 'c', 'c', 'u', 'u', 'o', 'o', 's', 's', 'g', 'g','.');
        $this->setEposta(str_replace($tr,$eng,mb_strtolower($name)).".". str_replace($tr,$eng,mb_strtolower($surname))."@".$addition[$randomEk]);
        //echo $this->getEposta();
    }
    public function createPassword()
    {
        $this->password = bin2hex(openssl_random_pseudo_bytes(4));
        //echo $this->getPassword();
    }
    public function saveExcel($spreadsheet, $excelIndex)
    {
        $spreadsheet->setCellValue("A".$excelIndex, $this->getName());
        $spreadsheet->setCellValue("B".$excelIndex, $this->getSurname());
        $spreadsheet->setCellValue("C".$excelIndex, $this->getPassword());
        $spreadsheet->setCellValue("D".$excelIndex, $this->getEposta());
    }
}