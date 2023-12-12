<?php 
	
	include "inc/header.php";

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
									<div class="card-title">Tambah Produk</div>
								</div>
								<div class="card-body">
									<form method="POST" action="simpan_produk.php" enctype="multipart/form-data">


									<div class="form-group">
										<label>Nama Produk</label>
										<input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required oninvalid="this.setCustomValidity('Nama Produk belum diisi')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Nama Kategori</label>
										<select name="id_kategori" class="form-control">
											<option value="">--Pilih Kategori--</option>
											<?php 
											$query = mysqli_query($koneksi,"SELECT * FROM kategori order by nama_kategori ASC")or die(mysqli_error());
											while($data = mysqli_fetch_array($query)){
											?>
											<option value="<?php echo $data['id_kategori'] ?>"><?php echo $data['nama_kategori'] ?></option>
										<?php
										}
										?>
											
										</select>
									</div>


									<div class="form-group">
										<label>Harga</label>
										<input type="text" onkeypress="return hanyaAngka(event)"  class="form-control" name="harga" required oninvalid="this.setCustomValidity('Harga belum diisi')" oninput="setCustomValidity('')" placeholder="Harga">
									</div>


									<div class="form-group">
										<label>Jumlah Stok</label>
										<input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="jumlah_stok" required oninvalid="this.setCustomValidity('Jumlah Stok belum diisi')" oninput="setCustomValidity('')" placeholder="Jumlah Stok">
									</div>

									<div class="form-group">
										<label>Deskripsi</label>
										<textarea name="deskripsi" class="form-control" cols="20" rows="7" required oninvalid="this.setCustomValidity('Deskripsi produk belum diisi')" oninput="setCustomValidity('')"></textarea>
									</div>

								
									<div class="form-group">
										<label>Foto</label>
										<input type="file" class="form-control" name="foto" placeholder="Logo" required oninvalid="this.setCustomValidity('Foto belum dilampirkan')" oninput="setCustomValidity('')">
									</div>
									
								</div>
								<div class="card-action">
									<input type="submit" class="btn btn-success" name="upload" value="Simpan">
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
			<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>
					
<?php  
	include "inc/footer.php";
	
?>