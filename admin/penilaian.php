<h2> Data Penilaian</h2>
<!-- <a href="index.php?halaman=penilaiantambah" class="btn btn-primary">Tambah Penilaian</a> -->
<!-- <a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a>  -->
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Pelatih</th>
            <th>Lisensi</th>
            <th>Pengalaman Melatih</th>
            <th>Pengalaman Bermain</th>
            <th>Visi Misi</th>
            <th>Pemahaman Taktik</th>
            <!-- <th>Aksi</th> -->
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM penilaian JOIN calon_pelatih ON penilaian.id_calon_pelatih=calon_pelatih.id_calon_pelatih"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php echo $pecah['C1']; ?></td>
            <td><?php echo $pecah['C2']; ?></td>
            <td><?php echo $pecah['C3']; ?></td>
            <td><?php echo $pecah['C4']; ?></td>
            <td><?php echo $pecah['C5']; ?></td>


            <!-- <td>
                <a href="index.php?halaman=penilaianedit&id=<?php echo $pecah['id_calon_pelatih']; ?>"
                    class="btn-warning btn">Edit</a>
                <a href="index.php?halaman=penilaianhapus&id=<?php echo $pecah['id_calon_pelatih']; ?>"
                    class="btn-danger btn"
                    onclick="return confirm('Apakah yakin ingin menghapus data pelatih?');">Hapus</a>
            </td> -->
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=prosesWaspas" class="btn btn-success">Proses Perhitungan</a>