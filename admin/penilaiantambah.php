 <?php

use Svg\Tag\Group;

$ambil_kriteria = $koneksi->query("SELECT * FROM kriteria");
    $ambil_calon_pelatih = $koneksi->query("SELECT * FROM calon_pelatih");
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
    $result = $koneksi->query('SELECT * FROM sub_kriteria ORDER BY id_kriteria ASC ');
    $index = 0;
    while ($row = mysqli_fetch_array($result)) :
        $subkriteria['id_sub_kriteria'][$index] = $row['id_sub_kriteria'];
        $subkriteria['id_kriteria'][$index] = $row['id_kriteria'];
        $subkriteria['nama_sub'][$index] = $row['nama_sub'];
        $subkriteria['bobot_sub'][$index] = $row['bobot_sub'];
        $index += 1;
    endwhile;
    // echo (count($subkriteria['id_kriteria'])); "<br>";
    // echo $subkriteria['id_kriteria'][0]; "<br>";
 
    ?>

 <h2>Tambah Penilaian</h2>
 <a href="index.php?halaman=penilaian" class=" btn btn-warning  pull-right">
     << Kembali </a>
         <br>
         <br>
         <form method="post">
             <label for="calon_pelatih">Nama Calon Pelatih</label>
             <select name="calon_pelatih" id="calon_pelatih" class="form-control" style="color:brown" required>
                 <option disabled="disabled" selected="selected"> - Pilih -</option>
                 <?php
                    while ($pecah = $ambil_calon_pelatih->fetch_assoc()) {
                        echo '<option value="' . $pecah['id_calon_pelatih'] . '">' . $pecah['nama'] . '</option>';
                    }
                    ?>
             </select>
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
                     <?php $no = 1; ?>
                     <?php
                        // for ($i = 0; $i < count($kriteria['id_kriteria']); $i++) :
                        //     echo "<tr>";
                            
                        //     echo "<td>" . $kriteria['kode_kriteria'][$i] . "</td>";
                        //     echo "<td>" . $kriteria['nama_kriteria'][$i] . "</td>";
                        //     echo "</tr>";
                        // endfor;
                        ?>
                     <?php

                        $index = 1;
                        foreach ($kriteria['id_kriteria'] as $key1 => $data) {
                            // if (count($data) < 1) {
                            //     continue;
                            // }

                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $kriteria['kode_kriteria'][$key1] . "</td>";
                            echo "<td>" . $kriteria['nama_kriteria'][$key1] . "</td>";
                             
                            foreach ($subkriteria['id_sub_kriteria'] as $key2 => $data2) {
                                    echo "<td>" . $subkriteria['bobot_sub'][$key2] . "</td>";
                                }
                            }
                        //         for ($i = 0; $i < count($kriteria['id_kriteria']); $i++) :                         
                        //     echo "<td>" . $subkriteria['bobot_sub'][$i] . "</td>";
                        //     // echo "<td>" . $kriteria['nama_kriteria'][$i] . "</td>";
                       
                        // endfor;
                        // }
                            echo "</tr>";

                            $index++;             
                            ?>

                     <tr>

                         <td>1</td>
                         <td><?php echo $kriteria['kode_kriteria'][0]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][0]; ?></td>
                         <td><select name="c1">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <?php $nomor = 1;
                                    for ($i = 0; $i < count($kriteria['id_kriteria']); $i++) { ?>
                                 <option value="<?php echo $subkriteria['bobot_sub'][$i] ?>">
                                     <?php echo $subkriteria['nama_sub'][$i] ?></option>
                                 <?php }; ?>
                             </select></td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td><?php echo $kriteria['kode_kriteria'][1]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][1]; ?></td>
                         <td><select name="c2">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <?php $nomor = 1;
                                    for ($i = 0; $i < count($kriteria['kode_kriteria']); $i++) { ?>
                                 <option value="<?php echo $subkriteria['bobot_sub'][$i] ?>">
                                     <?php echo $subkriteria['nama_sub'][$i] ?></option>
                                 <?php }; ?>

                             </select></td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td><?php echo $kriteria['kode_kriteria'][2]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][2]; ?></td>
                         <td><select name="c3">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <?php $nomor = 1;
                                    for ($i = 0; $i < count($kriteria['kode_kriteria']); $i++) { ?>
                                 <option value="<?php echo $subkriteria['bobot_sub'][$i] ?>">
                                     <?php echo $subkriteria['nama_sub'][$i] ?></option>
                                 <?php }; ?>
                             </select></td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td><?php echo $kriteria['kode_kriteria'][3]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][3]; ?></td>
                         <td><select name="c4">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <?php $nomor = 1;
                                    for ($i = 0; $i < count($kriteria['kode_kriteria'][3]); $i++) { ?>
                                 <option value="<?php echo $subkriteria['bobot_sub'][3][$i] ?>">
                                     <?php echo $subkriteria['nama_sub'][3][$i] ?></option>
                                 <?php }; ?>
                             </select></td>
                     </tr>
                     <tr>
                         <td>5</td>
                         <td><?php echo $kriteria['kode_kriteria'][4]; ?></td>
                         <td><?php echo $kriteria['nama_kriteria'][4]; ?></td>
                         <td><select name="c5">
                                 <option disabled="disabled" selected="selected">--Pilih--</option>
                                 <?php $nomor = 1;
                                    for ($i = 0; $i < count($kriteria['kode_kriteria']); $i++) { ?>
                                 <option value="<?php echo $subkriteria['bobot_sub'][$i] ?>">
                                     <?php echo $subkriteria['nama_sub'][$i] ?></option>
                                 <?php }; ?>
                             </select></td>
                     </tr>
                 </tbody>
             </table>
             <button class="btn btn-primary" name="save">Simpan</button>
         </form>
         <?php
            if (isset($_POST['save'])) {
                $nama = $_POST['calon_pelatih'];
                $c1 = $_POST['c1'];
                $c2 = $_POST['c2'];
                $c3 = $_POST['c3'];
                $c4 = $_POST['c4'];
                $c5 = $_POST['c5'];

                $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih='$nama'");
                $yangcocok = $ambil->num_rows;
                if ($yangcocok == 1) {
                    echo "<script>alert('Data Nilai Telah Ada, Silahkan isi data lain');</script>";
                    echo "<script>location='index.php?halaman=penilaiantambah';</script>";
                } else {
                    $koneksi->query("INSERT INTO penilaian (id_calon_pelatih,C1,C2,C3,C4,C5) VALUES('$nama','$c1','$c2','$c3','$c4','$c5')");
                    echo "<div class='alert alert-info'>Data tersimpan</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penilaian'>";
                }
            } ?>