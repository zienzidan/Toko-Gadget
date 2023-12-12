<!-- Header -->
<?php 
	include "inc/header.php";

  if (isset($_POST['addpelanggan'])) 
  {
    $nama = trim(str_replace('  ', ' ',$_POST['nama']));
    $hp = trim(str_replace('  ', ' ',$_POST['hp']));
    $email = trim(str_replace('  ', ' ',$_POST['email']));
    $alamat = trim(str_replace('  ', ' ',$_POST['alamat']));
    $kota=$_POST['kota'];
    $sha1 = sha1(12345678);

    $cek=mysqli_query($koneksi,"SELECT * from pelanggan where email ='$email' or hp='$hp'");
    $num=mysqli_num_rows($cek);
    if($num==0){
    $insert=mysqli_query($koneksi,"INSERT INTO pelanggan VALUES ('','$nama','$alamat','$hp','$email','$sha1','$kota')");
    if($insert){
      echo"<script>alert('Berhasil menambahkan Data'); window.location.href='pelanggan.php' </script> ";
      }else{
        echo"<script>alert('Gagal menambahkan Data'); </script> ";
      }
      }else{
      echo"<script>alert('Email atau nomor hp sudah terdaftar'); </script> ";
    }
    
  }

?>


		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Pelanggan</h4>
					</div>
					 
			
		<div class="row">
						
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header">
            	<h3 class="card-title">Data Pelanggan</h3>
              <a href="#addpelanggan" data-toggle='modal' class="btn btn-info btn-sm pull-right"><i class="fas fa-plus"> Tambah Pelanggan</i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pelanggan</th>
                      <th>Nomor HP</th>
                      <th>Email</th>
                      <th>Kota</th>
                      <th>Alamat</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT pelanggan.id_pelanggan,pelanggan.nm_pelanggan,pelanggan.hp,pelanggan.email,pelanggan.alamat,pelanggan.id_ongkir,ongkir.kota from pelanggan join ongkir on pelanggan.id_ongkir=ongkir.id_ongkir order by nm_pelanggan ASC");
                    if (mysqli_num_rows($query) > 0) { ?>
                      <?php $no = 1;
                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['nm_pelanggan']; ?></td>
                          <td><?php echo $data['hp'];?></td>
                          <td><?php echo $data['email'];?></td>
                          <td><?php echo $data['kota'];?></td>
                          <td><?php echo $data['alamat'];?></td>
                          <td>

                          	<a href="pelanggan_edit.php?id_pelanggan=<?php echo $data['id_pelanggan'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                          	 <a href="pelanggan_hapus.php?id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data ini?')"><i class="fa fa-trash"></i></a>

                          </td>
                        <?php
                        $no++;
                      } ?>
                      <?php } ?>
                        </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
           
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
    

					</div>
				
				</div>
			</div>
			
		</div>
		
		 <!-- modal input -->
      <div id="addpelanggan" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Pelanggan</h4>
            </div>
            <div class="modal-body">
              <form method="post">
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <input name="nama" type="text" class="form-control" equired oninvalid="this.setCustomValidity('Nama Pelanggan belum diisi')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                  <label>Nomor Hp</label>
                  <input name="hp" type="text" class="form-control" equired oninvalid="this.setCustomValidity('Nomor Hp belum diisi')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input name="email" type="email" class="form-control" equired oninvalid="this.setCustomValidity('Email belum diisi')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label>Nama Kota :</label>
                    <select name="kota" class="form-control" onchange="changeValue(this.value)" required oninvalid="this.setCustomValidity('Kota belum dipilih')" oninput="setCustomValidity('')">
                        <option value="">-Pilih-</option>
                        <?php
                        include '../koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * from ongkir order by kota asc");
                        while ($row = mysqli_fetch_array($query)) {
                            echo "<option value=$row[id_ongkir]>$row[kota]</option>";}?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat :</label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat belum diisi')" oninput="setCustomValidity('')"></textarea>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input name="addpelanggan" type="submit" class="btn btn-primary" value="Tambah">
              </div>
            </form>
          </div>
        </div>
      </div>

	</div>
</div>

<?php  
	include "inc/footer.php";

?>