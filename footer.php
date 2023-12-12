 <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Layanan Pelanggan</h6>
              <ul class="list-unstyled mb-0">
              
                <li><a class="footer-link" href="cara_belanja.php">Cara Belanja</a></li>
                <li><a class="footer-link" href="terms_condition.php">Terms &amp; Conditions</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Contact Us</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#">No. Hp</a></li>
                <li><a class="footer-link" href="#">Emai</a></li>
                <li><a class="footer-link" href="#">Alamat</a></li>
              </ul>
            </div>
            <?php 
              $query = mysqli_query($koneksi, "SELECT * FROM social_media order by id_social ASC");
              while ($data = mysqli_fetch_array($query)) {
            ?>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="<?php echo $data['facebook'] ?>">Facebook</a></li>
                <li><a class="footer-link" href="<?php echo $data['instagram'] ?>">Instagram</a></li>
                <li><a class="footer-link" href="<?php echo $data['youtube'] ?>">Youtube</a></li>
              </ul>
            </div>
          <?php } ?>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-lg-6">
                <p class="small text-muted mb-0">&copy; <?php echo date('Y') ?> All rights reserved.</p>
              </div>
              <div class="col-lg-6 text-lg-right">
                <p class="small text-muted mb-0">Developed and Design by <a class="text-white reset-anchor" href="#">WebVer</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- JavaScript files-->
      <script src="assets/vendor/jquery/jquery.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/lightbox2/js/lightbox.min.js"></script>
      <script src="assets/vendor/nouislider/nouislider.min.js"></script>
      <script src="assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="assets/vendor/owl.carousel2/owl.carousel.min.js"></script>
      <script src="assets/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
      <script src="assets/js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>