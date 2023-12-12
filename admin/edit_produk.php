<!-- Header -->
<?php 
	
	include "inc/header.php";


	// mengecek apakah di url ada nilai get id
if (isset($_GET['id_produk'])) {
    // ambil nilai no admin dari url dan disimpan dalam variabel $id_metode
    $id = ($_GET["id_produk"]);

    // menampilkan data dari database yang mempunyai id_metode=$id
    $query = "SELECT * FROM produk WHERE id_produk='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apakah data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database'); window.location.href='produk.php';</script>";
    }
} else {
    // apabila tidak ada data GET no admin pada akan di redirect ke profile.php
    echo "<script>alert('Masukkan data Produk.');window.location='produk.php';</script>";
}

?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Produk</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Produk</div>
								</div>
								<div class="card-body">
									<form method="POST" action="update_produk.php" enctype="multipart/form-data">

								
									<div class="form-group">
										<label>Nama Produk</label>
										<input type="hidden" name="id_produk" class="form-control" value="<?php echo $data['id_produk']; ?>">
										<input type="text" class="form-control" value="<?php echo $data['nama_produk']; ?>" name="nama_produk" placeholder="Nama Produk">
									</div>

									<div class="form-group">
										<label>Kategori</label>
										<select name="id_kategori" class="form-control">
											<option value="">--Pilih Kategori--</option>
											 <?php
									        $query = mysqli_query($koneksi, "SELECT * from kategori order by nama_kategori asc");
									        while ($row = mysqli_fetch_array($query)) {
									            if($data[id_kategori]==$row[id_kategori]){
									            echo "<option value=$row[id_kategori] selected>$row[nama_kategori]</option>";
									        }else{
									            echo "<option value=$row[id_kategori]>$row[nama_kategori]</option>";
									        } }?>
										</select>
									</div>

									<div class="form-group">
										<label>Harga</label>
										<input type="text" class="form-control" value="<?php echo $data['harga']; ?>" name="harga" placeholder="Harga">
									</div>

									<div class="form-group">
										<label>Stok</label>
										<input type="text" class="form-control" value="<?php echo $data['jumlah_stok']; ?>" name="jumlah_stok" placeholder="Jumlah Stok">
									</div>

									<div class="form-group">
										<label>Deskripsi</label>
										<textarea name="deskripsi" class="form-control" cols="30" rows="7"><?php echo $data['deskripsi'] ?></textarea>
									</div>

									<div class="form-group">
										<label for="">Foto Sebelumnya :</label><br>
										<img src="<?php echo 'upload/produk/'.$data['foto']?>" alt="Foto Produk" width="100px">
									</div>
									
									<div class="form-group">
										<label>Foto</label>
										<input type="file" class="form-control" value="<?php echo $data['foto']; ?>" name="file" placeholder="Logo">
										<small class="text-muted"><i>Kosongkan jika tidak ingin diganti.</i></small>
										 <input type="hidden" name="lama" value="<?php echo $data['foto']; ?>">
									</div>
									
								</div>
								<div class="card-action">
									<input type="submit" class="btn btn-success" name="upload" value="Update">
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="produk.php" class="btn btn-info">Kembali</a>
								</div>
							</form>

							</div>
						</div>

					</div>
				
				</div>

			</div>
			
		</div>
		
	
	</div>
</div>

<?php 
	include "inc/footer.php";

?>