<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Jenis Dokumen</h1>
    </div>
    <a href="<?php echo base_url('admin/jenis/tambah_jenis')?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Jenis Dokumen</a>

    <?php echo $this->session->flashdata('pesan4') ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th width="20px">No</th>
                <th>Jenis Dokumen</th>
                <th>Kode Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $no=1;
            foreach($jenis as $jen) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $jen->jenis_dok ?></td>
                    <td><?php echo $jen->kode_jenis ?></td>
                    <td>
                        <a href="<?php echo base_url("admin/jenis/edit/").$jen->id_jenis ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/jenis/hapus/").$jen->id_jenis ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </section>
</div>