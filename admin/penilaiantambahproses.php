<?php
session_start();
//skrip koneksi
include '../config/koneksi.php';

 $ambil_kriteria = $koneksi->query("SELECT * FROM kriteria");
    $ambil_calon_komandan = $koneksi->query("SELECT * FROM calon_komandan");
    //    hitung jumlah data kriteria []
    $j_kriteria = mysqli_num_rows($ambil_kriteria);
    // gitung jumlah data calon_komandan
    $j_calon_komandan = mysqli_num_rows($ambil_calon_komandan);


            if (isset($_POST['save'])) {
                $nama=$_POST['calon_komandan'];
                $id_kriteria= $_POST['id_kriteria'];
$bobot = $_POST['nilai_bobot'];
$jumlah_bobot = count($bobot);
// $kriteria = $_POST['kriteria'];
// $jumlah_kriteria = count($kriteria);

// for($y=0;$x<$jumlah_kriteria;$y++){
                        $ambil= $koneksi->query("SELECT * FROM penilaian WHERE id_calon_komandan='$nama'");
                    $yangcocok= $ambil->num_rows;
                    if ($yangcocok==1)
                    {
                     echo "<script>alert('Data Nilai Telah Ada, Silahkan isi data lain');</script>";
                     echo "<script>location='reg.php';</script>";
                     }
                     else{
                     for($x=0;$x<$jumlah_bobot;$x++){
                $koneksi->query("INSERT INTO penilaian (id_calon_komandan,id_kriteria,nilai_bobot) VALUES('$nama','$id_kriteria[$x]','$bobot[$x]')");
                echo "<div class='alert alert-info'>Data tersimpan</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penilaian'>";
            }
                     }
                     }
    


            // }
    
            ?>