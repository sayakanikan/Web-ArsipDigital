<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Akun Admin</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a href="<?php echo base_url('admin/kelola_admin/tambah_admin')?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Admin</a>

        <div class="navbar-form mb-3">
            <?php echo form_open('admin/kelola_admin/search') ?>
            <input type="text" id="keyword" name="keyword"class="form-control" placeholder="Cari Admin...">
            <?php echo form_close() ?>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan10') ?>

    <table class="table table-hover table-striped table-bordered">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Gender</th>
              <th>Telpon</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php 
          $no = 1;
          foreach($admin as $adm) : ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td>
                      <?php echo $adm->nama ?>
                  </td>
                  <td>
                    <?php echo $adm->nip ?>
                  </td>
                  <td>
                    <?php if($adm->gender == "L"){
                      echo "Laki - laki";
                    }elseif ($adm->gender == "P"){
                      echo "Perempuan";
                    }?>  
                  </td>
                  <td>
                    <?php echo $adm->telpon ?>
                  </td>
                  <td>
                      <a href="<?php echo base_url("admin/kelola_admin/detail/").$adm->id_admin ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                      <a href="<?php echo base_url("admin/kelola_admin/edit/").$adm->id_admin ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                      <a href="<?php echo base_url("admin/kelola_admin/hapus/").$adm->id_admin ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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