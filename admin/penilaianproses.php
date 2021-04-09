<?php

include '../config/koneksi.php';
$nomor = 1;
$ambil = $koneksi->query("SELECT * FROM penilaian  JOIN calon_komandan ON 
        calon_komandan.id_calon_komandan=penilaian.id_calon_komandan
         JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
         WHERE kriteria.id_kriteria
         Group by penilaian.id_calon_komandan
         ");
         
$kriteria = $koneksi->query("SELECT * FROM kriteria");
$penilaian = $koneksi->query("SELECT * FROM penilaian");

$j_kriteria = mysqli_num_rows($kriteria);
 // gitung jumlah data calon_komandan
    // $j_calon_komandan = mysqli_num_rows($ambil_calon_komandan);

$nilai_max = $koneksi->query("SELECT id_kriteria, MAX(nilai_bobot) As nilai_max FROM `penilaian` GROUP BY id_kriteria");

$ambil_kriteria = $koneksi->query("SELECT * FROM penilaian  JOIN calon_komandan ON 
        calon_komandan.id_calon_komandan=penilaian.id_calon_komandan
         JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
         GROUP BY penilaian.id_kriteria
         ");
         
         $wsm_wp = $koneksi->query("SELECT penilaian.id_calon_komandan, kriteria.bobot*(SELECT penilaian.nilai_bobot/4) As perkalian_matriks, pow(kriteria.bobot,(SELECT penilaian.nilai_bobot/4)) AS nilai_wsm FROM penilaian JOIN calon_komandan ON calon_komandan.id_calon_komandan=penilaian.id_calon_komandan JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria WHERE kriteria.id_kriteria Group by penilaian.id_calon_komandan,penilaian.id_kriteria");
// $ambilnilai=$wsm_wp->fetch_assoc();

$n_matriks= $koneksi->query("SELECT nilai_bobot/(SELECT MAX(nilai_bobot) FROM penilaian) AS Nilai_matriks 
FROM penilaian  JOIN kriteria ON kriteria.id_kriteria=penilaian.id_penilaian 
ORDER BY penilaian.id_kriteria");
?>
<h2> Data Penilaian</h2>
<a href="index.php?halaman=penilaiantambah" class="btn btn-primary">Tambah Penilaian</a>
<a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a>
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Komandan</th>
            <?php $niali=0;
            while ($pecah_kriteria = $ambil_kriteria->fetch_assoc()) { ?>
                <th> <?= $pecah_kriteria['kode_kriteria']; ?>
                </th>
            <?php } ?>
        </tr>
            <?php while ($pecah = $ambil->fetch_array()) { ?>
    <tbody>
        <td><?php echo $nomor; ?></td>
        <td><?= $pecah['nama']; ?></td>
        <?php for ($j = 0; $j < $j_kriteria; $j++) { ?>
        <?php $niali=0;
            while ($pecah_kriteria = $ambil_kriteria->fetch_assoc()) { ?> 
            <td><?= $niali +=$pecah['nilai_bobot']; ?></td>
             <?php } ?>
        <?php } ?>
        <td>
            <a href="index.php?halaman=penilaianedit&id=<?php echo $pecah['id_penilaian']; ?>" class="btn-warning btn">Edit</a>
            <a href="index.php?halaman=penilaianahapus&id=<?php echo $pecah['id_penilaian']; ?>" class="btn-danger btn" onclick="return confirm('Apakah yakin ingin menghapus data penilaian?');">Hapus</a>
        </td>
    <?php $nomor++;
            } ?>
    </tbody>
</table>

<?php $niali=0;
            while ($pecah_wsm = $wsm_wp->fetch_assoc()) { ?> 
            <table>
            
            <tr><?= $wsm=$pecah_wsm['perkalian_matriks']; ?></tr>
            </table>
            <tr><?= $wp=$pecah_wsm['nilai_wsm']; ?></tr>
            <tr><?= $total=$wp+$wsm; ?>total</tr>
            <?php } ?>
