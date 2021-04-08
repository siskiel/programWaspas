<?php

$ambil = $koneksi->query("SELECT * FROM penilaian WHERE id_penilaian='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM penilaian WHERE id_penilaian='$_GET[id]'");

echo "<script>alert('Apakah Ingin menghapus penilaian? ');</script>";
echo "<script>location='index.php?halaman=penilaian';</script>";
?>