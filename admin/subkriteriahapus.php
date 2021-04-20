<?php

$ambil = $koneksi->query("SELECT * FROM sub_kriteria WHERE id_sub_kriteria='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM sub_kriteria WHERE id_sub_kriteria='$_GET[id]'");

echo "<script>alert('data sub kriteria telah di hapus? ');</script>";
echo "<script>location='index.php?halaman=subkriteria';</script>";
?>