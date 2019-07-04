<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Console
{
    private $spreadsheet;
    private $sheet;
    private $inputNumber;
    private $userNumber;
    private $namesArray;
    private $surnamesArray;
    private $usersArray;

    function __construct($inputNumber, $userNumber)
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
        $this->inputNumber = $inputNumber;
        $this->userNumber = $userNumber;
        $this->namesArray = array();
        $this->surnamesArray = array();
        $this->usersArray = array();
    }

    public function nameRequest()
    {
        for ($i = 0; $i < $this->inputNumber; $i++)
        {
            echo ($i + 1) . ". ismi giriniz:";
            $this->namesArray[$i] = readline();
        }
    }

    public function surnameRequest()
    {
        for ($i = 0; $i < $this->inputNumber; $i++)
        {
            echo ($i + 1) . ". soyismi giriniz:";
            $this->surnamesArray[$i] = readline();
        }
    }
    public function createUser()
    {
        for($i=0; $i < $this->userNumber; $i++)
        {
            $excelIndex = $i;
            $excelIndex++;
            $name = $this->namesArray[rand(0, $this->inputNumber-1)];
            $surname = $this->surnamesArray[rand(0, $this->inputNumber-1)];
            $user = new User($name, $surname);
            $user->createEposta();
            $user->createPassword();
            $user->saveExcel($this->sheet, $excelIndex);
            //array_push($this->usersArray,$user);
        }
    }
    public function saveFile()
    {
        $writer = new Xlsx($this->spreadsheet);
        $writer->save('hw.xlsx');
    }
}