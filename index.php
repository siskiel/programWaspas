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
          <h2>Tentang </h2>
          <h3>KODIM 0201/BS</h3>
          <h5>Kodim 0201/BS beralamat di jl. Jl. Pengadilan No 8 Kelurahan Petisah Tengah, Kecamatan Medan Petisah Kota Medan Provinsi Sumatera Utara
          
          </h5>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
          <p>
            Sejarah terbentuknya Kodim 0201/BS tidak terlepas dari proses terbentuknya Kodam I/Bukit Barisan yang merupakan pertumbuhan penyusunan kembali organisasi TNI AD terutama mengenai Kodam, jumlah Kodam dikurangi dari 16 menjadi 10. Setelah tenjadinya pengungkapkan pernyataan dari  pemerintah Belanda kepada Pemerintah RI, maka seluruh kekuatan bersenjata yang berada di Sumatera Utara dihimpun menjadi Komando Tentara Teritorium Sumatera Utara (Ko T.T/SU). Peristiwa ini terjadi pada tahun 1950
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
        <h3>Kodim 0201/BS</h3>
        <p> Komando Distrik Militer (disingkat Kodim) adalah komando pembinaan dan operasional kewilayahan TNI Angkatan Darat di bawah Korem</p>
        <a class="cta-btn" href="#">Kodim 0201/BS</a>
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

            <p>komando pembinaan dan operasional kewilayahan TNI Angkatan Darat di bawah Korem. Kodim membawahi beberapa Komando Rayon Militer (Koramil)</p>
            
          </div>
        </div>

        <div class="col-lg-8 d-flex align-items-stretch mt-lg-0">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Menaungi Koramil</a></h4>
            <p>Kodim 0201/BS terdiri dari 21 Kecamatan Kota Medan dan 8 Kecamatan Kabupaten Deli Serdang dengan membawahi 16 Koramil </p>
            <table class="table table-success table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Koramil</th>
                  <th scope="col">Daerah naungan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Koramil 01/MB </td>
                  <td>Kec. Medan Barat dan Kec. Medan Petisah</td>
                </tr>
                 <tr>
                  <td>2</td>
                  <td>Koramil 02/MT </td>
                  <td>Kec. Medan Timur dan Kec. Medan Perjuangan</td>
                </tr>
                 <tr>
                  <td>3</td>
                  <td>Koramil 03/MD </td>
                  <td>Kec. Medan Denai dan Kec. Medan Tembung</td>
                </tr>

                 <tr>
                  <td>4</td>
                  <td>Koramil 04/MK</td>
                  <td>Kec. Medan Kota dan Kec. Medan Area</td>
                </tr> <tr>
                  <td>5</td>
                  <td>Koramil 05/MB </td>
                  <td>Kec. Medan Baru, Kec. Medan Polonia dan Kec. Medan Maimun</td>
                </tr>
                 <tr>
                  <td>6</td>
                  <td>Koramil 06/MS </td>
                  <td>Kec. Medan Sunggal dan Medan Helvetia</td>
                </tr>
                 <tr>
                  <td>7</td>
                  <td>Koramil 07/MT </td>
                  <td>Kec. Medan Tuntungan dan Kec. Medan Selayang</td>
                </tr>
                 <tr>
                  <td>8</td>
                  <td>Koramil 08/MJ </td>
                  <td>Kec. Medan Johor dan Medan Amplas</td>
                </tr>
                 <tr>
                  <td>9</td>
                  <td>Koramil 09/MB </td>
                  <td>Kec. Medan Belawan</td>
                </tr>
                 <tr>
                  <td>10</td>
                  <td>Koramil 10/ML </td>
                  <td>Kec. Medan Labuhan dan Kec. Medan Marelan</td>
                </tr>
                 <tr>
                  <td>11</td>
                  <td>Koramil 11/MD </td>
                  <td>Kec. Medan Deli</td>
                </tr>
                 <tr>
                  <td>12</td>
                  <td>Koramil 12/HP </td>
                  <td>Kec. Hamparan Perak dan Kec. Labuhan Deli</td>
                </tr>
                 <tr>
                  <td>13</td>
                  <td>Koramil 13/PST </td>
                  <td>Kec. Percut Sei Tuan</td>
                </tr>
                 <tr>
                  <td>14</td>
                  <td>Koramil 14/PB </td>
                  <td>Kec. Pancur Batu dan Kec. Namorambe</td>
                </tr>
                 <tr>
                  <td>15</td>
                  <td>Koramil 15/DT </td>
                  <td>Kec. Deli Tua dan Kec. Patumbak</td>
                </tr>
                 <tr>
                  <td>16</td>
                  <td>Koramil 16/TM </td>
                  <td>Kec. Tanjung Morawa</td>
                </tr>
                
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
            <p>Untuk info leboh lanjut silahkan hubungi tim penilai</p>
          </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">

          <div class="info mt-4">
            <i class="icofont-google-map"></i>
            <h4>Location:</h4>
            <p>Jl. Pengadilan No 8 Kelurahan Petisah Tengah, Kecamatan Medan Petisah Kota Medan Provinsi Sumatera Utara</p>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-4">
              <div class="info">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>Timpenilaikomandankodim.com</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info w-100 mt-4">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>(061) 4531060</p>
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