<?php

// ambil penilaian
$penilaian = [];
$result = $koneksi->query('SELECT * FROM penilaian ORDER BY id_penilaian ASC');
$index = 0;
while ($row = mysqli_fetch_array($result)) :
    $penilaian['id_penilaian'][$index] = $row['id_penilaian'];
    $penilaian['id_calon_pelatih'][$index] = $row['id_calon_pelatih'];
    $penilaian['C1'][$index] = $row['C1'];
    $penilaian['C2'][$index] = $row['C2'];
    $penilaian['C3'][$index] = $row['C3'];
    $penilaian['C4'][$index] = $row['C4'];
    $penilaian['C5'][$index] = $row['C5'];
    $index += 1;
endwhile;

// echo(max($penilaian['C1']));
// echo ($penilaian['C1'][1]);

// mengambil alternatif
$alternatif = [];
$result = $koneksi->query('SELECT * FROM calon_pelatih ORDER BY id_calon_pelatih ASC');
$index = 0;
while ($row = mysqli_fetch_array($result)) :
    $alternatif['id_calon_pelatih'][$index] = $row['id_calon_pelatih'];
    $alternatif['nama'][$index] = $row['nama'];
    $index += 1;
endwhile;

// echo($alternatif['id_calon_pelatih'][1]) ;

// ambil nilai kriteria
$kriteria = [];
$result = $koneksi->query('SELECT * FROM kriteria ORDER BY id_kriteria ASC');
$index = 0;
while ($row = mysqli_fetch_array($result)) :
    $kriteria['id_kriteria'][$index] = $row['id_kriteria'];
    $kriteria['kode_kriteria'][$index] = $row['kode_kriteria'];
    $kriteria['nama_kriteria'][$index] = $row['nama_kriteria'];
    $kriteria['bobot'][$index] = $row['bobot'];
    $index += 1;
endwhile;

// print_r($kriteria['id_kriteria']) ;

// step 1 = mencari nilai max 
$maxc1 = max($penilaian['C1']);
$maxc2 = max($penilaian['C2']);
$maxc3 = max($penilaian['C3']);
$maxc4 = max($penilaian['C4']);
$maxc5 = max($penilaian['C5']);

// step 2 = melakukan normalisasi matriks
for ($i = 0; $i < count($penilaian['id_penilaian']); $i++) {
    $normalisasi_c1[] = round($penilaian['C1'][$i] / $maxc1, 4);
    $normalisasi_c2[] = round($penilaian['C2'][$i] / $maxc2, 4);
    $normalisasi_c3[] = round($penilaian['C3'][$i] / $maxc3, 4);
    $normalisasi_c4[] = round($penilaian['C4'][$i] / $maxc4, 4);
    $normalisasi_c5[] = round($penilaian['C5'][$i] / $maxc5, 4);
}

// print_r($normalisasi_c1)

// step 3 = menghitung wsm
for ($i = 0; $i < count($penilaian['id_penilaian']); $i++) {
    $rumus = 0.5 * (($normalisasi_c1[$i] * $kriteria['bobot'][0]) + ($normalisasi_c2[$i] * $kriteria['bobot'][1]) + ($normalisasi_c3[$i] * $kriteria['bobot'][2]) + ($normalisasi_c4[$i] * $kriteria['bobot'][3]) + ($normalisasi_c5[$i] * $kriteria['bobot'][4]));

    $hitungWSM[] = round($rumus, 4);
}

// print_r( $kriteria['bobot'][0]);
// step 4 = menghitung wsp
for ($i = 0; $i < count($penilaian['id_penilaian']); $i++) {
    $rumus = 0.5 * (pow($normalisasi_c1[$i], $kriteria['bobot'][0]) * pow($normalisasi_c2[$i], $kriteria['bobot'][1]) * pow($normalisasi_c3[$i], $kriteria['bobot'][2]) * pow($normalisasi_c4[$i], $kriteria['bobot'][3]) * pow($normalisasi_c5[$i], $kriteria['bobot'][4]));

    $hitungWPM[] = round($rumus, 4);
}
// //  print_r($hitungWPM[2]);
// print_r($hitungWPM[0]); "<br>";
// print_r($hitungWPM[1]); "<br>";
// print_r($hitungWPM[2]); "<br>";

// step 5 = menghitung Qi
for ($i = 0; $i < count($penilaian['id_penilaian']); $i++) {
    $rumus = $hitungWSM[$i] + $hitungWPM[$i];

    $hitungQi[] = round($rumus, 4);
    

    
    // update ke table penilaian
    $koneksi->query('UPDATE penilaian SET hasil="' . $hitungQi[$i] . '" WHERE id_penilaian="' . $penilaian['id_penilaian'][$i]. '"');
}
?>

<h4>Nilai Max </h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- menempilkan nilai max -->
            <td><?php echo $maxc1 ?></td>
            <td><?php echo $maxc2 ?></td>
            <td><?php echo $maxc3 ?></td>
            <td><?php echo $maxc4 ?></td>
            <td><?php echo $maxc5 ?></td>
        </tr>
    </tbody>
</table>

<h4>Normalisasi Matriks</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1;
        for ($i = 0; $i < count($penilaian['C1']); $i++) { ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $normalisasi_c1[$i] ?></td>
            <td><?php echo $normalisasi_c2[$i] ?></td>
            <td><?php echo $normalisasi_c3[$i] ?></td>
            <td><?php echo $normalisasi_c4[$i] ?></td>
            <td><?php echo $normalisasi_c5[$i] ?></td>
        </tr>
        <?php $nomor++;
            ?>
        <?php } ?>
    </tbody>
</table>
</tbody>
</table>

<h4>Nilai Q</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Pelatih</th>
            <th>Hasil</th>
            <th>Rangking</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1;
        $ambil = $koneksi->query("SELECT *,FIND_IN_SET( hasil, (SELECT GROUP_CONCAT( hasil ORDER BY hasil DESC ) FROM
        penilaian )) AS ranking FROM penilaian JOIN calon_pelatih ON calon_pelatih.id_calon_pelatih=penilaian.id_calon_pelatih"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php echo $pecah['hasil']; ?></td>
            <td><?php echo $pecah['ranking']; ?></td>
            <?php $nomor++; ?>
            <?php } ?>
        </tr>
    </tbody>
</table>
<a href="index.php?halaman=laporan" class="btn btn-success">Lihat Laporan </a>