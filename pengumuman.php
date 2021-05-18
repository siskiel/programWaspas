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
$id_calon_pelatih=$_SESSION["calon_pelatih"]['id_calon_pelatih'];
// $ambil = $koneksi->query("SELECT * FROM calon_pelatih WHERE id_calon_pelatih='$id_calon_pelatih'");
// $pecah = $ambil->fetch_assoc();
$ambil_rangking = $koneksi->query("SELECT *,FIND_IN_SET( hasil, (SELECT GROUP_CONCAT( hasil ORDER BY hasil DESC ) FROM
        penilaian )) AS ranking FROM penilaian JOIN calon_pelatih ON calon_pelatih.id_calon_pelatih=penilaian.id_calon_pelatih WHERE penilaian.id_calon_pelatih='$id_calon_pelatih'"); 
$pecah = $ambil_rangking->fetch_assoc();
?>
<br>
<br>
<br>
<br>
<br>
<br>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pengumuman</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $pecah['nama']; ?></li>
        </ol>
    </nav>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="portfolio-details-container" data-aos="fade-up" data-aos-delay="100">
                <h2> Data Telah selesai Di proses </h2>
            </div>

            <div class="portfolio-description">
                <h3>Hasil Keputusan Sistem Pendukung Keputusan Menggunakan Metode Waspas</h3>
                <br>
                <div class="col-lg-12 ">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <?php if ($pecah['ranking']==1 ):  ?>
                        <h5>Selamat Anda <strong>Terpilih Sebagai Pelatih PSMS MEDAN</strong></h5>
                        <?php else :  ?>
                        <h5>Mohon Maaf Anda <strong>Tidak Terpilih Sebagai Pelatih PSMS MEDAN</strong></h5>
                    </div>
                </div>
                <?php endif ?>
                <br>
                <br>
                <div class="col-lg-12 ">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                <!-- <div class="icon-box mt-4 mt-xl-0"> -->

                                <!-- <h4>Data Hasil</h4> -->
                                <table class="table table-success table-striped">
                                    <thead>
                                        <tr>

                                            <th scope="col">Nama</th>
                                            <th scope="col">Hasil Nilai</th>
                                            <th scope="col">Rangking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $pecah['nama']; ?></td>
                                            <td><?php echo $pecah['hasil']; ?></td>
                                            <td><?php echo $pecah['ranking']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- </div> -->
                            </div>

                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php 
  include 'footer.php';   ?>