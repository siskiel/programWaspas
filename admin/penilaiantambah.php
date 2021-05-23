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
    for ($i=0; $i < count($kriteria['id_kriteria']); $i++) { 
        $result = $koneksi->query('SELECT * FROM sub_kriteria WHERE id_kriteria="'.$kriteria['id_kriteria'][$i].'"');
        $index = 0;
        while ($row = mysqli_fetch_array($result)) :
            $subkriteria[$kriteria['id_kriteria'][$i]]['id_sub_kriteria'][$index] = $row['id_sub_kriteria'];
            $subkriteria[$kriteria['id_kriteria'][$i]]['id_kriteria'][$index]     = $row['id_kriteria'];
            $subkriteria[$kriteria['id_kriteria'][$i]]['nama_sub'][$index]        = $row['nama_sub'];
            $subkriteria[$kriteria['id_kriteria'][$i]]['bobot_sub'][$index]       = $row['bobot_sub'];
            $index += 1;
        endwhile;
    }
 
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
                    <?php
                        for ($i=0; $i < count($kriteria['kode_kriteria']); $i++) { 
                            echo "<tr>";
                            echo "<td>" . ($i+1) . "</td>";
                            echo "<td>" . $kriteria['kode_kriteria'][$i] . "</td>";
                            echo "<td>" . $kriteria['nama_kriteria'][$i] . "</td>";
                            echo "<td>";
                            echo "<select name='".strtolower($kriteria['kode_kriteria'][$i])."'>";
                            echo "<option value=''>-- Pilih --</option>";
                            for ($j=0; $j < count($subkriteria[$kriteria['id_kriteria'][$i]]['nama_sub']); $j++) { 
                                echo "<option value='".$subkriteria[$kriteria['id_kriteria'][$i]]['bobot_sub'][$j]."'>" . $subkriteria[$kriteria['id_kriteria'][$i]]['nama_sub'][$j] . "</option>";
                            }
                            echo "</select>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
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
                    $koneksi->query("INSERT INTO penilaian (id_calon_pelatih,C1,C2,C3,C4,C5,hasil) VALUES('$nama','$c1','$c2','$c3','$c4','$c5', 0)");
                    echo "<div class='alert alert-info'>Data tersimpan</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penilaian'>";
                }
            } ?>