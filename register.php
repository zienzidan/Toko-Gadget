<?php 
 include "header.php";
  
  
?>



  <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Register</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>

<section class="py-5">
  <div class="container">
       <div class="card " id="forms">
          <div class="card-header bg-dark text-white text-center">Register Pelanggan</div>
          <div class="card-body shadow">
            <form method="POST" action="pelanggan_simpan.php">
                
              <div class="row">
             
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail">Nama Lengkap</label>
                  <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'" required>
                </div>

                <div class="col-md-6 form-group">
                  <label for="">Kota</label>
                  <select class="form-control w-100" name="kota" id="kota" required>
                    <option value="">Pilih Kota</option>
                    <?php
                    include 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * from ongkir order by kota asc");
                    while ($row = mysqli_fetch_array($query)) {
                      echo "<option value=$row[id_ongkir]>$row[kota]</option>";
                    } ?>
                  </select>
              </div>

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail">Alamat</label>
                  <textarea class="form-control" type="text" name="alamat" cols="30" rows="5" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'" required></textarea>
                </div>

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail">No.Hp</label>
                  <input class="form-control" type="text" name="hp" placeholder="Nomor Hp" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Hp'" required>
                </div>


                <div class="form-group col-md-6">
                  <label for="exampleInputEmail">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Email'" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="exampleInputPassword">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                 
                </div>

                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword">Confirm Password</label>
                  <input class="form-control" type="password" name="confirm" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required>
                 
                </div>  
                
              </div>       
                
                <div class="form-check form-group">
                  
                  <a href="login.php">Sudah memiliki akun?, Silahkan login</a>
                </div>
                <button class="btn btn-primary justify-content-center" name="submit" type="submit">Register</button>
              </fieldset>
            </form>
           
            
           </div>
          </div>
        </div>

  </div>
 
</section>
 <!-- Footer -->
 <?php 
  include "footer.php";

?>