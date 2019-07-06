<?php
namespace App;

class Excel
{
    public function saveExcel($tablo, $excelIndex, $user)
    {
        $tablo->setCellValue("A".$excelIndex, $user->getName());
        $tablo->setCellValue("B".$excelIndex, $user->getSurname());
        $tablo->setCellValue("C".$excelIndex, $user->getPassword());
        $tablo->setCellValue("D".$excelIndex, $user->getEposta());
    }
}