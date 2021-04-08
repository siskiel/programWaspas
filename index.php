<?php
include 'header.php';   ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
    <h1>Your New Online Presence with Bethany</h1>
    <h2>We are team of talanted designers making websites with Bootstrap</h2>
    <a href="#about" class="btn-get-started scrollto">Baca Lebih Lanjut</a>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container">

      <div class="row">

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
          <img src="assets/home/img/clients/1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/home/img/clients/1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="300">
          <img src="assets/home/img/clients/1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="400">
          <img src="assets/home/img/clients/1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="500">
          <img src="assets/home/img/clients/1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="600">
          <img src="assets/home/img/clients/1.png" class="img-fluid" alt="">
        </div>

      </div>

    </div>
  </section><!-- End Clients Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <h2>Eum ipsam laborum deleniti velitena</h2>
          <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
          </ul>
          <p class="font-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">232</span>
          <p>Clients</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">521</span>
          <p>Projects</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">1,463</span>
          <p>Hours Of Support</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">15</span>
          <p>Hard Workers</p>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
          <div class="content">
            <h3>Data Calon Komandan</h3>
            <p>
              Berikut ini merupakan Data calon komandan, jika anda ingin mendaftar silahkan klik
            </p>

            <div class="text-center">
              <a href="register.php" class="more-btn">Regsitrasi<i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 ">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Data Calon Komandan</h4>
                                  <table class="table table-success table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Pangkat/Korps/NRP</th>
                  <th scope="col">Jabatan</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM calon_komandan"); ?>
                <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                  <tr>


                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama']; ?></td>
                    <td><?php echo $pecah['pangkat']; ?></td>
                    <td><?php echo $pecah['jabatan']; ?></td>
                  </tr>
                  <?php $nomor++; ?>
                <?php } ?>
              </tbody>
            </table>
                </div>
              </div>
             
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="text-center" data-aos="zoom-in">
        <h3>Call To Action</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a class="cta-btn" href="#">Call To Action</a>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Data calon Komandan Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container">

      <div class="row">
        <div class="col-lg-4">
          <div class="section-title" data-aos="fade-right">
            <h2>Profil Kodim</h2>
            <p>Berikut ini merupakan Data calon komandan, jika anda ingin mendaftar silahkan klik</p>
            <a href="register.php" class="registrasi">registrasi</a>
          </div>
        </div>

        <div class="col-lg-8 d-flex align-items-stretch mt-lg-0">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Sed ut perspiciatis</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            <table class="table table-success table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Pangkat/Korps/NRP</th>
                  <th scope="col">Jabatan</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM calon_komandan"); ?>
                <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                  <tr>


                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama']; ?></td>
                    <td><?php echo $pecah['pangkat']; ?></td>
                    <td><?php echo $pecah['jabatan']; ?></td>
                  </tr>
                  <?php $nomor++; ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>






      </div>
    </div>

    </div>
  </section><!-- End Data calon Komandan Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
          
          <div class="info mt-4">
            <i class="icofont-google-map"></i>
            <h4>Location:</h4>
            <p>A108 Adam Street, New York, NY 535022</p>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-4">
              <div class="info">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info w-100 mt-4">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php
include 'footer.php';   ?>