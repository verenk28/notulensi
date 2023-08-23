<?php
include('../koneksi.php');

			$id = $_GET['id'];
			$select = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($select);
$tanggal=$data['tanggal'];
$waktu=$data['time'];
$tempat=$data['tempat'];
$pimpinan=$data['pimpinan'];
$notulis=$data['notulis'];
$agenda=$data['agenda'];

$ambildata = mysqli_query($koneksi, "SELECT * FROM pembahasan WHERE id_data='$id'") or die(mysqli_error($koneksi));

$no = 1;

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
// $query = mysqli_query($koneksi,"select * from data");
$html = 
'<html><body>'.
'<img style="margin-bottom: -50px" src=logorsabpku.jpg width=30%/>'.
'<h2  align=right>NOTULENSI</h2>'.
'<hr>'.
'<table >'.
'<tr> <td><b>Hari/Tanggal</b></td> <td><b> : </b></td> <td>'.$tanggal.'</td> </tr>'.
'<tr> <td><b>Waktu</b></td> <td><b> : </b></td> <td>'.$waktu.' WIB</td> </tr>'.
'<tr> <td><b>Tempat</b></td> <td><b> : </b></td> <td>'.$tempat.'</td> </tr>'.
'<tr> <td><b>Pimpinan Rapat</b></td> <td><b> : </b></td> <td>'.$pimpinan.'</td> </tr>'.
'<tr> <td><b>Notulis</b></td> <td><b> : </b></td> <td>'.$notulis.'</td> </tr>'.
'<tr> <td><b>Agenda Rapat</b></td> <td><b> : </b></td> <td>'.$agenda.'</td> </tr>'.
'</table>'.
'<br>'.

$html ='<table style=" font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;">;

        <tr>
            <th style="border: 1px solid #ddd;
  padding: 8px; background-color: #04AA6D;
  color: white;">No</th>
            <th style="border: 1px solid #ddd;
  padding: 8px; background-color: #04AA6D;
  color: white;">Pembahasan</th>
            <th style="border: 1px solid #ddd;
  padding: 8px; background-color: #04AA6D;
  color: white;">Pic</th>
            <th style="border: 1px solid #ddd;
  padding: 8px; background-color: #04AA6D;
  color: white;">Duedate</th>
            </tr>';

 while($pembahasan = mysqli_fetch_assoc($ambildata)){
 	$bahasan = $pembahasan['pembahasan'];
 	$pic = $pembahasan['pic'];
 	$duedate = $pembahasan['duedate'];

 	if($pembahasan['gambar'] != ''){

 		$gambar = '<img src=../gambar/'.$pembahasan['gambar'].' width=200px>';

 	}else{

 		$gambar = '';
 	}
$html.='
         <tr>
         	<td style="border: 1px solid #ddd;
  padding: 8px;">'.$no.'</td>
         	<td style="border: 1px solid #ddd;
  padding: 8px;">'.$bahasan.'<br/>'.$gambar.'</td>
         	<td style="border: 1px solid #ddd;
  padding: 8px;">'.$pic.'</td>
         	<td style="border: 1px solid #ddd;
  padding: 8px;">'.$duedate.'</td>
         </tr>';
    $no++;
     }
'</table>'.
'</body></html>';
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('notulensi.pdf');
?>