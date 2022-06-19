<div class="main-content">
  <section class="section">
        <div class="section-header">
            <h1>Form Tambah User</h1>
        </div>

        <div class="card">
            <div class="card-body">
            <?php echo form_open_multipart('admin/kelola_user/tambah_user_aksi') ?>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>NIP</label>
                                <input type="number" name="nip" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" class="form-control" required>
                                    <option selected disabled hidden>--Pilih Agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tempat, Tanggal Lahir</label>
                                <input type="text" name="ttl" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option selected disabled hidden>--Pilih Gender--</option>
                                    <option value="L">Laki - laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telpon</label>
                                <input type="number" name="telpon" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Bagian</label>
                                <select name="bagian" class="form-control" required>
                                    <option selected disabled hidden>--Pilih Bagian--</option>
                                    <option value="Sekertariat">Sekertariat</option>
                                    <option value="Keuangan">Keuangan</option>
                                    <option value="Kepegawaian">Kepegawaian</option>
                                    <option value="IT">IT</option>
                                    <option value="Operasional">Operasional</option>
                                    <option value="Tata Usaha">Tata Usaha</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Upload Foto Profil</label>
                                <input type="file" name="foto_profil" class="form-control" required> 
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary mt-4">Simpan</button>
                            <a href="<?php echo base_url('admin/kelola_user')?>" type="submit" class="btn btn-sm btn-danger mt-4 ml-2">Batal</a>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>