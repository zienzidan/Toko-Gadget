<?php 

include "header.php";

$query = mysqli_query($koneksi, "SELECT * FROM page WHERE id_page = '2'");
$row_query = mysqli_fetch_array($query); 
               

?>

<!-- HERO SECTION-->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
      <div class="col-lg-6">
      	<input type="hidden" name="id_page" class="form-control" value="<?php echo $row_query['id_page']; ?>">
        <h1 class="h2 text-uppercase mb-0"><?php echo $row_query['nama']; ?></h1>
      </div>
      <div class="col-lg-6 text-lg-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $row_query['nama']; ?></li>
            </ol>
          </nav>
      </div>
    </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
  <div class="card mb-3">
  <div class="row no-gutters">
   
    <div class="col-md-12">
      <div class="card-body shadow bg-white rounded">
        
        <div class="text-center">
        	  <img src="<?php echo 'admin/upload/page/'.$row_query['gambar']?>" alt="Foto Page" width="100px">  
        </div>
      	<hr>
        <p class="card-text"><?php echo $row_query['konten']; ?></p>

       
      </div>
    </div>
  </div>
</div>
</div>


</section>













<?php 

include "footer.php";

?>