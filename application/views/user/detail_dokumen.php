<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Dokumen</h1>
        </div>
    </section>
    <?php foreach($detail as $dt) :?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <th>Nama Dokumen</th>
                                <td><?php echo $dt->nama_dok ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Dokumen</th>
                                <td>
                                    <?php foreach($jenis as $jen) :?>
                                        <?php 
                                            if($jen->kode_jenis == $dt->kode_jenis){
                                                echo $jen->jenis_dok;
                                                break;
                                            }
                                        ?>
                                    <?php endforeach; ?>    
                                </td>
                            </tr>
                            <tr>
                                <th>Kode Dokumen</th>
                                <td><?php echo $dt->kode_dok ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Input</th>
                                <td><?php echo date('d-m-Y', strtotime($dt->tanggal_input)) ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Pembuatan Dokumen</th>
                                <td><?php echo $dt->tahun ?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><?php echo $dt->keterangan ?></td>
                            </tr>
                            <tr>
                                <th>File</th>
                                <td><?php echo $dt->file ?></td>
                            </tr>
                        </table>
                        <a href="<?php echo base_url('user/dokumen/unduh/'.$dt->id_dok) ?>" class="btn btn-sm btn-success ml-2">Unduh</a>
                        <a href="<?php echo base_url('user/dokumen') ?>" class="btn btn-sm btn-danger ml-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>