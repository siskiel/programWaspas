<?php

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

// mengambil nilai alternatif
$alternatif = [];
$result = $koneksi->query('SELECT * FROM calon_komandan ORDER BY id_calon_komandan ASC');
$index = 0;
while ($row = mysqli_fetch_array($result)) :
    $alternatif['id_calon_komandan'][$index] = $row['id_calon_komandan'];
    $alternatif['nama'][$index] = $row['nama'];

    $index += 1;
endwhile;

// ambil nilai penilaian setiap alternatif
foreach ($alternatif['id_calon_komandan'] as $key => $data) {
    $penilaian = [];
    $result = $koneksi->query('SELECT * FROM penilaian WHERE id_calon_komandan="' . $data . '" ORDER BY id_kriteria ASC');

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) :
            $penilaian['id_penilaian'][$row['id_kriteria']] = $row['id_penilaian'];
            $penilaian['nilai_bobot'][$row['id_kriteria']] = $row['nilai_bobot'];
        endwhile;

        $alternatif['penilaian'][$key] = $penilaian;
    }
}

// melakukan normalisasi matriks
$R = [];
for ($i = 0; $i < count($alternatif['id_calon_komandan']); $i++) {
    // mengambil nilai max dan min
    $max = max($alternatif['penilaian'][$i]['nilai_bobot']);
    $min = min($alternatif['penilaian'][$i]['nilai_bobot']);

    for ($j = 0; $j < count($kriteria['id_kriteria']); $j++) {
        $kode = $kriteria['kode_kriteria'][$j];

        $R[$kode][$i] = round($alternatif['penilaian'][$i]['nilai_bobot'][$j + 1] / $max, 3);
    }
}

// menghitung Nilai Q
$Q = [];
for ($i = 0; $i < count($alternatif['id_calon_komandan']); $i++) {
    $WSM = 0;
    $WPM = 1;

    for ($j = 0; $j < count($kriteria['id_kriteria']); $j++) {
        $kode = $kriteria['kode_kriteria'][$j];

        $WSM += $R[$kode][$i] * $kriteria['bobot'][$j];
        $WPM *= pow($R[$kode][$i], $kriteria['bobot'][$j]);
    }

    $Q[$i] = round((0.5 * $WSM) + (0.5 * $WPM), 3);

    // update ke table calon_komandan
    $koneksi->query('UPDATE calon_komandan SET hasil="' . $Q[$i] . '" WHERE id_calon_komandan="' . $alternatif['id_calon_komandan'][$i] . '"');
}

// melakukan sorting
$RSort = $Q;
rsort($RSort);

?>

<h4>Matriks Keputusan</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>

            <?php
            for ($i = 0; $i < count($kriteria['id_kriteria']); $i++) :
                echo "<th>" . $kriteria['kode_kriteria'][$i] . "</th>";
            endfor;
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($alternatif['id_calon_komandan']); $i++) {
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>" . $alternatif['nama'][$i] . "</td>";

            for ($j = 0; $j < count($kriteria['id_kriteria']); $j++) {
                echo "<td>" . $alternatif['penilaian'][$i]['nilai_bobot'][$j + 1] . "</td>";
            }

            echo "</tr>";
        }
        ?>
    </tbody>
</table>



<h4>Normalisasi Matriks</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>

            <?php
            for ($i = 0; $i < count($kriteria['id_kriteria']); $i++) :
                echo "<th>" . $kriteria['kode_kriteria'][$i] . "</th>";
            endfor;
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($alternatif['id_calon_komandan']); $i++) {
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>" . $alternatif['nama'][$i] . "</td>";

            for ($j = 0; $j < count($kriteria['id_kriteria']); $j++) {
                $kode = $kriteria['kode_kriteria'][$j];

                echo "<td>" . $R[$kode][$i] . "</td>";
            }

            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<h4>Menghitung Nilai Rating Tertinggi Q</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Q</th>
            <th>Rangking</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($alternatif['id_calon_komandan']); $i++) {
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>" . $alternatif['nama'][$i] . "</td>";
            echo "<td>" . $Q[$i] . "</td>";
            echo "<td>" . $rangking = (int)array_search($Q[$i], $RSort, true) + 1 . "</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<a href="index.php?halaman=laporan" class="btn btn-primary">Proses Perhitungan</a>