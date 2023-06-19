<?php
require '../../functions.php';
require_once("../../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new dompdf();
$query = mysqli_query($conn, "select * from adopsi");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
	<tr>
	<th>No</th>
	<th>Nama Pet</th>
	<th>Nama</th>
	<th>Telp</th>
    <th>Waktu</th>
    <th>Pesan</th>
   ';
    
    
$no=1;
while ($row = mysqli_fetch_array($query)) {
	$html .= "<tr>
	<td>".$no."</td>
	<td>".$row['pet']."</td>
	<td>".$row['nama']."</td>
	<td>".$row['notelp']."</td>
    <td>".$row['waktu']."</td>
    <td>".$row['pesan']."</td>
	</tr>";
	$no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file PDF
$dompdf->stream('List_adopsi.pdf');
?>