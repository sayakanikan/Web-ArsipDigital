<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="<?php echo base_url('admin/kelola_admin')?>">
            <div class="card-icon bg-primary">
              <i class="fas fa-user-cog"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              <?php echo $admin ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="<?php echo base_url('admin/dokumen')?>">
            <div class="card-icon bg-danger">
              <i class="fas fa-file-alt"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Dokumen</h4>
            </div>
            <div class="card-body">
              <?php echo $dokumen; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="<?php echo base_url('admin/kelola_user')?>">
            <div class="card-icon bg-warning">
              <i class="fas fa-user"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Akun User</h4>
            </div>
            <div class="card-body">
              <?php echo $user ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="">
            <div class="card-icon bg-success">
              <i class="fas fa-download"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Unduhan</h4>
            </div>
            <div class="card-body">
              10
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-success mt-3" role="alert">
          <h4 class="alert-heading">Selamat Datang!</h4>
          <p>Selamat datang,<b> <?php echo $this->session->userdata('nama');?> </b> pada halaman admin E-Arsip Dispermadesdukcapil Provinsi Jawa Tengah anda sekarang mempunyai akses pengarsipan dokumen pada web E-Arsip, anda bisa menambah, mengubah, dan menghapus dokumen yang akan bisa di lihat oleh semua pegawai berstatus user di aplikasi ini.</p>
          <hr>
          <p class="mb-0">Mohon gunakan halaman admin ini dengan bijak agar tidak merugikan bagi anda dan Dispermades Jawa Tengah. Terimakasih.</p>
        </div>
      </div>
    </div>
  </section>
</div>