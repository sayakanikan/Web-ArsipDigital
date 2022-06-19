<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Form Edit Dokumen</h1>
    </div>
    <div class="card">
      <div class="card-body">
          <?php foreach($dokumen as $dok) : ?>
              <?php echo form_open_multipart('admin/dokumen/edit_dokumen_aksi') ?>
                  <div class="row">
                      <div class="col-md-6">

                          <div class="form-group">
                              <label>Nama Dokumen</label>
                              <input type="hidden" name="id_dok" class="form-control" value="<?php echo $dok->id_dok ?>">
                              <input type="text" name="nama_dok" class="form-control" value="<?php echo $dok->nama_dok ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Jenis Dokumen</label>
                              <select name="kode_jenis" class="form-control" required>
                                  <option value="<?php echo $dok->kode_jenis ?>" readonly hidden><?php echo $dok->jenis_dok ?></option>
                                  <?php foreach($jenis as $jen) : ?>
                                      <option value="<?php echo $jen->kode_jenis?>"><?php echo $jen->jenis_dok ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Kode Dokumen</label>
                              <input type="text" name="kode_dok" class="form-control" value="<?php echo $dok->kode_dok ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Tanggal Update</label>
                              <input type="date"  name="tanggal_input" value="<?php echo date('Y-m-d');?>" class="form-control" readonly>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Tahun Pembuatan Dokumen</label>
                              <input type="number" name="tahun" class="form-control" min="1900" max="2099" step="1" value="<?php echo $dok->tahun ?>" required>      
                          </div>

                          <div class="form-group">
                              <label>Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" value="<?php echo $dok->keterangan ?>" required>  
                          </div>

                          <div class="form-group">
                              <label>File</label>
                              <input type="file" name="file" class="form-control">
                          </div>

                          <button type="submit" class="btn btn-sm btn-primary mt-4">Simpan</button>
                          <a href="<?php echo base_url('admin/dokumen')?>" type="submit" class="btn btn-sm btn-danger mt-4 ml-2">Batal</a>
                      </div>
                  </div>
              <?php echo form_close(); ?>
          <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>