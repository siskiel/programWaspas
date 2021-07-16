<?php
include 'header.php';   ?>
<?php
// session_start();
// koneksi ke database
// include 'config/koneksi.php';
if (!isset($_SESSION['calon_pelatih'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
// $idcalon= $_GET["id_calon_pelatih"];
$id_calon_pelatih = $_SESSION["calon_pelatih"]['id_calon_pelatih'];
$ambil = $koneksi->query("SELECT * FROM calon_pelatih WHERE id_calon_pelatih='$id_calon_pelatih'");
$pecah = $ambil->fetch_assoc();

$ambil_kriteria = $koneksi->query("SELECT * FROM kriteria");
$ambil_calon_pelatih = $koneksi->query("SELECT * FROM calon_pelatih WHERE id_calon_pelatih='$id_calon_pelatih'");
//    hitung jumlah data kriteria []
$j_kriteria = mysqli_num_rows($ambil_kriteria);
// hitung jumlah data calon_pelatih
$j_calon_pelatih = mysqli_num_rows($ambil_calon_pelatih);
?>
<br>
<br>
<br>

<main id="main">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $pecah['nama']; ?></li>
        </ol>
    </nav>
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <form method="Post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="<?php echo $pecah['nama']; ?>" data-rule="minlen:4"
                            data-msg="Please enter at least 4 chars" required />
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="<?php echo $pecah['email']; ?>" data-rule="email"
                            data-msg="Please enter a valid email" required />
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="lisensi">Lisensi</label>
                        <br>
                        <select class="form-select col-md-6 form-group" name="lisensi"
                            aria-label="Default select example" value="<?php echo $pecah['lisensi']; ?>">
                            <option selected><?php $lisensi =  $pecah['lisensi'];
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
                                                ?></option>
                            <?php if ($pecah['lisensi'] == NULL) :  ?>
                            <option selected>Open this select menu</option>
                            <?php endif ?>
                            <option value="5">A Pro</option>
                            <option value="4">A</option>
                            <option value="3">B</option>
                            <option value="2">C</option>
                            <option value="1">D</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="pengalaman_bermain">Pengalaman Bermain</label>
                        <br>
                        <select class="form-select col-md-6 form-group" name="pengalaman_bermain"
                            aria-label="Default select example" value="<?php echo $pecah['pengalaman_bermain']; ?>">
                            <option selected><?php $pengalaman_bermain = $pecah['pengalaman_bermain'];
                                                if ($pengalaman_bermain == 3) {
                                                    echo "16-20 Tahun";
                                                } elseif ($pengalaman_bermain == 2) {
                                                    echo "10-15 Tahun";
                                                } else {
                                                    echo "5-9 Tahun";
                                                };
                                                ?></option>
                            <?php if ($pecah['pengalaman_bermain'] == NULL) :  ?>
                            <option selected>Open this select menu</option>
                            <?php endif ?>
                            <option value="3">16-20 Tahun</option>
                            <option value="2">10-15 Tahun</option>
                            <option value="1">5-9 Tahun</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="pengalaman_melatih">Pengalaman Melatih</label>
                        <br>
                        <select class="form-select col-md-6 form-group" name="pengalaman_melatih"
                            aria-label="Default select example" value="<?php echo $pecah['pengalaman_melatih']; ?>">
                            <option selected><?php $pengalaman_melatih = $pecah['pengalaman_melatih'];
                                                if ($pengalaman_melatih == 3) {
                                                    echo "16-20 Tahun";
                                                } elseif ($pengalaman_melatih == 2) {
                                                    echo "10-15 Tahun";
                                                } else {
                                                    echo "5-9 Tahun";
                                                };
                                                ?></option>
                            <?php if ($pecah['pengalaman_bermain'] == NULL) :  ?>
                            <option selected>Open this select menu</option>
                            <?php endif ?>
                            <option value="3">16-20 Tahun</option>
                            <option value="2">10-15 Tahun</option>
                            <option value="1">5-9 Tahun</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="no_hp">No. Handphone</label>
                        <input type="number" class="form-control" name="no_hp" id="no_hp"
                            value="<?php echo $pecah['no_hp']; ?>" data-rule="minlen:11"
                            data-msg="Please enter a valid No. Handphone" required />
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="visi_misi">Visi Misi</label>
                    <textarea type="text" class="form-control" name="visi_misi" id="visi_misi" data-rule="minlen:10"
                        data-msg="Please enter at least 50 chars of visi_misi"
                        required> <?php echo $pecah['visi_misi']; ?></textarea>
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <?php if ($pecah['sertifikat_lisensi'] == NULL) :  ?>
                    <label for="sertifikat_lisensi">Upload Sertifikat Lisensi</label>
                    <input type="file" class="form-control" name="sertifikat_lisensi" id="sertifikat_lisensi"
                        data-rule=".pdf" value="<?php echo $pecah['sertifikat_lisensi']; ?>" required />
                    <p class="text-danger">Maksimum 2 MB format harus .pdf</p>
                    <div class="validate"></div>


                    <?php else :  ?>
                    <label for="sertifikat_lisensi">Sertifikat Lisensi</label>
                    <input type="text" class="form-control" name="sertifikat_lisensi" required="required"
                        value="<?php echo $pecah['sertifikat_lisensi']; ?>">
                    <button><a href="admin/download.php?file=<?php echo $pecah['sertifikat_lisensi'] ?>"
                            class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>
                            Download</a></button>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" name="alamat" id="alamat" data-rule="minlen:10"
                        data-msg="Please enter at least 8 chars of alamat"
                        required> <?php echo $pecah['alamat']; ?></textarea>
                    <div class="validate"></div>
                </div>
                <br>
                <button class="btn btn-info py-3 px-4" name="kirim">Simpan Data</button>
            </form>
            <?php
            if (isset($_POST['kirim'])) {

                $sertifikat_lisensi = $_FILES["sertifikat_lisensi"]["name"];
                $lokasisertifikat_lisensi = $_FILES["sertifikat_lisensi"]["tmp_name"];
                $namafiks = date("YmdHis") . $sertifikat_lisensi;
                move_uploaded_file($lokasisertifikat_lisensi, "sertifikat_lisensi/$namafiks");

                $nama = $_POST["nama"];
                $email = $_POST["email"];
                $lisensi = $_POST["lisensi"];
                $visi_misi = $_POST['visi_misi'];
                $pengalaman_bermain = $_POST["pengalaman_bermain"];
                $pengalaman_melatih = $_POST["pengalaman_melatih"];
                $no_hp = $_POST["no_hp"];
                $alamat = $_POST["alamat"];

                // if ($lisensi == ''

                // mengganti nama pdf

                //  $koneksi->query("INSERT INTO penilaian (id_calon_pelatih) VALUES ('$id_calon_pelatih') ");
                // $nama_baru = "file_".$data['id'].".pdf"; //hasil contoh: file_1.pdf
                // $file_temp = $_FILES['sertifikat_lisensi']['tmp_name']; //data temp yang di upload
                // $folder    = "file"; //folder tujuan
                // move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
                //update data calon komandan 
                $koneksi->query("UPDATE calon_pelatih SET nama='$nama', email='$email', lisensi='$lisensi', pengalaman_bermain='$pengalaman_bermain', visi_misi='$visi_misi', pengalaman_melatih='$pengalaman_melatih', no_hp='$no_hp', alamat='$alamat', sertifikat_lisensi='$namafiks'  WHERE id_calon_pelatih='$id_calon_pelatih'");
                
                $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih='$id_calon_pelatih'");
                $yangcocok = $ambil->num_rows;
                if ($yangcocok == 1) {
                    $koneksi->query("UPDATE penilaian SET C1='$lisensi', C2='$pengalaman_bermain', C3='$pengalaman_melatih' WHERE id_calon_pelatih='$id_calon_pelatih'");
                    
                } else {
                     $koneksi->query("INSERT INTO penilaian (id_calon_pelatih,C1,C2,C3) VALUES('$id_calon_pelatih','$lisensi','$pengalaman_bermain','$pengalaman_melatih')");
                }
                

               

                echo "<script>alert('Terimah Kasih Telah mengisi data diri dengan lengkap , mohon untuk menunggu keputusan penilai');</script>";
                echo "<script>location='pengumuman.php' ;</script>";
            }
            ?>
        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
include 'footer.php';   ?>