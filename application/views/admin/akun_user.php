<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Akun User</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a href="<?php echo base_url('admin/kelola_user/tambah_user')?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah User</a>

        <div class="navbar-form mb-3">
            <?php echo form_open('admin/kelola_user/search') ?>
            <input type="text" id="keyword" name="keyword"class="form-control" placeholder="Cari User...">
            <?php echo form_close() ?>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan6') ?>

    <table class="table table-hover table-striped table-bordered">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Gender</th>
              <th>Bagian</th>
              <th>Telpon</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php 
          $no = 1;
          foreach($user as $usr) : ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td>
                      <?php echo $usr->nama ?>
                  </td>
                  <td>
                    <?php echo $usr->nip ?>
                  </td>
                  <td>
                    <?php if($usr->gender == "L"){
                      echo "Laki - laki";
                    }elseif ($usr->gender == "P"){
                      echo "Perempuan";
                    }?>  
                  </td>
                  <td>
                    <?php echo $usr->bagian ?>
                  </td>
                  <td>
                    <?php echo $usr->telpon ?>
                  </td>
                  <td>
                      <a href="<?php echo base_url("admin/kelola_user/detail/").$usr->id_user ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                      <a href="<?php echo base_url("admin/kelola_user/edit/").$usr->id_user ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                      <a href="<?php echo base_url("admin/kelola_user/hapus/").$usr->id_user ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
              </tr>
          <?php endforeach; ?>
      </tbody>
    </table>

  </section>
</div>

<script>
    var input = document.getElementById("keyword");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("myBtn").click();
        }
    });
</script>