<?php 
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["kirim"])) 
{
    $tgl_mulai=$_POST["tglm"];
    $tgl_selesai=$_POST["tgls"];
    $ambil=$koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
        pm.id_pelanggan=pl.id_pelanggan WHERE tgl_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    while ($pecah = $ambil->fetch_assoc()) 
    {
        $semuadata[]=$pecah;
    }
    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";
}
?>

<h2> Laporan Pembelian <?php echo date ('d F Y', strtotime($tgl_mulai)) ?> Hingga <?php echo date ('d F Y', strtotime($tgl_selesai)); ?>  </h2>
<hr>
<form method="post">
    <div class="col-md-5">
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="tglm" value="<?php echo  $tgl_mulai?>" class="form-control">
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tgls"  value="<?php echo  $tgl_selesai?>" class="form-control">
        </div>
    </div>
    <div class="col-md-2">
        <br>
        <button class="btn btn-primary" name="kirim">Lihat</button>
        <!-- <a href="cetaklaporan.php" class="btn btn-warning" target="_blank">Print </a>  -->
       <!--  <input type="submit" class="form-control" name="cetaklaporan" class="btn btn-primary" value="Cetak"> -->
    </div>  

</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total Pembelian</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ; ?>
        <?php  foreach ($semuadata as $key =>$value) :?>
            <?php $total+=$value['total_pembelian']?>
        <tr>
            <td><?php echo $key+1;?></td>
            <td><?php echo $value["nama_pelanggan"];?></td>
            <td><?php echo date ('d F Y', strtotime($value["tgl_pembelian"]));?></td>
            <td>Rp. <?php echo  number_format($value["total_pembelian"]);?></td>
            <td><?php echo $value["status_pembelian"];?></td>
        </tr>
        <?php endforeach ?>

    </tbody>
    <tfoot>
        <tr>
        <th colspan="3">Total</th>
        <th>Rp. <?php echo number_format($total) ?></th>
        <th></th>
        </tr>
    </tfoot>
</table>
