<h2> Data Calon Komandan</h2>
<!-- <a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a>  -->
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon komandan</th>
            <th>Pangkat/Korps/NRP</th>
            <th>Jabatan</th>
            <th>Kesatuan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM calon_komandan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama']; ?></td>
                <td><?php echo $pecah['pangkat']; ?></td>
                <td><?php echo $pecah['jabatan']; ?></td>
                <td><?php echo $pecah['kesatuan']; ?></td>
                <td>Keterangan</td>
                <td>
                    <a href="index.php?halaman=calonKomandanDetail&id=<?php echo $pecah['id_calon_komandan']; ?>" class="btn-warning btn">Detail</a>

                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>