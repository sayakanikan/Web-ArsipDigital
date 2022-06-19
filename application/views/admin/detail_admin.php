<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Admin</h1>
        </div>
    </section>
    <?php foreach($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mt-5">
                        <img width="250px" src="<?php echo base_url().'assets/upload/profil_admin/'.$dt->foto_profil ?>">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $dt->nama ?></td>
                            </tr>

                            <tr>
                                <th>NIP</th>
                                <td><?php echo $dt->nip ?></td>
                            </tr>

                            <tr>
                                <th>Agama</th>
                                <td><?php echo $dt->agama ?></td>
                            </tr>

                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td><?php echo $dt->ttl ?></td>
                            </tr>

                            <tr>
                                <th>Gender</th>
                                <td>
                                    <?php 
                                        if($dt->gender == "L"){
                                            echo "Laki - laki";
                                        }elseif($dt->gender == "P"){
                                            echo "Perempuan";
                                        }
                                    ?>    
                                </td>
                            </tr>

                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $dt->alamat ?></td>
                            </tr>

                            <tr>
                                <th>Telpon</th>
                                <td><?php echo $dt->telpon ?></td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td><?php echo $dt->email ?></td>
                            </tr>

                            <tr>
                                <th>Username</th>
                                <td><?php echo $dt->username ?></td>
                            </tr>
                        </table>
                        <a href="<?php echo base_url('admin/kelola_admin/edit/'.$dt->id_admin) ?>" class="btn btn-sm btn-primary ml-4">Edit</a>
                        <a href="<?php echo base_url('admin/kelola_admin') ?>" class="btn btn-sm btn-danger ml-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>