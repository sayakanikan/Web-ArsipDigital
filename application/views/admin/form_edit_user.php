<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Form Edit Akun User</h1>
    </div>
    <div class="card">
      <div class="card-body">
          <?php foreach($user as $usr) : ?>
              <?php echo form_open_multipart('admin/kelola_user/edit_user_aksi') ?>
              <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="ml-3">
                  Penggantian Password hanya bisa dilakukan oleh user bersangkutan!
                </div>
              </div>
                  <div class="row">
                      <div class="col-md-6">

                          <div class="form-group">
                              <label>Nama</label>
                              <input type="hidden" name="id_user" class="form-control" value="<?php echo $usr->id_user ?>">
                              <input type="text" name="nama" class="form-control" value="<?php echo $usr->nama ?>" required>
                          </div>

                          <div class="form-group">
                              <label>NIP</label>
                              <input type="text" name="nip" class="form-control" value="<?php echo $usr->nip ?>" required>
                          </div>

                          <div class="form-group">
                              <label>Agama</label>
                                <select name="agama" class="form-control" required>
                                    <option <?php if($usr->agama == "Islam"){echo "selected='selected'";}  echo $usr->agama; ?> value="Islam">Islam</option>
                                    <option <?php if($usr->agama == "Kristen") {echo "selected='selected'";}  echo $usr->agama; ?> value="Kristen">Kristen</option>
                                    <option <?php if($usr->agama == "Katolik") {echo "selected='selected'";}  echo $usr->agama; ?> value="Katolik">Katolik</option>
                                    <option <?php if($usr->agama == "Hindu") {echo "selected='selected'";}  echo $usr->agama; ?> value="Hindu">Hindu</option>
                                    <option <?php if($usr->agama == "Buddha") {echo "selected='selected'";}  echo $usr->agama; ?> value="Buddha">Buddha</option>
                                    <option <?php if($usr->agama == "Kong Hu Cu") {echo "selected='selected'";}  echo $usr->agama; ?> value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                          </div>

                          <div class="form-group">
                              <label>Tempat, Tanggal Lahir</label>
                              <input type="text"  name="ttl" value="<?php echo $usr->ttl ?>" class="form-control" required>
                          </div>

                          <div class="form-group">
                              <label>Gender</label>
                              <select name="gender" class="form-control">
                                  <option <?php if($usr->gender == "L"){echo "selected='selected'";} 
                                  echo $usr->gender; ?> value="L">Laki - Laki</option>
                                  <option <?php if($usr->gender == "P") {echo "selected='selected'";} 
                                  echo $usr->gender; ?> value="P">Perempuan</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" name="alamat" class="form-control" value="<?php echo $usr->alamat ?>" required>      
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Telpon</label>
                              <input type="number" name="telpon" class="form-control" value="<?php echo $usr->telpon ?>" required>      
                          </div>

                          <div class="form-group">
                              <label>Bagian</label>
                              <select name="bagian" class="form-control">
                                  <option <?php if($usr->bagian == "Sekertariat"){echo "selected='selected'";} 
                                  echo $usr->bagian; ?> value="Sekertariat">Sekertariat</option>
                                  <option <?php if($usr->bagian == "Keuangan") {echo "selected='selected'";} 
                                  echo $usr->bagian; ?> value="Keuangan">Keuangan</option>
                                  <option <?php if($usr->bagian == "Kepegawaian") {echo "selected='selected'";} 
                                  echo $usr->bagian; ?> value="Kepegawaian">Kepegawaian</option>
                                  <option <?php if($usr->bagian == "IT") {echo "selected='selected'";} 
                                  echo $usr->bagian; ?> value="IT">IT</option>
                                  <option <?php if($usr->bagian == "Operasional") {echo "selected='selected'";} 
                                  echo $usr->bagian; ?> value="Operasional">Operasional</option>
                                  <option <?php if($usr->bagian == "Tata Usaha") {echo "selected='selected'";} 
                                  echo $usr->bagian; ?> value="Tata Usaha">Tata Usaha</option>
                              </select>    
                          </div>

                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control" value="<?php echo $usr->email ?>" required>      
                          </div>

                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" value="<?php echo $usr->username ?>">      
                          </div>

                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control" value="<?php echo $usr->password ?>" disabled>      
                          </div>

                          <div class="form-group">
                              <label>Foto Profil</label>
                              <input type="file" name="foto_profil" class="form-control" value="<?php echo $usr->foto_profil?>">
                          </div>

                          <button type="submit" class="btn btn-sm btn-primary mt-4">Simpan</button>
                          <a href="<?php echo base_url('admin/kelola_user')?>" type="submit" class="btn btn-sm btn-danger mt-4 ml-2">Batal</a>
                      </div>
                  </div>
              <?php echo form_close(); ?>
          <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>