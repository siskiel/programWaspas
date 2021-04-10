<?php
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

$nilai_max = $koneksi->query("SELECT id_kriteria, MAX(nilai_bobot) As nilai_max FROM `penilaian` GROUP BY id_kriteria");

$ambil_kriteria = $koneksi->query("SELECT * FROM penilaian  JOIN calon_komandan ON 
        calon_komandan.id_calon_komandan=penilaian.id_calon_komandan
         JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
         GROUP BY penilaian.id_kriteria
         ");

?>

<h2> Data Penilaian</h2>
<a href="index.php?halaman=penilaiantambah" class="btn btn-primary">Tambah Penilaian</a>
<a href="cetak_penilaian.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a>
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Komandan</th>
            <?php while ($pecah_kriteria = $ambil_kriteria->fetch_assoc()) { ?>
                <th> <?= $pecah_kriteria['kode_kriteria']; ?>
                </th>
            <?php } ?>
            <th>Aksi</th>
        </tr>
    </thead>
            <?php while ($pecah = $ambil->fetch_array()) { ?>
    <tbody>
        <td><?php echo $nomor; ?></td>
        <td><?= $pecah['nama']; ?></td>
        <?php for ($j = 0; $j < $j_kriteria; $j++) { ?>
            <td><?= $pecah['nilai_bobot']; ?></td>
        <?php } ?>
        <td>
            <!-- <a href="index.php?halaman=penilaianedit&id=<?php echo $pecah['id_penilaian']; ?>" class="btn-warning btn">Edit</a> -->
            <a href="index.php?halaman=penilaianahapus&id=<?php echo $pecah['id_penilaian']; ?>" class="btn-danger btn" onclick="return confirm('Apakah yakin ingin menghapus data penilaian?');">Hapus</a>
        </td>
    <?php $nomor++;
            } ?>
    </tbody>
  
<?php 
print_r($pecah)
?>
</pre>
</table>