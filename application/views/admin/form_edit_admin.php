<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Form Edit Akun Admin</h1>
    </div>
    <div class="card">
      <div class="card-body">
          <?php foreach($admin as $adm) : ?>
                <?php echo form_open_multipart('admin/kelola_admin/edit_admin_aksi') ?>
              <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="ml-3">
                  Penggantian Password hanya bisa dilakukan oleh admin bersangkutan!
                </div>
              </div>
                  <div class="row">
                      <div class="col-md-6">

                          <div class="form-group">
                              <label>Nama</label>
                              <input type="hidden" name="id_admin" class="form-control" value="<?php echo $adm->id_admin ?>">
                              <input type="text" name="nama" class="form-control" value="<?php echo $adm->nama ?>" required>
                          </div>

                          <div class="form-group">
                              <label>NIP</label>
                              <input type="text" name="nip" class="form-control" value="<?php echo $adm->nip ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Agama</label>
                                <select name="agama" class="form-control" required>
                                    <option <?php if($adm->agama == "Islam"){echo "selected='selected'";}  echo $adm->agama; ?> value="Islam">Islam</option>
                                    <option <?php if($adm->agama == "Kristen") {echo "selected='selected'";}  echo $adm->agama; ?> value="Kristen">Kristen</option>
                                    <option <?php if($adm->agama == "Katolik") {echo "selected='selected'";}  echo $adm->agama; ?> value="Katolik">Katolik</option>
                                    <option <?php if($adm->agama == "Hindu") {echo "selected='selected'";}  echo $adm->agama; ?> value="Hindu">Hindu</option>
                                    <option <?php if($adm->agama == "Buddha") {echo "selected='selected'";}  echo $adm->agama; ?> value="Buddha">Buddha</option>
                                    <option <?php if($adm->agama == "Kong Hu Cu") {echo "selected='selected'";}  echo $adm->agama; ?> value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                          </div>

                          <div class="form-group">
                              <label>Tempat, Tanggal Lahir</label>
                              <input type="text"  name="ttl" value="<?php echo $adm->ttl ?>" class="form-control" required>
                          </div>

                          <div class="form-group">
                              <label>Gender</label>
                              <select name="gender" class="form-control" required>
                                  <option <?php if($adm->gender == "L"){echo "selected='selected'";} 
                                  echo $adm->gender; ?> value="L">Laki - Laki</option>
                                  <option <?php if($adm->gender == "P") {echo "selected='selected'";} 
                                  echo $adm->gender; ?> value="P">Perempuan</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" name="alamat" class="form-control" value="<?php echo $adm->alamat ?>" required>      
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Telpon</label>
                              <input type="number" name="telpon" class="form-control" value="<?php echo $adm->telpon ?>" required>      
                          </div>

                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control" value="<?php echo $adm->email ?>" required>      
                          </div>

                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" value="<?php echo $adm->username ?>">      
                          </div>

                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control" value="<?php echo $adm->password ?>" disabled>      
                          </div>

                          <div class="form-group">
                              <label>Foto Profil</label>
                              <input type="file" name="foto_profil" class="form-control" value="<?php echo $adm->foto_profil?>">
                          </div>

                          <button type="submit" class="btn btn-sm btn-primary mt-4">Simpan</button>
                          <a href="<?php echo base_url('admin/kelola_admin')?>" type="submit" class="btn btn-sm btn-danger mt-4 ml-2">Batal</a>
                      </div>
                  </div>
              <?php echo form_close(); ?>
          <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>