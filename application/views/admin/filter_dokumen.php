<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Arsip Dokumen</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a href="<?php echo base_url('admin/dokumen/tambah_dokumen')?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i>     Tambah Dokumen</a>

        <button class="btn btn-sm btn-dark mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-filter"></i> Filter</button>

        <div class="navbar-form mb-3">
            <?php echo form_open('admin/dokumen/search') ?>
            <input type="text" id="keyword" name="keyword"class="form-control" placeholder="Cari Dokumen...">
            <?php echo form_close() ?>
        </div>
    </div>
        
    <?php echo $this->session->flashdata('pesan2') ?>

    <table class="table table-hover table-striped table-bordered">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama Dokumen</th>
              <th>Jenis Dokumen</th>
              <th>Kode Dokumen</th>
              <th>Tanggal Input</th>
              <th>Tahun</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php 
          $no = 1;
          foreach($filter as $fil) : ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td>
                      <?php echo $fil->nama_dok ?>
                  </td>
                  <td>
                      <?php foreach($jenis as $jn) :?>
                          <?php 
                              if($jn->kode_jenis == $fil->kode_jenis){
                                  echo $jn->jenis_dok;
                                  break;
                              }
                          ?>
                      <?php endforeach; ?>  
                  </td>
                  <td><?php echo $fil->kode_dok ?></td>
                  <td><?php echo $fil->tanggal_input ?></td>
                  <td><?php echo $fil->tahun ?></td>
                  <td>
                      <a href="<?php echo base_url("admin/dokumen/detail/").$fil->id_dok ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                      <a href="<?php echo base_url('admin/dokumen/unduh/'.$fil->id_dok) ?>" class="btn btn-sm btn-success"><i class="fas fa-download"></i></a>
                      <a href="<?php echo base_url("admin/dokumen/edit/").$fil->id_dok ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                      <a href="<?php echo base_url("admin/dokumen/hapus/").$fil->id_dok ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
              </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</div>