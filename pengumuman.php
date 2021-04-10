
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
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container" data-aos="fade-up" data-aos-delay="100">
        <?php $ambil = $koneksi->query("SELECT * FROM calon_komandan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) ?>
         <?php if ($pecah['keterangan']==NULL ): ?> 
         <img src="assets/home/img/proses.jpg" class="img-fluid" alt="">
          <?php elseif ($pecah['keterangan']==['Sesuai'] ): ?>
          <img src="assets/home/img/seleksi.jpg" class="img-fluid" alt=""> 
          <?php else: ?>
                <img src="assets/home/img/tidak.jpg" class="img-fluid" alt=""> 
                    <?php endif ?>
                  </div>

        <div class="portfolio-description">
          <h2>Hasil Keputusan Sistem Pendukung Keputusan Menggunakan Metode Waspas</h2>
          <p>
            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
          </p>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php 
  include 'footer.php';   ?>