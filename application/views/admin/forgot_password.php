<script src="<?php echo base_url('assets/js/admin/login.js')?>"></script>
  <body class="" id="body" data-url="<?php echo base_url();?>">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="<?= base_url('admin') ?>">
                  <img src="<?= base_url('') ?>" alt="">
                  <span class="brand-name">Forgot Password</span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Forgot Password</h4>
              <form action="<?= base_url('admin/validate-email') ?>" method="post" id="forget_pass" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-12 mb-5">
                    <input type="email" class="form-control input-lg" placeholder="Enter Your Email" name="email">
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Reset Password</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>

</body>
</html>