<?php

$ambil = $koneksi->query("SELECT * FROM calon_pelatih WHERE id_calon_pelatih='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM calon_pelatih WHERE id_calon_pelatih='$_GET[id]'");

echo "<script>alert('Data telah di hapus ');</script>";
echo "<script>location='index.php?halaman=calonPelatih';</script>";
?>