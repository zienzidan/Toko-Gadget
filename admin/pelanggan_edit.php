<!-- Header -->
<?php 
	
	include "inc/header.php";


	// mengecek apakah di url ada nilai get id
if (isset($_GET['id_pelanggan'])) {
    // ambil nilai no admin dari url dan disimpan dalam variabel $id_metode
    $id = ($_GET["id_pelanggan"]);

    // menampilkan data dari database yang mempunyai id_metode=$id
    $query = "SELECT * FROM pelanggan WHERE id_pelanggan='$id'";
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
        echo "<script>alert('Data tidak ditemukan pada database'); window.location.href='pelanggan.php';</script>";
    }
} else {
    // apabila tidak ada data GET no admin pada akan di redirect ke profile.php
    echo "<script>alert('Masukkan data Pelangggan.');window.location='pelanggan.php';</script>";
}

?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Pelanggan</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Pelanggan</div>
								</div>
								<div class="card-body">
									<form method="POST" action="pelanggan_update.php">

								
									<div class="form-group">
										<label>Nama Pelanggan :</label>
									    <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan'];?>">
									    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" required oninvalid="this.setCustomValidity('Nama pelanggan belum diisi')" oninput="setCustomValidity('')" value="<?php echo $data['nm_pelanggan'];?>">
									</div>

									<div class="form-group">
									    <label>No. HP :</label>
									    <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="hp" id="hp" placeholder="Nomor HP" required oninvalid="this.setCustomValidity('Nomor HP belum diisi')" oninput="setCustomValidity('')" value="<?php echo $data['hp'];?>">
									</div>

									<div class="form-group">
									    <label>Email :</label>
									    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email belum diisi')" oninput="setCustomValidity('')" value="<?php echo $data['email'];?>">
									</div>

									<div class="form-group">
									    <label>Nama Kota :</label>
									    <select name="kota" class="form-control" onchange="changeValue(this.value)" required oninvalid="this.setCustomValidity('Kota belum dipilih')" oninput="setCustomValidity('')">
									        <option value="">-Pilih-</option>
									        <?php
									        $query2 = mysqli_query($koneksi, "SELECT * from ongkir order by kota asc");
									        while ($row = mysqli_fetch_array($query2)) {
									            if($data[id_ongkir]==$row[id_ongkir]){
									            echo "<option value=$row[id_ongkir] selected>$row[kota]</option>";
									        }else{
									            echo "<option value=$row[id_ongkir]>$row[kota]</option>";
									        } }?>
									    </select>
									</div>

									<div class="form-group">
									    <label>Alamat :</label>
									    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat belum diisi')" oninput="setCustomValidity('')"><?php echo $data['alamat'];?></textarea>
									</div>
									
								</div>
								<div class="card-action">
									<input type="submit" class="btn btn-success" name="upload" value="Update">
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="pelanggan.php" class="btn btn-info">Kembali</a>
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