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
<head>
    <title>Laporan Pembelian di E-warong KUBE Kec. Medan Sunggal</title>
</head>
<body>
    <h1>Laporan Pembelian di E-warong KUBE</h1>
    <h1>Kecamatan Medan Sunggal</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Status Pembelian</th>
            <th>Total Pembelian</th>
        </tr>
    </thead>
    <tbody>';
    $nomor=1;
    $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
        while($pecah = $ambil->fetch_assoc()){;
            $html.=    '<tr>
                        <td>'.$nomor++.'</td>
                        <td>'.$pecah["nama_pelanggan"].'</td>
                        <td>'.date ('d F Y', strtotime($pecah["tgl_pembelian"])).'</td>
                        <td>'.$pecah["status_pembelian"].'</td>
                        <td> Rp.'. number_format($pecah["total_pembelian"]).'</td>
            </tr>';
        };
$html.=    '
        </tbody>
    </table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();?>