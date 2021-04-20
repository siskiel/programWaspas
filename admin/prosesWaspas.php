<?php
// menampung matriks ternormalisasi 
$matriks_c1 = [];
$matriks_c2 = [];
$matriks_c3 = [];
$matriks_c4 = [];
$matriks_c5 = [];

// ambil penilaiana
$penilaian = [];
$result = $koneksi->query('SELECT * FROM penilaian ORDER BY id_penilaian ASC');
$index = 0;
while ($row = mysqli_fetch_array($result)) :
    $penilaian['id_penilaian'][$index] = $row['id_penilaian'];
    $penilaian['C1'][$index] = $row['C1'];
    $penilaian['C2'][$index] = $row['C2'];
    $penilaian['C3'][$index] = $row['C3'];
    $penilaian['C4'][$index] = $row['C4'];
    $penilaian['C5'][$index] = $row['C5'];

    $index += 1;
endwhile;
// mencari nilai max c1
$result = $koneksi->query('SELECT MAX(C1),MAX(C2),MAX(C3),MAX(C4),MAX(C5) FROM penilaian ORDER BY id_penilaian ASC');
while ($row = mysqli_fetch_row($result))
    $max_c1 = $row[0];

// mencari nilai max c2
$result = $koneksi->query('SELECT MAX(C1),MAX(C2),MAX(C3),MAX(C4),MAX(C5) FROM penilaian ORDER BY id_penilaian ASC');
while ($row = mysqli_fetch_row($result))
    $max_c2 = $row[1];

// mencari nilai max c3
$result = $koneksi->query('SELECT MAX(C1),MAX(C2),MAX(C3),MAX(C4),MAX(C5) FROM penilaian ORDER BY id_penilaian ASC');
while ($row = mysqli_fetch_row($result))
    $max_c3 = $row[2];

// mencari nilai max c4
$result = $koneksi->query('SELECT MAX(C1),MAX(C2),MAX(C3),MAX(C4),MAX(C5) FROM penilaian ORDER BY id_penilaian ASC');
while ($row = mysqli_fetch_row($result))
    $max_c4 = $row[3];

// mencari nilai max c4
$result = $koneksi->query('SELECT MAX(C1),MAX(C2),MAX(C3),MAX(C4),MAX(C5) FROM penilaian ORDER BY id_penilaian ASC');
while ($row = mysqli_fetch_row($result))
   $max_c5 = $row[4];

// ambil bobot kriteria

$result = $koneksi->query('SELECT bobot FROM kriteria WHERE id_kriteria=2');
while ($row = mysqli_fetch_row($result))
   $bobot1 = $row[0];
   
   $result = $koneksi->query('SELECT bobot FROM kriteria WHERE id_kriteria=3');
while ($row = mysqli_fetch_row($result))
   $bobot2 = $row[0];
   
   $result = $koneksi->query('SELECT bobot FROM kriteria WHERE id_kriteria=4');
while ($row = mysqli_fetch_row($result))
   $bobot3 = $row[0];
   
   $result = $koneksi->query('SELECT bobot FROM kriteria WHERE id_kriteria=5');
while ($row = mysqli_fetch_row($result))
   $bobot4 = $row[0];
   
   $result = $koneksi->query('SELECT bobot FROM kriteria WHERE id_kriteria=6');
while ($row = mysqli_fetch_row($result))
   $bobot5 = $row[0];
   
//    mengambil nilai alternatif
   $alternatif = [];
$result = $koneksi->query('SELECT * FROM calon_pelatih ORDER BY id_calon_pelatih ASC');
$index = 0;
while ($row = mysqli_fetch_array($result)) :
    $alternatif['id_calon_pelatih'][$index] = $row['id_calon_pelatih'];
    $alternatif['nama'][$index] = $row['nama'];

    $index += 1;
endwhile;
?>

<h4>Nilai Max </h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $max_c1 ?></td>
            <td><?php echo $max_c2 ?></td>
            <td><?php echo $max_c3 ?></td>
            <td><?php echo $max_c4 ?></td>
            <td><?php echo $max_c5 ?></td>
        </tr>
    </tbody>
</table>

<h4>Normalisasi Matriks</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM penilaian "); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $normal_1 =round($pecah['C1']/$max_c1,4) ?></td>
            <td><?php echo $normal_2 =round($pecah['C2']/$max_c2,4) ?></td>
            <td><?php echo $normal_3 =round($pecah['C3']/$max_c3,4)?></td>
            <td><?php echo $normal_4 =round($pecah['C4']/$max_c4,4) ?></td>
            <td><?php echo $normal_5 =round($pecah['C5']/$max_c5,4)?></td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<!-- <h4>Nilai WMS</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>total</th>
        </tr>
    </thead>
    <tbody> -->
