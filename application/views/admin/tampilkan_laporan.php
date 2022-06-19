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
          <option value="All">Semua Jenis</option>
            <?php foreach($jenis as $jen) : ?>
              <option value="<?php echo $jen->kode_jenis?>"><?php echo $jen->jenis_dok ?></option>
            <?php endforeach; ?>
        </select>  
      </div>

      <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Tampilkan</button>
  </form>
    <div class="btn-group">
      <a class="btn btn-sm btn-dark mt-5" target="_blank" href="<?php echo base_url().'admin/laporan/print_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai').'&jenis_dokumen='.set_value('jenis_dokumen') ?>"><i class="fas fa-print"></i> Print Laporan</a>
    </div>

    <table class="table table-bordered table-striped table-responsive mt-3">
      <tr>
        <th>No</th>
        <th>Nama Dokumen</th>
        <th>Jenis Dokumen</th>
        <th>Kode Dokumen</th>
        <th>Tanggal Input</th>
        <th>Tahun</th>
        <th>Keterangan</th>
        <th>Nama File</th>
      </tr>

      <?php 
      $no = 1;
      foreach($laporan as $lap): ?>
          <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $lap->nama_dok ?></td>
              <td><?php echo $lap->kode_jenis ?></td>
              <td><?php echo $lap->kode_dok ?></td>
              <td><?php echo date('d/m/Y', strtotime($lap->tanggal_input)) ?></td>
              <td><?php echo $lap->tahun ?></td>
              <td><?php echo $lap->keterangan ?></td>
              <td><?php echo $lap->file ?></td>
          </tr>
      <?php endforeach; ?>
    </table>
</div>