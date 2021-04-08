<?php
include 'header.php';   ?>
<?php
// session_start();
//koneksi ke database
// include '../config/koneksi.php';
if (!isset($_SESSION['calon_komandan'])) {
  echo "<script>alert('Anda Harus Login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Profil</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Profil</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <?php 
              // $idcalon= $_GET["id_calon_komandan"];
						  $id_calon_komandan=$_SESSION["calon_komandan"]['id_calon_komandan'];
						  $ambil = $koneksi->query("SELECT * FROM calon_komandan WHERE id_calon_komandan='$id_calon_komandan'");
						  $pecah = $ambil->fetch_assoc(); ?>
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">
      <form method="Post" enctype="multipart/form-data">
        <div class="form-row">
          <div class="col-md-6 form-group">
          <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $pecah['nama']; ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $pecah['email']; ?>" data-rule="email" data-msg="Please enter a valid email" required />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 form-group">
          <label for="pangkat">Pangkat</label>
            <input type="text" name="pangkat" class="form-control" id="pangkat" value="<?php echo $pecah['pangkat']; ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo $pecah['jabatan']; ?>" data-rule="minlen:4" data-msg="Please enter a valid email" required />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 form-group">
          <label for="kesatuan">Kesatuan</label>
            <input type="text" name="kesatuan" class="form-control" id="kesatuan" value="<?php echo $pecah['kesatuan']; ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <label for="no_hp">No. Handphone</label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $pecah['no_hp']; ?>" data-rule="minlen:11" data-msg="Please enter a valid No. Handphone" required />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group">
        <label for="blangko">Upload Blangko</label>
          <input type="file" class="form-control" name="blangko" id="blangko" data-rule=".pdf" required/>
          <p class="text-danger">Maksimum 2 MB format harus .pdf</p>
          <div class="validate"></div>
        </div>
        <div class="form-group">
        <label for="alamat">Alamat</label>
          <textarea type="text" class="form-control" name="alamat" id="alamat" data-rule="minlen:10" data-msg="Please enter at least 8 chars of alamat" required> <?php echo $pecah['alamat']; ?></textarea>
          <div class="validate"></div>
        </div>        
        <button class="btn btn-info py-3 px-4"  name="kirim">Simpan Data</button>
      </form>			  
<?php
if(isset($_POST['kirim'])) 
{

	$blangko= $_FILES["blangko"]["name"];
	$lokasiblangko=$_FILES["blangko"]["tmp_name"];
	$namafiks= date("YmdHis").$blangko;
	move_uploaded_file($lokasiblangko, "blangko/$namafiks");

  $nama=$_POST["nama"];
	$email=$_POST["email"];	
	$pangkat=$_POST["pangkat"];
	$jabatan=$_POST["jabatan"];
	$kesatuan=$_POST["kesatuan"];
  $no_hp=$_POST["no_hp"];
  $alamat=$_POST["alamat"];


 	// mengganti nama pdf
   
  //  $koneksi->query("INSERT INTO penilaian (id_calon_komandan) VALUES ('$id_calon_komandan') ");
 	// $nama_baru = "file_".$data['id'].".pdf"; //hasil contoh: file_1.pdf
 	// $file_temp = $_FILES['blangko']['tmp_name']; //data temp yang di upload
 	// $folder    = "file"; //folder tujuan
 	// move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
	//update data calon komandan 
	$koneksi->query("UPDATE calon_komandan SET nama='$nama', email='$email', pangkat='$pangkat', jabatan='$jabatan', kesatuan='$kesatuan', no_hp='$no_hp', alamat='$alamat', blangko='$namafiks'  WHERE id_calon_komandan='$id_calon_komandan'");

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