<?php
$ambil_kriteria = $koneksi->query("SELECT * FROM kriteria");
$ambil_calon_pelatih = $koneksi->query("SELECT * FROM calon_pelatih");
$penilaian = $koneksi->query("SELECT * FROM penilaian WHERE id_penilaian='$_GET[id]'");

//    hitung jumlah data kriteria []
$j_kriteria = mysqli_num_rows($ambil_kriteria);
// hitung jumlah data calon_pelatih
$j_calon_pelatih = mysqli_num_rows($ambil_calon_pelatih);
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

// ambil nilai sub kriteria
$subkriteria = [];
for ($i = 0; $i < count($kriteria['id_kriteria']); $i++) {
    $result = $koneksi->query('SELECT * FROM sub_kriteria WHERE id_kriteria="' . $kriteria['id_kriteria'][$i] . '"');
    $index = 0;
    while ($row = mysqli_fetch_array($result)) :
        $subkriteria[$kriteria['id_kriteria'][$i]]['id_sub_kriteria'][$index] = $row['id_sub_kriteria'];
        $subkriteria[$kriteria['id_kriteria'][$i]]['id_kriteria'][$index]     = $row['id_kriteria'];
        $subkriteria[$kriteria['id_kriteria'][$i]]['nama_sub'][$index]        = $row['nama_sub'];
        $subkriteria[$kriteria['id_kriteria'][$i]]['bobot_sub'][$index]       = $row['bobot_sub'];
        $index += 1;
    endwhile;
}
//penilaian
// $penilaian = [];
// for ($i = 0; $i < count($penilaian['id_penilaian']); $i++) {
//     $result = $koneksi->query("SELECT * FROM penilaian");
//     $index = 0;
//     while ($row = mysqli_fetch_array($result)) :
//         $penilaian['id_penilaian'][$index] = $row['id_penilaian'];
//         $penilaian['id_calon_pelatih'][$index] = $row['id_calon_pelatih'];
//         $penilaian['C1'][$index] = $row['C1'];
//         $penilaian['C2'][$index] = $row['C2'];
//         $penilaian['C3'][$index] = $row['C3'];
//         $penilaian['C4'][$index] = $row['C4'];
//         $penilaian['C5'][$index] = $row['C5'];
//         $index += 1;
//     endwhile;
// }
?>
<h2>Detail Calon Pelatih</h2>
<a href="index.php?halaman=calonPelatih" class=" btn btn-warning pull-right">
    << Kembali </a>
        <?php
        $ambil = $koneksi->query("SELECT * FROM calon_pelatih WHERE id_calon_pelatih='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        $penilaian = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih='$_GET[id]'");
        $penilaian_detail = $penilaian->fetch_assoc();
        ?>
        <!-- <pre>
    <?php print_r($detail); ?>
