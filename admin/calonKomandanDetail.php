<h2>Detail Calon Komandan</h2>
<a href="index.php?halaman=calonKomandan" class=" btn btn-warning pull-right">
    << Kembali </a>
        <?php
        $ambil = $koneksi->query("SELECT * FROM calon_komandan WHERE id_calon_komandan='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        ?>
        <!-- <pre>
    <?php print_r($detail); ?>
</pre> -->
        <h2><strong><?php echo $detail['nama']; ?></strong> </h2>

        <!-- <form method="post"> -->
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" required="required" value="<?php echo $detail['nama']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" required="required" value="<?php echo $detail['email']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Pangkat</label>
            <input type="double" class="form-control" name="pangkat" required="required" value="<?php echo $detail['pangkat']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="double" class="form-control" name="jabatan" required="required" value="<?php echo $detail['jabatan']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Kesatuan</label>
            <input type="double" class="form-control" name="kesatuan" required="required" value="<?php echo $detail['kesatuan']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="double" class="form-control" name="alamat" required="required" value="<?php echo $detail['alamat']; ?>" readonly>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Blangko</label>
                    <input type="text" class="form-control" name="blangko" required="required" value="<?php echo $detail['blangko']; ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">


                <br>
                <button><a href="download.php?file=<?php echo $detail['blangko'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download</a></button>

            </div>

        </div>


        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Keterangan validasi</label>
                    <select class="form-control" name="ket">
                        <option value=""> >Pilih Status< </option>
                        <option value="Sesuai"> Sesuai </option>
                        <option value="Tidak Sesuai"> Tidak Seusai </option>
                        <option value="Batal"> Batal </option>

                    </select>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <br>
                    <label>Hasil Penilaian</label>
                    <input type="double" class="form-control" name="hasil" required="required" value="<?php echo $detail['hasil']; ?>" readonly>
                </div>
            </div>
        </div>
        <!-- <button class="btn btn-primary" name="save">Simpan</button> -->
        <!-- </form> -->
        <h3>Harap Isi Penilaian Calon Komandan Dengan Baik Dan Benar</h3>
        <?php
        // $gabung=$koneksi->query("SELECT * FROM sub_kriteria 
        // JOIN kriteria ON kriteria.id_kriteria=kriteria.id_kriteria Group by subkriteria.id_kriteria
        // -- GROUP BY id_kriteria
        // ");
        // eksekusi ini nanti setelah selesai 
        // $sql 	= 'SELECT nama_kriteria, judul_artikel, tgl_terbit
        // 	   FROM 
        // 	   (  SELECT id_kriteria, nama_kriteria,  judul_artikel, tgl_terbit,
        // 		     IF ( @curr_idkat = id_kriteria, @urut := @urut + 1, @urut := 1) AS urut, 
        // 		     IF ( @curr_idkat != id_kriteria, @curr_idkat := id_kriteria, NULL) AS curr
        // 	      FROM artikel
        // 	      LEFT JOIN kategori USING(id_kriteria)
        // 	      ORDER BY id_kriteria, tgl_terbit DESC
        // 	   ) AS tmp
        // 	   WHERE urut <= 3';
        // $query 	= mysqli_query($koneksi, $sql);

        // $curr_cat = '';
        // $html = '<ul class="news">';
        // $first = true;
        // while ($row = mysqli_fetch_array($query)) 
        // {
        // 	if ($curr_cat != $row['nama_kriteria']) {
        // 		$curr_cat = $row['nama_kriteria'];

        // 		$close_tag = '</ul></li>';
        // 		if ($first) {
        // 			$close_tag = '';
        // 			$first = false;
        // 		}
        // 		$html .= $close_tag . '<li>' . $row['nama_kriteria'] . '<ul>';
        // 	}
        // 	$html .= '<li>' . $row['judul_artikel'] . '</li>';

        // }
        // $html .= '</ul></li></ul>';
        // echo $html;

        // $kriteria = $koneksi->query("SELECT * FROM kriteria  ");
        // $subkriteria = $koneksi->query("SELECT id_subKriteria, nama_sub, bobot_sub, parent FROM subkriteria WHERE parent = 0");
        ?>
        <form action="">
            <?php 
            // $C = 1;
            // while ($penilaian = $kriteria->fetch_assoc()) { 
                ?>
                <!-- <div class="form-group">
                    <label><?php echo $penilaian['nama_kriteria']; ?></label>
                    <select class="form-control" name="C.<?php $C++ ?>">
                        <option value=""> >Pilih Nilai< </option>
                        <option value="4">Baik Sekali </option>
                        <option value="3">Baik</option>
                        <option value="2">Cukup Baik</option>
                        <option value="1">Kurang Baik</option>
                    </select>
                </div> -->

            <?php 
        // }
         ?>
            <input type="submit" name="save" value="Simpan Penilaian" class="btn btn-success">
        </form>
        <?php
        if (isset($_POST['save'])) {
            $koneksi->query("INSERT INTO penialain (id_calon_komandan,nama_kriteria,bobot) VALUES('$_POST[kode]','$_POST[nama]','$_POST[bobot]')");
            echo "<div class='alert alert-info'>Data tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=calonkomandan'>";
        }
        ?>