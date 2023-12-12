<?php 
  
  //menyertakan file program koneksi.php pada register
  include "header.php";
//inisialisasi session

?>



  <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Login</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>

<section class="py-5">
  <div class="container">
       <div class="card" id="forms">
          <div class="card-header bg-dark text-white text-center">Silahkan Login Member</div>
          <div class="card-body shadow">
            <form method="POST" action="proses_login.php">
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-check form-group">
                  <input class="form-check-input" id="checkbox-1" type="checkbox">
                  <label class="form-check-label" for="checkbox-1">Check me out</label>
                  <a href="register.php">Belum memiliki akun?, Silahkan daftar terlebih dahulu</a>
                </div>
                <button class="btn btn-primary justify-content-center" value="submit" type="submit">Sign In</button>
              </fieldset>
            </form>
           
            
           </div>
          </div>
        </div>

  </div>
 
</section>
 
 <!-- footer -->
<?php 

include 'footer.php';

?>