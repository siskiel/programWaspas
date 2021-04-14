<?php 
  include 'header.php';   ?>
<?php
// session_start();
//koneksi ke database
// include '../config/koneksi.php';
if(!isset($_SESSION['calon_komandan']))
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
$id_calon_komandan=$_SESSION["calon_komandan"]['id_calon_komandan'];
// $ambil = $koneksi->query("SELECT * FROM calon_komandan WHERE id_calon_komandan='$id_calon_komandan'");
// $pecah = $ambil->fetch_assoc();
$ambil_rangking = $koneksi->query("SELECT *,FIND_IN_SET( hasil, (SELECT GROUP_CONCAT( hasil ORDER BY hasil DESC ) FROM calon_komandan )) AS ranking FROM calon_komandan WHERE id_calon_komandan='$id_calon_komandan'"); 
$pecah = $ambil_rangking->fetch_assoc();
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pengumuman</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Pengumuman</li>
                    <li><?= $pecah['nama']?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="portfolio-details-container" data-aos="fade-up" data-aos-delay="100">

                <!-- <?php if ($pecah['keterangan']=="Sesuai" ):  ?>
                <img src="assets/home/img/benar.png" class="img-fluid" alt="">
                <?php elseif ($pecah['keterangan']=="Tidak Sesuai" ):  ?>
                <img src="assets/home/img/salah.png" class="img-fluid" alt="">
                <?php else : ?>
                <img src="assets/home/img/waiting.png" class="img-fluid" alt="">
                <?php endif ?> -->
                <img src="assets/home/img/pengumuman.png" class="img-fluid" alt="">
            </div>

            <div class="portfolio-description">
                <h3>Hasil Keputusan Sistem Pendukung Keputusan Menggunakan Metode Waspas</h3>
                <br>
                <div class="col-lg-12 ">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <?php if ($pecah['ranking']==1 ):  ?>
                        <h5>Selamat Anda <strong>Terpilih Sebagai Komandan di Kodim 0201/BS Medan
                                Medan</strong></h5>
                        <?php else :  ?>
                        <h5>Mohon Maaf Anda <strong>Tidak Terpilih Sebagai Komandan di Kodim 0201 BS
                                Medan</strong></h5>
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