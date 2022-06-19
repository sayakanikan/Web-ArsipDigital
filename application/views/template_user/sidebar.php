<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a class="nav-link nav-link-lg nav-link-user btn btn-warning">
            <div class="d-sm-none d-lg-inline-block">Welcome, <?php echo $this->session->userdata('nama') ?></div></a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">E - Arsip</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="<?php echo base_url('assets/img/jateng.png') ?>" style="width: 40%;"></a>
          </div>
          <ul class="sidebar-menu">
            <li><a class="nav-link active" href="<?php echo base_url('user/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

            <li><a class="nav-link" href="<?php echo base_url('user/dokumen') ?>"><i class="fas fa-archive"></i> <span>Arsip Dokumen</span></a></li>

            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>Akun Anda</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('auth/ganti_password_user')?>"><i class="fas fa-lock"></i> <span>Ganti Password</span></a></li>
                <li><a class="nav-link" href="<?php echo base_url('auth/logout')?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
              </ul>
            </li>
            
          </ul>
        </aside>
      </div>