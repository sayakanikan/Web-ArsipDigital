<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/img/jateng.png'); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-dark">
              <div class="card-header"><h5>Ganti Password</h5></div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url('auth/ganti_password_user_aksi') ?>" >
                  <div class="form-group">
                    <label for="pass_baru">Password Baru</label>
                    <input id="pass_baru" type="password" class="form-control" name="pass_baru" tabindex="1" autofocus placeholder="Password Baru" required>
                    <?php echo form_error('pass_baru','<span class="text-small text-danger">','</span>') ?>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="ulang_pass" class="control-label">Ulangi Password</label>
                    </div>
                    <input id="ulang_pass" type="password" class="form-control" name="ulang_pass" tabindex="2" placeholder="Ulangi Password" required>
                    <?php echo form_error('ulang_pass','<span class="text-small text-danger">','</span>') ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Ganti Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; <a href="https://dispermadesdukcapil.jatengprov.go.id/">Dispermadesdukcapil Jawa Tengah</a> 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>