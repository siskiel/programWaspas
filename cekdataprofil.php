<?php
 //pengecekan tipe harus pdf
	include 'config/koneksi.php'; 
if (!isset($_SESSION['calon_komandan'])) {
  echo "<script>alert('Anda Harus Login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
};

    if(isset($_POST['submit'])) {
// $tipe_file = $_FILES['blangko']['type']; //mendapatkan mime type
// if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
// {
	$blangko= $_FILES["blangko"]["name"];
						$lokasiblangko=$_FILES["blangko"]["tmp_name"];
						$namafiks= date("YmdHis").$blangko;
						move_uploaded_file($lokasiblangko, "blangko/$namafiks");

	$id_calon_komandan=$_SESSION["calon_komandan"]['id_calon_komandan'];
	$nama=$_POST["nama"];
	$email=$_POST["email"];	
	$pangkat=$_POST["pangkat"];
	$jabatan=$_POST["jabatan"];
	$kesatauan=$_POST["kesatauan"];
  $no_hp=$_POST["no_hp"];
  $alamat=$_POST["alamat"];


 	// mengganti nama pdf
   
   $koneksi->query("INSERT INTO penilaian (id_calon_komandan) VALUES ('$id_calon_komandan') ");
 	// $nama_baru = "file_".$data['id'].".pdf"; //hasil contoh: file_1.pdf
 	// $file_temp = $_FILES['blangko']['tmp_name']; //data temp yang di upload
 	// $folder    = "file"; //folder tujuan
 	// move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
	//update data calon komandan 
	$koneksi->query("UPDATE calon_komandan SET nama='$nama', email='$email', pangkat='$pangkat', jabatan='$jabatan', kesatuan='$kesatauan', no_hp='$no_hp', alamat='$alamat',  blangko='$namafiks' WHERE id_calon_komandan='$id_calon_komandan'  ");

	echo "<script>alert('Terimah Kasih Telah mengisi data diri dengan lengkap , mohon untuk menunggu keputusan penilai');</script>";
	echo "<script>location='pengumuman.php' ;</script>";
						

}

?>