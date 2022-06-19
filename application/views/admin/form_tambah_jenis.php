<div class="main-content">
  <section class="section">
        <div class="section-header">
            <h1>Form Input Jenis Dokumen</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?php echo base_url('admin/jenis/tambah_jenis_aksi') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Dokumen</label>
                                <input type="text" name="jenis_dok" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Kode Jenis Dokumen</label>
                                <input type="text" name="kode_jenis" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-4">Simpan</button>
                            <a href="<?php echo base_url('admin/jenis')?>" type="submit" class="btn btn-sm btn-danger mt-4 ml-2">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>