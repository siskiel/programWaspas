<?php

$ambil = $koneksi->query("SELECT * FROM kriteria WHERE id_kriteria='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM kriteria WHERE id_kriteria='$_GET[id]'");

echo "<script>alert('Data Kriteria telah terhapus ');</script>";
echo "<script>location='index.php?halaman=kriteria';</script>";
?>