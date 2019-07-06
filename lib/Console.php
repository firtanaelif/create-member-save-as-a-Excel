<?php
namespace App;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Console
{
    private $inputNumber;
    private $userNumber;
    private $namesArray;
    private $surnamesArray;
    private $usersArray;
    private $tablo;
    private $taslak;

    function __construct($inputNumber, $userNumber)
    {
        $this->inputNumber = $inputNumber;
        $this->userNumber = $userNumber;
        $this->namesArray = array();
        $this->surnamesArray = array();
        $this->usersArray = array();
        $this->tablo 			= new Spreadsheet();
        $this->taslak			= $this->tablo->getActiveSheet();
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
            $excel = new Excel();
            $excel->saveExcel($this->taslak, $excelIndex, $user);
        }
    }
    public function saveFile()
    {
        $writer = new Xlsx($this->tablo);
        $writer->save('hw.xlsx');
    }
}