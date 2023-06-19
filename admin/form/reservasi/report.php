<?php

require '../../functions.php';
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet    = new Spreadsheet();
$sheet          = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','No');
$sheet->setCellValue('B1','Reservasi');
$sheet->setCellValue('C1','Nama Customer');
$sheet->setCellValue('D1','Telp');
$sheet->setCellValue('E1','Waktu');
$sheet->setCellValue('F1','Alamat');
$sheet->setCellValue('G1','Pesan');
$sheet->setCellValue('H1','Status');


$sql = mysqli_query($conn,"SELECT * FROM reservasi");
$i  = 2;
$no = 1;
while ($row = mysqli_fetch_array($sql)) {
    $sheet->setCellValue('A'.$i,$no++);
    $sheet->setCellValue('B'.$i,$row['reservasi']);
    $sheet->setCellValue('C'.$i,$row['nama']);
    $sheet->setCellValue('D'.$i,$row['notelp']);
        $sheet->setCellValue('E'.$i,$row['waktu']);
            $sheet->setCellValue('F'.$i,$row['alamat']);
                $sheet->setCellValue('G'.$i,$row['pesan']);
                    $sheet->setCellValue('H'.$i,$row['status']);
    $i++;
}

$styleArray = [
    'borders'=>[
        'allBorders'=>[
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$i = $i - 1;
$sheet->getStyle('A1:H'.$i)->applyFromArray($styleArray);

$writer         = new Xlsx($spreadsheet);
$writer->save('c:\Users\maulanabry\Downloads\List Reservasi.xlsx');
if ($writer) {
            ?>
        <script language="javascript">
            alert('Excel Berhasil Dibuat');
            document.location.href="reservasi.php";
        </script>
        <?php
} 
?>