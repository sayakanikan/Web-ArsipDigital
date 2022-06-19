<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Arsip Dokumen</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <button class="btn btn-sm btn-dark mb-2" data-toggle="modal" data-target="#filter"><i class="fas fa-filter"></i> Filter</button>

        <div class="navbar-form mb-3">
            <?php echo form_open('user/dokumen/search') ?>
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
                foreach($dokumen as $dok) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                            <?php echo $dok->nama_dok ?>
                        </td>
                        <td>
                            <?php foreach($jenis as $jn) :?>
                                <?php 
                                    if($jn->kode_jenis == $dok->kode_jenis){
                                        echo $jn->jenis_dok;
                                        break;
                                    }
                                ?>
                            <?php endforeach; ?>  
                        </td>
                        <td><?php echo $dok->kode_dok ?></td>
                        <td><?php echo date('d-m-Y', strtotime($dok->tanggal_input)) ?></td>
                        <td><?php echo $dok->tahun ?></td>
                        <td>
                            <a href="<?php echo base_url("user/dokumen/detail/").$dok->id_dok ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                            <a href="<?php echo base_url('user/dokumen/unduh/'.$dok->id_dok) ?>" class="btn btn-sm btn-success"><i class="fas fa-download"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter Dokumen</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'user/dokumen/filter';?>" method="post" enctype="multipart/form-data">
        	<div class="form-group">
        		<label>Jenis Dokumen</label>
        		<select name="kode_jenis" class="form-control" required>
                    <option selected disabled hidden value="">--Pilih Jenis Dokumen--</option>
                    <?php foreach($jenis as $jen) : ?>
                        <option value="<?php echo $jen->kode_jenis?>"><?php echo $jen->jenis_dok ?></option>
                    <?php endforeach; ?>
                </select>
        	</div>

        	<div class="form-group">
        		<label>Tahun Pembuatan Dokumen</label>
        		<input type="number" name="tahun" min="1900" max="2099" step="1" class="form-control" required>
        	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-dark"><i class="fas fa-filter"></i> Filter</button>
      </div>
      </form>

    </div>
  </div>
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