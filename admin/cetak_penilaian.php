<?php

require_once __DIR__ . '/vendor/autoload.php';
include '../config/koneksi.php';
$mpdf = new \Mpdf\Mpdf();
$html= '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
     <link href="assets/css/custom.css" rel="stylesheet" />
<head>
    <title>Laporan Hasil Perhitungan Metode Waspas Pemilihan Calon Komandan 0201/BS Medan</title>
</head>
<style>
p {
   line: height 20px;
}
</style>
<body>
    <h2 class="text-center">Laporan Hasil Perhitungan Metode Waspas Pemilihan Calon Pelatih PSMS Medan</h2>

    <table class="table table-bordered">
    <thead >
        <tr >
            <th class="text-center">No</th>
            <th class="text-center">Nama Calon Komandan</th>
            <th class="text-center">Nilai </th>
            <th class="text-center">Rangking</th>
            <th class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>';
    $nomor=1;
     
         $ambil = $koneksi->query("SELECT *,FIND_IN_SET( hasil, (SELECT GROUP_CONCAT( hasil ORDER BY hasil DESC ) FROM
        penilaian )) AS ranking FROM penilaian JOIN calon_pelatih ON calon_pelatih.id_calon_pelatih=penilaian.id_calon_pelatih"); ;
         while ($detail = $ambil->fetch_assoc()) {   
              if ($detail['ranking']==1 ){
                  $detailString = '<strong>Terpilih</strong>';
              }
                      else{
                           $detailString = 'Tidak terpilih' ;
                      
                  }
              
         $html.=    '<tr>
                        <td class="text-center">'.$nomor++.'</td>
                        <td>'.$detail["nama"].'</td>
                        <td class="text-center">'.$detail["hasil"].'</td>
                        <td class="text-center">'.$detail["ranking"].'</td>
                       <td class="text-center">'.$detailString.'</td>
                       </tr>';
        };
$html.=    '
        </tbody>
    </table>
    <p class="text-right">Diketahui, Ketua Tim Penilai</p>
    <br>
    <br>
    <br>
    <h4 class="text-right "><strong> Tim Penilai </strong> </h4>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();?>