<!-- 1 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih =1 "); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<!-- <tr> -->
<!-- <td>1</td> -->
<?php  $wsm_1 =round($pecah['C1']/$max_c1,4)* $bobot1?>
<?php  $wsm_2 =round($pecah['C2']/$max_c2,4)* $bobot2 ?> <?php  $wsm_3 =round($pecah['C3']/$max_c3,4)* $bobot3?>
<?php  $wsm_4 =round($pecah['C4']/$max_c4,4)* $bobot4 ?> <?php  $wsm_5 =round($pecah['C5']/$max_c5,4)* $bobot5?>
<?php  $jumlah_wsm1 = 0.5*($wsm_1+$wsm_2+$wsm_3+$wsm_4+$wsm_5)?>

<?php } ?>
<!-- 2 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih =2 "); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>2</td> -->
    <td><?php  $wsm_1 =round($pecah['C1']/$max_c1,4)* $bobot1?></td>
    <td><?php  $wsm_2 =round($pecah['C2']/$max_c2,4)* $bobot2 ?></td>
    <td><?php  $wsm_3 =round($pecah['C3']/$max_c3,4)* $bobot3?></td>
    <td><?php  $wsm_4 =round($pecah['C4']/$max_c4,4)* $bobot4 ?></td>
    <td><?php  $wsm_5 =round($pecah['C5']/$max_c5,4)* $bobot5?></td>
    <td><?php  $jumlah_wsm2 = 0.5*($wsm_1+$wsm_2+$wsm_3+$wsm_4+$wsm_5)?></td>
</tr>
<?php } ?>
<!-- 3 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih =3 "); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>3</td> -->
    <td><?php  $wsm_1 =round($pecah['C1']/$max_c1,4)* $bobot1?></td>
    <td><?php  $wsm_2 =round($pecah['C2']/$max_c2,4)* $bobot2 ?></td>
    <td><?php  $wsm_3 =round($pecah['C3']/$max_c3,4)* $bobot3?></td>
    <td><?php  $wsm_4 =round($pecah['C4']/$max_c4,4)* $bobot4 ?></td>
    <td><?php  $wsm_5 =round($pecah['C5']/$max_c5,4)* $bobot5?></td>
    <td><?php  $jumlah_wsm3 = 0.5*($wsm_1+$wsm_2+$wsm_3+$wsm_4+$wsm_5)?></td>
</tr>
<?php } ?>
<!-- 4 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih =4 "); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>1</td> -->
    <td><?php  $wsm_1 =round($pecah['C1']/$max_c1,4)* $bobot1?></td>
    <td><?php  $wsm_2 =round($pecah['C2']/$max_c2,4)* $bobot2 ?></td>
    <td><?php  $wsm_3 =round($pecah['C3']/$max_c3,4)* $bobot3?></td>
    <td><?php  $wsm_4 =round($pecah['C4']/$max_c4,4)* $bobot4 ?></td>
    <td><?php  $wsm_5 =round($pecah['C5']/$max_c5,4)* $bobot5?></td>
    <td><?php  $jumlah_wsm4 = 0.5*($wsm_1+$wsm_2+$wsm_3+$wsm_4+$wsm_5)?></td>
</tr>
<?php } ?>
<?php $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih =5 "); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>5</td> -->
    <td><?php  $wsm_1 =round($pecah['C1']/$max_c1,4)* $bobot1?></td>
    <td><?php  $wsm_2 =round($pecah['C2']/$max_c2,4)* $bobot2 ?></td>
    <td><?php  $wsm_3 =round($pecah['C3']/$max_c3,4)* $bobot3?></td>
    <td><?php  $wsm_4 =round($pecah['C4']/$max_c4,4)* $bobot4 ?></td>
    <td><?php  $wsm_5 =round($pecah['C5']/$max_c5,4)* $bobot5?></td>
    <td><?php  $jumlah_wsm5 = 0.5*($wsm_1+$wsm_2+$wsm_3+$wsm_4+$wsm_5)?></td>
</tr>
<?php } ?>
<?php $ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_calon_pelatih =6 "); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>6</td> -->
    <td><?php  $wsm_1 =round($pecah['C1']/$max_c1,4)* $bobot1?></td>
    <td><?php  $wsm_2 =round($pecah['C2']/$max_c2,4)* $bobot2 ?></td>
    <td><?php  $wsm_3 =round($pecah['C3']/$max_c3,4)* $bobot3?></td>
    <td><?php  $wsm_4 =round($pecah['C4']/$max_c4,4)* $bobot4 ?></td>
    <td><?php  $wsm_5 =round($pecah['C5']/$max_c5,4)* $bobot5?></td>
    <td><?php  $jumlah_wsm6 = 0.5*($wsm_1+$wsm_2+$wsm_3+$wsm_4+$wsm_5)?></td>
