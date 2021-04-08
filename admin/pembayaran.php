<h1>Konfirmasi Pembayaran</h1>
<a href="index.php?halaman=pembelian" class=" btn btn-warning  pull-right" > << Kembali </a>
<h2>Detail Pembayaran</h2>

<!-- mendapatkan id pembelian  -->
<?php 
$id_pembelian = $_GET['id'];

$ambil=$koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama Penyetor</th>
                <th><?php echo $detail['nama'] ?></th>
            </tr>
            <tr>
                <th>No Rekening</th>
                <th><?php echo $detail['no_rek'] ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $detail['bank'] ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th>Rp. <?php echo number_format($detail['jumlah'])?></th>
            </tr>
            <tr>
                <th>Tanggal Pembayaran</th>
                <th><?php echo date ('d F Y', strtotime($detail['tanggal']));?></th>
            </tr>
        </table>
    </div> 
     <div class="col-md-6">
         <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
     </div>  
</div>
<form method="post">
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="ket" class="form-control">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
        <option value=""> >Pilih Status< </option>
        <option value="Selesai"> Selesai </option>
        <option value="Barang Dikirim"> Barang Dikirim </option>
         <option value="Batal"> Batal </option>
     </select>
    </div>
    <a href="index.php?halaman=pembelian" class="btn-warning btn"> << Kembali </a>
    <button class="btn btn-primary" name="proses">Proses</button>

</form>
<?php 
if (isset($_POST["proses"])) {
    $ket=$_POST["ket"];
    $status=$_POST["status"];
    $koneksi ->query("UPDATE pembelian SET ket='$ket', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
echo "<script>alert('status telah diperbaharui');</script>";
echo "<script>location='index.php?halaman=pembelian' ;</script>";


}

?>