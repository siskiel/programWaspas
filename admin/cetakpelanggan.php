<?php

require_once __DIR__ . '/vendor/autoload.php';
include '../koneksi.php';

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
    <title>Laporan Pelanggan di E-warong KUBE Kec. Medan Sunggal</title>
</head>
<body>
    <div class"container">;
    <h1>Laporan Pelanggan di E-warong KUBE Kec. Medan Sunggal</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama pelanggan</th>
            <th>Email</th>
            <th>No. Hp</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>';
    $nomor=1;
         $ambil=$koneksi->query("SELECT * FROM pelanggan");
        while($pecah = $ambil->fetch_assoc()){;
            $html.=    '<tr>
                        <td>'.$nomor++.'</td>
                        <td>'.$pecah["nama_pelanggan"].'</td>
                        <td>'.$pecah["email_pelanggan"].'</td>
                        <td>'.$pecah["no_hp"].'</td>
                        <td>'.$pecah["alamat_pelanggan"].'</td>

            </tr>';
        };
$html.=    '
        </tbody>
    </table>
    </div>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();?>