</tr>
<?php } ?>
<!-- </tbody>
</table>
<h4>Nilai WMP</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>jumlah</th>
        </tr>
    </thead>
    <tbody> -->
<!--1  -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian  WHERE id_calon_pelatih =1"); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>1</td> -->
    <td><?php  $wsp_1 =pow(round($pecah['C1']/$max_c1,4),$bobot1)?></td>
    <td><?php  $wsp_2 =pow(round($pecah['C2']/$max_c2,4), $bobot2) ?></td>
    <td><?php  $wsp_3 =pow(round($pecah['C3']/$max_c3,4), $bobot3)?></td>
    <td><?php  $wsp_4 =pow(round($pecah['C4']/$max_c4,4), $bobot4) ?></td>
    <td><?php  $wsp_5 =pow(round($pecah['C5']/$max_c5,4), $bobot5)?></td>
    <td><?php  $jumlah_wsp1 = round(0.5*($wsp_1*$wsp_2*$wsp_3*$wsp_4*$wsp_5),3)?></td>
</tr>
<?php ?>
<?php } ;?>

<!-- 2 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian  WHERE id_calon_pelatih =2"); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>2</td> -->
    <td><?php  $wsp_1 =pow(round($pecah['C1']/$max_c1,4),$bobot1)?></td>
    <td><?php  $wsp_2 =pow(round($pecah['C2']/$max_c2,4), $bobot2) ?></td>
    <td><?php  $wsp_3 =pow(round($pecah['C3']/$max_c3,4), $bobot3)?></td>
    <td><?php  $wsp_4 =pow(round($pecah['C4']/$max_c4,4), $bobot4) ?></td>
    <td><?php  $wsp_5 =pow(round($pecah['C5']/$max_c5,4), $bobot5)?></td>
    <td name="jumlah_wsp2"><?php  $jumlah_wsp2 = round(0.5*($wsp_1*$wsp_2*$wsp_3*$wsp_4*$wsp_5),3)?></td>
</tr>
<?php ?>
<?php } ;
         ?>
<!-- 3 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian  WHERE id_calon_pelatih =3"); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>3</td> -->
    <td><?php  $wsp_1 =pow(round($pecah['C1']/$max_c1,4),$bobot1)?></td>
    <td><?php  $wsp_2 =pow(round($pecah['C2']/$max_c2,4), $bobot2) ?></td>
    <td><?php  $wsp_3 =pow(round($pecah['C3']/$max_c3,4), $bobot3)?></td>
    <td><?php  $wsp_4 =pow(round($pecah['C4']/$max_c4,4), $bobot4) ?></td>
    <td><?php  $wsp_5 =pow(round($pecah['C5']/$max_c5,4), $bobot5)?></td>
    <td name="jumlah_wsp3"><?php  $jumlah_wsp3 = round(0.5*($wsp_1*$wsp_2*$wsp_3*$wsp_4*$wsp_5),3)?></td>
</tr>
<?php ?>
<?php } ;
         ?>
<!-- 4 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian  WHERE id_calon_pelatih =4"); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>4</td> -->
    <td><?php  $wsp_1 =pow(round($pecah['C1']/$max_c1,4),$bobot1)?></td>
    <td><?php  $wsp_2 =pow(round($pecah['C2']/$max_c2,4), $bobot2) ?></td>
    <td><?php  $wsp_3 =pow(round($pecah['C3']/$max_c3,4), $bobot3)?></td>
    <td><?php  $wsp_4 =pow(round($pecah['C4']/$max_c4,4), $bobot4) ?></td>
    <td><?php  $wsp_5 =pow(round($pecah['C5']/$max_c5,4), $bobot5)?></td>
    <td><?php  $jumlah_wsp4 = round(0.5*($wsp_1*$wsp_2*$wsp_3*$wsp_4*$wsp_5),3)?></td>
</tr>
<?php ?>
<?php } ;
               ?>