</pre> -->
        <h2><strong><?php echo $detail['nama']; ?></strong> </h2>

        <form method="post">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required="required"
                        value="<?php echo $detail['nama']; ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" required="required"
                        value="<?php echo $detail['email']; ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>No.Hp</label>
                    <input type="text" class="form-control" name="no_hp" required="required"
                        value="<?php echo $detail['no_hp']; ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sertifikat Lisensi</label>
                    <input type="text" class="form-control" name="sertifikat_lisensi" required="required"
                        value="<?php echo $detail['sertifikat_lisensi']; ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <button><a href="download.php?file=<?php echo $detail['sertifikat_lisensi'] ?>"
                            class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>
                            Download</a></button>
                </div>
            </div>
            <?php
            ?>
            <h4>Penilaian</h4>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Lisensi</label>
                    <input type="text" class="form-control" name="lisensi" required="required" value="<?php $lisensi =  $penilaian_detail['C1'];
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
                                                                                                        ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Pengalaman Melatih</label>
                    <input type="double" class="form-control" name="pengalaman_melatih" required="required" value="<?php 
                    $pengalaman_melatih = $detail['pengalaman_melatih'];
                                                                                                                    if ($pengalaman_melatih == 3) {
                                                                                                                        echo "16-20 Tahun";
                                                                                                                    } elseif ($pengalaman_melatih == 2) {
                                                                                                                        echo "10-15 Tahun";
                                                                                                                    } else {
                                                                                                                        echo "5-9 Tahun";
                                                                                                                    };
                                                                                                                    ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Pengalaman Bermain</label>
                    <input type="double" class="form-control" name="pengalaman_bermain" required="required"
                        value="<?php $pengalaman_bermain = $detail['pengalaman_bermain'];

                                                                                                                    if ($pengalaman_bermain == 3) {
                                                                                                                        echo "16-20 Tahun";
                                                                                                                    } elseif ($pengalaman_bermain == 2) {
                                                                                                                        echo "10-15 Tahun";
                                                                                                                    } else {
                                                                                                                        echo "5-9 Tahun";
                                                                                                                    }; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Visi Misi</label>
                    <textarea type="double" class="form-control" name="pangkat" required="required"
                        readonly><?php echo $detail['visi_misi']; ?> </textarea>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="double" class="form-control" name="alamat" required="required"
                        value="<?php echo $detail['alamat']; ?>" readonly>
                </div>
                <!-- <div class="form-group">
                    <label>Keterangan validasi</label>
                    <select class="form-control" name="ket">

                        <?php if ($detail['keterangan'] == NULL) :  ?>
                        <option disabled="disabled">--Pilih--</option>
                        <?php else :  ?>
                        <option disabled="disabled"><?php echo $detail['keterangan'] ?>
                            <?php endif ?>
                        <option disabled="disabled">--Pilih--</option>
                        <option value="Sesuai"> Sesuai </option>
                        <option value="Tidak Sesuai"> Tidak Seusai </option>
                    </select>
                </div> -->
            </div>

            <div class="col-md-6">
                <!-- <h4>Penialian</h4> -->
                <div class="form-group">
                    <label>Lisensi</label>
                    <select class="form-control" name="c1" aria-label="Default select example" value="<?php 
                    echo $penilaian_detail['C1']; 
                    ?>">
                        <option selected><?php 
                        echo  $penilaian_detail['C1'];
                                 
                                                                                                        ?></option>
                        <?php if ($detail['lisensi'] == NULL) :  ?>
                        <option selected>--Pilih--</option>
                        <?php endif ?>
                        <option value="5">A Pro</option>
                        <option value="4">A</option>
                        <option value="3">B</option>
                        <option value="2">C</option>
                        <option value="1">D</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pengalaman Melatih</label>
                    <select class="form-control" name="c2" aria-label="Default select example" value="<?php $penilaian_detail['C2']
                                                ?>">
                        <option selected><?php echo  $penilaian_detail['C2'];
                                                ?>
                        </option>
                        <?php if ($detail['pengalaman_melatih'] == NULL) :  ?>
                        <option selected>--Pilih--</option>
                        <?php endif ?>
                        <option value="3">16-20 Tahun</option>
                        <option value="2">10-15 Tahun</option>
                        <option value="1">5-9 Tahun</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pengalaman Bermain</label>
                    <select class="form-control" name="c3" aria-label="Default select example" value="<?php $penilaian_detail['C3'];
                                                ?>">
                        <option selected><?php echo  $penilaian_detail['C3'];
                                                ?>
                        </option>
                        <?php if ($detail['pengalaman_bermain'] == NULL) :  ?>
                        <option selected>--Pilih--</option>
                        <?php endif ?>
                        <option value="3">16-20 Tahun</option>
                        <option value="2">10-15 Tahun</option>
                        <option value="1">5-9 Tahun</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Penguasaan Taktik</label>
                    <select class="form-control" name="c4" aria-label="Default select example"
                        value="<?php echo $penilaian_detail['C4']; ?>">
                        <option selected><?php echo $penilaian_detail['C4']; ?></option>
                        <?php if ($penilaian_detail['C4'] == 0) :  ?>
                        <option selected>--Pilih--</option>
                        <?php endif ?>
                        <option value="3">Sangat Baik</option>
                        <option value="2">Baik</option>
                        <option value="1">Cukup</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Visi Misi</label>
                    <select class="form-control" name="c5" aria-label="Default select example"
                        value="<?php echo $penilaian_detail['C5']; ?>">
                        <option selected><?php echo $penilaian_detail['C5']; ?></option>
                        <?php if ($penilaian_detail['C5'] == 0) :  ?>
                        <option selected>--Pilih--</option>
                        <?php endif ?>
                        <option value="2">Sangat Baik</option>
                        <option value="1">Baik</option>
                    </select>
                </div>

                <?php
                // for ($i = 0; $i < count($kriteria['kode_kriteria']); $i++) {
                //     echo "<div class='form-group'>";
                //     echo "<label>" . $kriteria['nama_kriteria'][$i] . "</label>";
                //     echo " <br>";
                //     echo "<select class='form-control' required='required' name='" . strtolower($kriteria['kode_kriteria'][$i]) . "'>";
                //     if ($penilaian_detail['C1'] == NULL) :
                //         echo "<option value=''>-- Pilih --</option>";
                //     else :
                //         echo "<option value=''>-- Pilih --</option>";
                //     endif;
                //     // echo $detail['C1'];
                //     for ($j = 0; $j < count($subkriteria[$kriteria['id_kriteria'][$i]]['nama_sub']); $j++) {
                //         echo "<option value='" . $subkriteria[$kriteria['id_kriteria'][$i]]['bobot_sub'][$j] . "'>" . $subkriteria[$kriteria['id_kriteria'][$i]]['nama_sub'][$j] . "</option>";
                //     }
                //     echo "</select>";
                //     echo "</div>";
                // }

                ?>

                <!-- <label>Lisensi</label> -->
                <!-- <input type="text" class="form-control" name="no_hp" required="required"
                        value="<?php echo $detail['lisensi']; ?>" readonly> -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Keterangan Validasi</label>
                    <select class="form-control" name="ket" aria-label="Default select example"
                        value="<?php echo $detail['validasi']; ?>">
                        <option selected><?php echo $detail['validasi']; ?></option>
                        <?php if ($detail['validasi'] == NULL) :  ?>
                        <option selected>--Pilih--</option>
                        <?php endif ?>
                        <option value="Data Sesuai">Data Sesuai</option>
                        <option value="Data Tidak Sesuai">Data tidak Sesuai</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Keterangan Penilaian</label>
                    <select class="form-control" name="status" aria-label="Default select example"
                        value="<?php echo $detail['status_penilaian']; ?>">
                        <option selected><?php echo $detail['status_penilaian']; ?></option>
                        <?php if ($detail['status_penilaian'] == NULL) :  ?>
                        <option selected>--Pilih--</option>
                        <?php endif ?>
                        <option value="Selesai Dinilai">Selesai Dinilai</option>
                        <option value="Tidak bisa dilakukan penilaian">Tidak bisa dilakukan penilaian</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <br>
                    <input type="submit" name="save" value="Simpan Perubahan" class="btn btn-success">

                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['save'])) {
            $ket = $_POST["ket"];
            $status = $_POST["status"];
            $koneksi->query("UPDATE calon_pelatih SET validasi='$ket', status_penilaian='$status' WHERE id_calon_pelatih='$_GET[id]'");
            echo "<div class='alert alert-info'>Data tersimpan</div>";
            // echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=calonPelatih'>";
        };
        if (isset($_POST['save'])) {
            // $nama = $_POST['calon_pelatih'];
            $c1 = $_POST['c1'];
            $c2 = $_POST['c2'];
            $c3 = $_POST['c3'];
            $c4 = $_POST['c4'];
            $c5 = $_POST['c5'];
            $koneksi->query("UPDATE penilaian SET  C2='$c2', C3='$c3', C4='$c4', C5='$c5' WHERE id_calon_pelatih='$_GET[id]'");
            $koneksi->query("UPDATE calon_pelatih SET lisensi='$c1', pengalaman_melatih='$c2', pengalaman_bermain='$c3' WHERE id_calon_pelatih='$_GET[id]'");
                // $koneksi->query("INSERT INTO penilaian (id_calon_pelatih,C1,C2,C3,C4,C5) VALUES('$_GET[id]','$c1','$c2','$c3','$c4','$c5')");
                echo "<div class='alert alert-info'>Data tersimpan</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penilaian'>";

            // $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih='$_GET[id]'");
            // $yangcocok = $ambil->num_rows;
            // if ($yangcocok == 1) {
            //     echo "<script>alert('Data Nilai Telah Ada, Silahkan isi data lain');</script>";
            //     echo "<script>location='index.php?halaman=calonPelatihDetail';</script>";
            // } else {
            //     $koneksi->query("UPDATE penilaian SET C4='$c4', C5='$c5' WHERE id_calon_pelatih='$_GET[id]'");
            //     // $koneksi->query("INSERT INTO penilaian (id_calon_pelatih,C1,C2,C3,C4,C5) VALUES('$_GET[id]','$c1','$c2','$c3','$c4','$c5')");
            //     echo "<div class='alert alert-info'>Data tersimpan</div>";
            //     echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penilaian'>";
            // }
        }
        ?>
        <?php
        ?>