<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
            <p class="navbar-brand"><img src="<?php echo base_url('assets/img/jateng.png')?>" style="width: 30%"> </p>
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">E-Arsip</span></h4>
            </div>

            <div class="card card-dark">
              <div class="card-header"><h5>Login</h5></div>
              <span><?php echo $this->session->flashdata('pesan') ?></span>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url('auth/login') ?>" >
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" autofocus placeholder="Username" required>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Password" required>
                    <div class="float-right mb-3">
                      <a href="<?php echo base_url('auth/forgot')?>" class="text-dark text-small">
                        Lupa Password?
                      </a>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>