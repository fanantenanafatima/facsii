<?php

namespace App\Controllers;
require FCPATH . 'vendor/autoload.php';
use CodeIgniter\Files\File;
use Config\Validation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Office extends BaseController{
    public function index(){
        $spreadsheet = new Spreadsheet();

        // Obtenir la feuille active (par défaut, il y a déjà une feuille créée)
        $sheet = $spreadsheet->getActiveSheet();

        // Ajouter des données à la feuille
        $sheet->setCellValue('A1', 'Hello');
        $sheet->setCellValue('B1', 'World');

        // Écrire le fichier Excel sur le disque
        $writer = new Xlsx($spreadsheet);

        $file_name = 'fichier.xlsx';
       
        $file_path = FCPATH ."public\\xlsx\\". $file_name; // FCPATH pointe vers le dossier "public" de CodeIgniter 4

        echo $file_path;
    // Écrire le fichier Excel sur le disque
    $writer = new Xlsx($spreadsheet);
    $writer->save($file_path);
    }
}