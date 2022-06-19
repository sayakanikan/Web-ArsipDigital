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
              <div class="card-header"><h5>Lupa Password</h5></div>
              <span><?php echo $this->session->flashdata('pesan404') ?></span>
              <div class="card-body">
                <p class="text-muted">Link reset password akan dikirimkan ke email</p>
                <form method="POST" action="<?php echo base_url('auth/forgot_password_aksi')?>">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Reset Password
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