<!-- 5 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian  WHERE id_calon_pelatih =5"); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>5</td> -->
    <td><?php  $wsp_1 =pow(round($pecah['C1']/$max_c1,4),$bobot1)?></td>
    <td><?php  $wsp_2 =pow(round($pecah['C2']/$max_c2,4), $bobot2) ?></td>
    <td><?php  $wsp_3 =pow(round($pecah['C3']/$max_c3,4), $bobot3)?></td>
    <td><?php  $wsp_4 =pow(round($pecah['C4']/$max_c4,4), $bobot4) ?></td>
    <td><?php  $wsp_5 =pow(round($pecah['C5']/$max_c5,4), $bobot5)?></td>
    <td><?php  $jumlah_wsp5 = round(0.5*($wsp_1*$wsp_2*$wsp_3*$wsp_4*$wsp_5),3)?></td>
</tr>
<?php ?>
<?php } ;
         ?>
<!-- 6 -->
<?php $ambil = $koneksi->query("SELECT * FROM penilaian  WHERE id_calon_pelatih =6"); ?>
<?php while ($pecah = $ambil->fetch_assoc()) { ?>
<tr>
    <!-- <td>6</td> -->
    <td><?php  $wsp_1 =pow(round($pecah['C1']/$max_c1,4),$bobot1)?></td>
    <td><?php  $wsp_2 =pow(round($pecah['C2']/$max_c2,4), $bobot2) ?></td>
    <td><?php  $wsp_3 =pow(round($pecah['C3']/$max_c3,4), $bobot3)?></td>
    <td><?php  $wsp_4 =pow(round($pecah['C4']/$max_c4,4), $bobot4) ?></td>
    <td><?php  $wsp_5 =pow(round($pecah['C5']/$max_c5,4), $bobot5)?></td>
    <td><?php  $jumlah_wsp6 = round(0.5*($wsp_1*$wsp_2*$wsp_3*$wsp_4*$wsp_5),3)?></td>
</tr>
<?php ?>
<?php } ;?>
<!-- 7 -->

</tbody>
</table>
<?php $hasil1 = round($jumlah_wsp1+$jumlah_wsm1,3);
        $hasil2 = round($jumlah_wsp2+$jumlah_wsm2,3);
        $hasil3 = round($jumlah_wsp3+$jumlah_wsm3,3);
        $hasil4 = round($jumlah_wsp4+$jumlah_wsm4,3);
        $hasil5 = round($jumlah_wsp5+$jumlah_wsm5,3);
        $hasil6 = round($jumlah_wsp6+$jumlah_wsm6,3);

        $koneksi->query('UPDATE penilaian SET  hasil="' .  $hasil1 . '"  WHERE id_calon_pelatih=1');
        $koneksi->query('UPDATE penilaian SET  hasil="' .  $hasil2 . '"  WHERE id_calon_pelatih=2');
        $koneksi->query('UPDATE penilaian SET  hasil="' .  $hasil3 . '"  WHERE id_calon_pelatih=3');
        $koneksi->query('UPDATE penilaian SET  hasil="' .  $hasil4 . '"  WHERE id_calon_pelatih=4');
        $koneksi->query('UPDATE penilaian SET  hasil="' .  $hasil5 . '"  WHERE id_calon_pelatih=5');
        $koneksi->query('UPDATE penilaian SET  hasil="' .  $hasil6 . '"  WHERE id_calon_pelatih=6');
        $koneksi->query('UPDATE calon_pelatih SET  hasil="' .  $hasil1 . '"  WHERE id_calon_pelatih=1');
        $koneksi->query('UPDATE calon_pelatih SET  hasil="' .  $hasil2 . '"  WHERE id_calon_pelatih=2');
        $koneksi->query('UPDATE calon_pelatih SET  hasil="' .  $hasil3 . '"  WHERE id_calon_pelatih=3');
        $koneksi->query('UPDATE calon_pelatih SET  hasil="' .  $hasil4 . '"  WHERE id_calon_pelatih=4');
        $koneksi->query('UPDATE calon_pelatih SET  hasil="' .  $hasil5 . '"  WHERE id_calon_pelatih=5');
        $koneksi->query('UPDATE calon_pelatih SET  hasil="' .  $hasil6 . '"  WHERE id_calon_pelatih=6');
        ?>

<h4>Nilai Q</h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Pelatih</th>
            <th>Hasil</th>
            <th>rangkin</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; 
        $ambil = $koneksi->query("SELECT *,FIND_IN_SET( hasil, (SELECT GROUP_CONCAT( hasil ORDER BY hasil DESC ) FROM
        calon_pelatih )) AS ranking FROM calon_pelatih");?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php echo $pecah['hasil']; ?></td>
            <td><?php echo $pecah['ranking']; ?></td>
            <?php $nomor++; ?>
            <?php } ?>
        </tr>
    </tbody>
</table>
<a href="index.php?halaman=laporan" class="btn btn-success">Lihat Laporan </a>