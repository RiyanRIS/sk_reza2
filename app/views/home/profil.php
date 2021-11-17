<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- PROFIL -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>PROFIL</h3>
        <form action="<?= site_url('home/aksi_profil') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="logo_lembaga" value="<?= $data['profil']['logo_lembaga'] ?>">
        <input type="hidden" name="logo_kampus" value="<?= $data['profil']['logo_kampus'] ?>">
          <div class="form-group">
            <label for="sistem">NAMA SISTEM</label>
            <input type="text"
              class="form-control" required="true" name="sistem" id="sistem" aria-describedby="sistem" value="<?= $data['profil']['sistem'] ?>" placeholder="NAMA SISTEM">
          </div>

          <div class="form-group">
            <label for="lembaga">NAMA LEMBAGA</label>
            <input type="text"
              class="form-control" required="true" name="lembaga" id="lembaga" aria-describedby="lembaga" value="<?= $data['profil']['lembaga'] ?>" placeholder="NAMA LEMBAGA">
          </div>

          <div class="form-group">
            <label for="kabinet">NAMA KABINET</label>
            <input type="text"
              class="form-control" required="true" name="kabinet" id="kabinet" aria-describedby="kabinet" value="<?= $data['profil']['kabinet'] ?>" placeholder="NAMA KABINET">
          </div>

          <div class="form-group">
            <label for="kampus">NAMA KAMPUS</label>
            <input type="text"
              class="form-control" required="true" name="kampus" id="kampus" aria-describedby="kampus" value="<?= $data['profil']['kampus'] ?>" placeholder="NAMA KAMPUS">
          </div>

          <div class="form-group">
            <label for="penjelasan">PENJELASAN</label>
            <input type="text"
              class="form-control" required="true" name="penjelasan" id="penjelasan" aria-describedby="penjelasan" value="<?= $data['profil']['penjelasan'] ?>" placeholder="PENJELASAN">
          </div>

          <div class="form-group">
            <label for="logo_lembaga">LOGO LEMBAGA</label>
            <input type="file" name="img_lembaga">

          </div>

          <div class="form-group">
            <label for="logo_kampus">LOGO KAMPUS</label>
           <input type="file" name="img_kampus">
          </div>

          <?php if(isAdmin()){ ?>
          
          <input name="btn_simpan" id="btn_simpan" class="btn btn-primary" type="submit" value="Simpan"> <a href="<?= site_url('home') ?>" class="btn btn-danger">Batal</a>

          <?php } ?>

        </form>
      </div>
    </div>

    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>TAHUN PERIODE</h3>
        <table class="table table-bordered">
          <tr>
            <th>Tahun</th>
            <th>Nama Periode</th>
            <th>Surat Keputusan</th>
            <th>Hapus Data</th>
          </tr>
          <?php foreach ($data['periode'] as $key) { ?>
          <tr>
            <td><?= $key['tahun'] ?></td>
            <td><?= $key['nama'] ?></td>
            <td><a target="_BLANK" href="<?= toUrl("file_sk", $key['sk']) ?>">download file sk</a></td>
            <td><a href="<?= site_url("home/hapus_periode/". $key['id']) ?>">hapus</a></td>
          </tr>
          <?php } ?>
        
        </table>
      </div>
    </div>

    
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>INPUT PERIODE</h3>
        <form action="<?= site_url('home/aksi_periode') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="tahunn">Tahun</label>
            <input type="text"
              class="form-control" required="true" name="tahun" id="tahunn" aria-describedby="sistem" placeholder="2020/2021">
          </div>

          <div class="form-group">
            <label for="namaa">NAMA KABINET</label>
            <input type="text"
              class="form-control" required="true" name="nama" id="namaa" aria-describedby="nama" placeholder="NAMA KABINET">
          </div>
          
          <div class="form-group">
            <label for="sk">SURAT KEPUTUSAN</label>
            <input type="file" name="sk">
          </div>

          <?php if(isAdmin()){ ?>
          
          <input name="btn_simpann" id="btn_simpann" class="btn btn-primary" type="submit" value="Simpan"> <a href="<?= site_url('home') ?>" class="btn btn-danger">Batal</a>

          <?php } ?>

        </form>
      </div>
    </div>

  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>