<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan Arsip</h1>
    </div>
  </section>

  <form method="post" action="<?php echo base_url('admin/laporan/tampilkan_laporan') ?>">
      <div class="form-group">
        <label>Dari tanggal</label>
        <input type="date" name="dari" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Sampai tanggal</label>
        <input type="date" name="sampai" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Jenis Dokumen</label>
        <select name="jenis_dokumen" class="form-control" required>
          <option value="1">Semua Jenis</option>
            <?php foreach($jenis as $jen) : ?>
              <option value="<?php echo $jen->kode_jenis?>"><?php echo $jen->jenis_dok ?></option>
            <?php endforeach; ?>
        </select>  
      </div>

      <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Tampilkan</button>
  </form>
</div>