 <?php

    $ambil_kriteria = $koneksi->query("SELECT * FROM kriteria");
    $ambil_calon_pelatih = $koneksi->query("SELECT * FROM calon_pelatih WHERE id_calon_pelatih='$_GET[id]'");
    //    hitung jumlah data kriteria []
    $j_kriteria = mysqli_num_rows($ambil_kriteria);
    // hitung jumlah data calon_pelatih
    $j_calon_pelatih = mysqli_num_rows($ambil_calon_pelatih);
    // ambil nilai kriteria
    $kriteria = [];
    $result = $koneksi->query('SELECT * FROM kriteria ORDER BY id_kriteria ASC');
    $index = 0;
    while ($row = mysqli_fetch_array($result)) :
        $kriteria['id_kriteria'][$index] = $row['id_kriteria'];
        $kriteria['kode_kriteria'][$index] = $row['kode_kriteria'];
        $kriteria['nama_kriteria'][$index] = $row['nama_kriteria'];
        $kriteria['bobot'][$index] = $row['bobot'];

        $index += 1;
    endwhile;
    
    // ambil nilai sub kriteria
    $subkriteria = [];
    $result = $koneksi->query('SELECT * FROM sub_kriteria ORDER BY id_kriteria ASC');
    $index = 0;
    while ($row = mysqli_fetch_array($result)) :
        $subkriteria['id_sub_kriteria'][$index] = $row['id_sub_kriteria'];
        $subkriteria['id_kriteria'][$index] = $row['id_kriteria'];
        $subkriteria['nama_sub'][$index] = $row['nama_sub'];
        $subkriteria['bobot_sub'][$index] = $row['bobot_sub'];
        $index += 1;
    endwhile;
    // print_r($subkriteria['nama_sub'])
    ?>
 <?php while ($pecah = $ambil_calon_pelatih->fetch_assoc()) { ?>
 <h2>Edit Penilaian <strong> <?= $pecah['nama']?></strong> </h2>
 <?php } ?>
 <a href="index.php?halaman=penilaian" class=" btn btn-warning  pull-right">
     << Kembali </a>
         <br>
         <br>
         <br>
         <br>
         <form method="post">
             <br>
             <br>

             <table class="table table-bordered">
                 <thead>
                     <th>No</th>
                     <th>Kode Kriteria</th>
                     <th>Kriteria</th>
                     <th>Bobot Kriteria</th>
                 </thead>
                 <tbody>
                     <?php $no = 0 ;?>
                     <tr>
                         <td>1</td>
                         <td><?php echo $kriteria['kode_kriteria'][0]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][0]; ?></td>
                         <td><select name="c1">

                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][0]?>">
                                     <?php echo $subkriteria['nama_sub'][0]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][1]?>">
                                     <?php echo $subkriteria['nama_sub'][1]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][2]?>">
                                     <?php echo $subkriteria['nama_sub'][2]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][3]?>">
                                     <?php echo $subkriteria['nama_sub'][3]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][4]?>">
                                     <?php echo $subkriteria['nama_sub'][4]?></option>

                                 <?php  ; ?>
                             </select></td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td><?php echo $kriteria['kode_kriteria'][1]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][1]; ?></td>
                         <td><select name="c2">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][5]?>">
                                     <?php echo $subkriteria['nama_sub'][5]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][6]?>">
                                     <?php echo $subkriteria['nama_sub'][6]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][7]?>">
                                     <?php echo $subkriteria['nama_sub'][7]?></option>

                             </select></td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td><?php echo $kriteria['kode_kriteria'][2]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][2]; ?></td>
                         <td><select name="c3">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][8]?>">
                                     <?php echo $subkriteria['nama_sub'][8]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][9]?>">
                                     <?php echo $subkriteria['nama_sub'][9]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][10]?>">
                                     <?php echo $subkriteria['nama_sub'][10]?></option>
                                 <?php  ; ?>
                             </select></td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td><?php echo $kriteria['kode_kriteria'][3]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][3]; ?></td>
                         <td><select name="c4">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][11]?>">
                                     <?php echo $subkriteria['nama_sub'][11]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][12]?>">
                                     <?php echo $subkriteria['nama_sub'][12]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][13]?>">
                                     <?php echo $subkriteria['nama_sub'][13]?></option>

                                 <?php  ; ?>
                             </select></td>
                     </tr>
                     <tr>
                         <td>5</td>
                         <td><?php echo $kriteria['kode_kriteria'][4]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][4]; ?></td>
                         <td><select name="c5">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][14]?>">
                                     <?php echo $subkriteria['nama_sub'][14]?></option>
                                 <option value="<?php echo $subkriteria['bobot_sub'][15]?>">
                                     <?php echo $subkriteria['nama_sub'][15]?></option>
                                 <?php  ; ?>
                             </select></td>
                     </tr>
                 </tbody>
             </table>
             <button class="btn btn-primary" name="save">Simpan</button>
         </form>