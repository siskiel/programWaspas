<h2> Data Kriteria</h2>
<a href="cetakproduk.php" class="btn btn-warning" target="_blank">Cetak Semua Data </a> 
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Calon Komandan</th>
            <th>Kode Kriteria</th>
            <th>Kriteria</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;
        $c=1;?>
        <?php $ambil=$koneksi->query("SELECT * FROM calon_komandan JOIN penilaian ON 
         calon_komandan.id_calon_komandan=penilaian.id_calon_komandan");?>
        <?php while($pecah = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php echo $pecah['kode_kriteria'];?></td>
            <td><?php echo $pecah['nama_kriteria'];?></td>
            <td><?php echo $pecah['C3'];?></td>
            <td><?php echo $pecah['C4'];?></td>
            <td><?php echo $pecah['C5'];?></td>
            <td><?php echo $pecah['C6'];?></td>
            <td><?php echo $pecah['C7'];?></td>
                  <td><?php echo $pecah['C8'];?></td>
                   <td><?php echo $pecah['C9'];?></td>
                    <td><?php echo $pecah['C10'];?></td>
                     <td><?php echo $pecah['C11'];?></td>
                      <td><?php echo $pecah['C12'];?></td>
                       <td><?php echo $pecah['C13'];?></td>
                        <td><?php echo $pecah['C14'];?></td>
                         <td><?php echo $pecah['C15'];?></td>
                          <td><?php echo $pecah['C16'];?></td>
                           <td><?php echo $pecah['C17'];?></td>
                            <td><?php echo $pecah['C18'];?></td>
                             <td><?php echo $pecah['C19'];?></td>
                              <td><?php echo $pecah['C20'];?></td>
                               <td><?php echo $pecah['C21'];?></td>
                                <td><?php echo $pecah['C22'];?></td>           
                       
                <a href="index.php?halaman=kriteriaubah&id=<?php echo $pecah['id_kriteria'];?>" class="btn-warning btn">Edit</a>
                <a href="index.php?halaman=kriteriahapus&id=<?php echo $pecah['id_kriteria'];?>" class="btn-danger btn" onclick="return confirm('Apakah yakin ingin menghapus data kriteria?');" >Hapus</a>
            </td> 
        </tr>
        <?php $nomor++;
        $c++;?>
        <?php }?>
    </tbody>
</table>