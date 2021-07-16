<h2> Data Calon Pelatih</h2>
<!-- <a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a>  -->
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Pelatih</th>
            <th>Lisensi</th>
            <th>Keterangan Validasi</th>
            <th>Keterangan Penilaian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM calon_pelatih"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php $lisensi = $pecah['lisensi'];
                    if ($lisensi == 5) {
                        echo "A Pro";
                    } elseif ($lisensi == 4) {
                        echo "A";
                    } elseif ($lisensi == 3) {
                        echo "B";
                    } elseif ($lisensi == 2) {
                        echo "C";
                    } else {
                        echo "D";
                    };
                    ?></td>
            <td> <?php if ($pecah['validasi'] == NULL) : ?>
                Data Belum di validasi
                <?php else : ?>
                <?php echo $pecah['validasi']; ?></td>
            <?php endif ?>
            <td> <?php if ($pecah['status_penilaian'] == NULL) : ?>
                Belum Dinilai
                <?php else : ?>
                <?php echo $pecah['status_penilaian']; ?></td>
            <?php endif ?>

            <td>
                <a href="index.php?halaman=calonPelatihDetail&id=<?php echo $pecah['id_calon_pelatih']; ?>"
                    class="btn-warning btn">Detail</a>
                <a href="index.php?halaman=calonPelatihHapus&id=<?php echo $pecah['id_calon_pelatih']; ?>"
                    class="btn-danger btn"
                    onclick="return confirm('Apakah yakin ingin menghapus data pelatih?');">Hapus</a>

            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>