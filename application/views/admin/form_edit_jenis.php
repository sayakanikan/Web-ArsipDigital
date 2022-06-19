<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Form Edit Jenis Dokumen</h1>
    </div>
    <div class="card">
      <div class="card-body">
          <?php foreach($jenis as $jen) : ?>
              <form method="post" action="<?php echo base_url('admin/jenis/edit_jenis_aksi') ?>">
                  <div class="row">
                      <div class="col-md-6">

                          <div class="form-group">
                              <label>Jenis Dokumen</label>
                              <input type="hidden" name="id_jenis" class="form-control" value="<?php echo $jen->id_jenis ?>">
                              <input type="text" name="jenis_dok" class="form-control" value="<?php echo $jen->jenis_dok ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Kode Jenis Dokumen</label>
                              <input type="text" name="kode_jenis" class="form-control" value="<?php echo $jen->kode_jenis ?>" required>
                          </div>

                          <button type="submit" class="btn btn-sm btn-primary mt-4">Simpan</button>
                          <a href="<?php echo base_url('admin/jenis')?>" type="submit" class="btn btn-sm btn-danger mt-4 ml-2">Batal</a>
                      </div>
                  </div>
              </form>
          <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>