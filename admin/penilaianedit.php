 <?php

use PhpParser\Node\Stmt\Echo_;

$ambil_kriteria = $koneksi->query("SELECT * FROM kriteria");
    $ambil_calon_komandan = $koneksi->query("SELECT * FROM calon_komandan");
    $penilaian=$koneksi->query("SELECT * FROM penilaian  JOIN calon_komandan ON 
        calon_komandan.id_calon_komandan=penilaian.id_calon_komandan
         JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria
          WHERE penilaian.id_penilaian='$_GET[id]'");

    $pecah_penilaian = $penilaian->fetch_assoc();
    //    hitung jumlah data kriteria []
    $j_kriteria = mysqli_num_rows($ambil_kriteria);
    // gitung jumlah data calon_komandan
    $j_calon_komandan = mysqli_num_rows($ambil_calon_komandan);
    ?>

 <h2>Edit Penilaian  <?= $pecah_penilaian['nama']?> </h2>
 <a href="index.php?halaman=penilaian" class=" btn btn-warning  pull-right">
     << Kembali </a>
         <br>
         <br>
         <form method="post">
<br>

             <table class="table table-bordered">
                 <thead>
                     <th>No</th>
                     <th>Kode Kriteria</th>
                     <th>Kriteria</th>
                     <th>Bobot Kriteria</th>
                 </thead>
                 <tbody>
                 <?php $nomor = 1; 
                 ?>
                            <?php while ($pecah_kriteria = $ambil_kriteria->fetch_assoc()) { ?>
                                <tr>
                        
                         <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah_kriteria['kode_kriteria']; ?></td>
                                <td><input type="text" name ="kriteria" class="form-control" value="<?php echo $pecah_kriteria['nama_kriteria'];?>" readonly></td>
                         <!-- <td name=""></td> -->
                                <input type='hidden' name='id_kriteria[]' value='<?php echo $pecah_kriteria['id_kriteria'];?>'>
                             <td> <select name="nilai_bobot[]">
                                     <option disabled="disabled" selected="selected">--Pilih--</option>
                                     <option value="4"> sangat Baik</option>
                                     <option value="3"> Baik</option>
                                     <option value="2"> CUkup Baik</option>
                                     <option value="1"> Tidak Baik</option>
                                 </select></td>

                     <?php $nomor++; ?>
                         <?php } ?>
                     </tr>

                    
                 </tbody>
             </table>
             
             <button class="btn btn-primary" name="Ubah">Ubah</button>
         </form>
         <?php
         
         if (isset($_POST['Ubah'])) {
             
                $id_kriteria= $_POST['id_kriteria'];
$bobot = $_POST['nilai_bobot'];
$jumlah_bobot = count($bobot);
// $kriteria = $_POST['kriteria'];
// $jumlah_kriteria = count($kriteria);

// for($y=0;$x<$jumlah_kriteria;$y++){
    
for($x=0;$x<$jumlah_bobot;$x++){
                $koneksi->query("UPDATE  penilaian SET id_kriteria=$id_kriteria[$x], nilai_bobot=$bobotbot[$x] WHERE id_calon_komandan='$_GET[id]'");
                echo "<div class='alert alert-info'>Data tersimpan</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penilaian'>";
            }
}
            // }
    
         ?>