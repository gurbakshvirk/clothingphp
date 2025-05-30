    <!-- <footer class="footer pt-8 mt-auto">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">

             <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">About US</a>
              </li>
               <li class="nav-item">
                <a href="" class="nav-link pe-0 text-muted" target="_blank">Services</a>
              </li>
               <li class="nav-item">
                <a href="" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link pe-0 text-muted" target="_blank">About</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer> -->
  </main>
  <footer class="footer mt-auto pt-4 bg-light">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <ul class="nav nav-footer justify-content-center">
          <li class="nav-item">
            <a href="#" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link pe-0 text-muted" target="_blank">About</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>


  <script src="./assets/js/jquery-3.7.1.min.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/smooth-scrollbar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="./assets/js/custom.js"></script>

  
  <!-- 💡 Required JS for Material Dashboard to toggle sidebar -->
<!-- <script src="../assets/js/core/popper.min.js"></script> -->
<!-- <script src="../assets/js/core/bootstrap.min.js"></script> -->
<!-- <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script> -->
<!-- <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> -->
<script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>


  

  <!-- Alertify js -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<script>
  <?php
  if(isset($_SESSION['message']))
  {
  ?>
  alertify.set('notifier','position', 'top-right');
  alertify.success('<?=$_SESSION['message'];?>');
  <?PHP
  unset($_SESSION['message']);
   }
   ?>
</script>

</body>

</html>