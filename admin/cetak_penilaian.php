<?php

require_once __DIR__ . '/vendor/autoload.php';
include '../config/koneksi.php';

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
     <link href="assets/css/custom.css" rel="stylesheet" />
    <title>Data penilaian Calon Komandan</title>
</head>
<body>
    <div class"container">;
    <h1>Data Nilai Calon Komandan</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon komandan</th>';
while ($pecah_kriteria = $ambil_kriteria->fetch_assoc()) {
    '<td>'.$pecah_kriteria['kode_kriteria'];'</td>';
} ;

'<th>Email</th>
            <th>No. Hp</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>';
$nomor = 1;
$kriteria = $koneksi->query("SELECT * FROM kriteria");
$penilaian = $koneksi->query("SELECT * FROM penilaian");
$j_kriteria = mysqli_num_rows($kriteria);

$ambil_kriteria = $koneksi->query("SELECT * FROM penilaian  JOIN calon_komandan ON 
        calon_komandan.id_calon_komandan=penilaian.id_calon_komandan
         JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
         GROUP BY penilaian.id_kriteria
         ");

while ($pecah_kriteria = $ambil_kriteria->fetch_assoc()) {;
$html.= '<tr>
    <td>'.$nomor++.'</td>
    <td>'.$pecah["nama"].'</td>

</tr>';
};
$html.= '
</tbody>
</table>
</div>
</body>

</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();?>