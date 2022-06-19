<!-- <img src="<?php echo base_url('assets/img/jateng.png')?>" style="width: 7%;" class="d-flex align-items-stretch">
<h3 class="text-center">Dinas Pemberdayaan Masyarakat, Desa, Kependudukan dan Pencatatan Sipil <br> Provinsi Jawa Tengah</h3>

<hr> -->
<h2 style="text-align: center; margin-top:20px">Laporan Arsip Dokumen Digital</h2>

<table class="mt-5 mb-5">
    <tr>
      <td>Dari Tanggal</td>
      <td>:</td>
      <td><?php echo date('d-M-Y', strtotime($_GET['dari']));?></td>
    </tr>
    <tr>
      <td>Sampai Tanggal</td>
      <td>:</td>
      <td><?php echo date('d-M-Y', strtotime($_GET['sampai']));?></td>
    </tr>
    <tr>
      <td>Jenis Dokumen</td>
      <td>:</td>
      <td><?php 
        if($_GET['jenis_dokumen']=='1'){
          echo "Semua Jenis";
        }else{
          echo $_GET['jenis_dokumen'];
        }
      ?></td>
    </tr>
</table>

<table class="table table-bordered table-striped mt-3">
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

<footer class="footer text-center mt-5">
  <div class="container px-4 px-lg-5">Copyright &copy; 2022 <div class="bullet"></div>Dispermadesdukcapil Provinsi Jawa Tengah</div>
</footer>

<script type="text/javascript">
    window.print();
</script>