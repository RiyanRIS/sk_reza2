<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA USER -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">

        <h3>Tambah Data User</h3>
        <form action="<?= site_url('user/aksi_add') ?>" method="post">

          <div class="form-group">
            <label for="nama">NAMA USER</label>
            <input type="text"
              class="form-control" required="true" name="nama" id="nama" aria-describedby="helpNamaUser" placeholder="Beri Nama Pada User" <?= val("user_add", "nama") ?>>
          </div>

          <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text"
              class="form-control <?= cekMsgError("username") ?>" required="true" name="username" id="username" aria-describedby="helpNamaUser" placeholder="Username" <?= val("user_add", "username") ?>>
              <div class="invalid-feedback">
                <?= getMsgError("username") ?>
              </div>
          </div>

          <div class="form-group">
            <label for="role">ROLE</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" required="true" name="role" id="gridRadios1" <?= val_radio("user_add", "role", "admin") ?> value="admin">
              <label class="form-check-label" for="gridRadios1">
                Admin
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" required="true" name="role" id="gridRadios2" <?= val_radio("user_add", "role", "anggota") ?> value="anggota">
              <label class="form-check-label" for="gridRadios2">
                Anggota
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password"
              class="form-control <?= cekMsgError("password") ?>" required="true" name="password" id="password" aria-describedby="pass" placeholder="Password">
              <div class="invalid-feedback">
                <?= getMsgError("password") ?>
              </div>
          </div>

          <div class="form-group">
            <label for="password2">KONFIRMASI PASSWORD</label>
            <input type="password"
              class="form-control" required="true" name="password2" id="password2" aria-describedby="pass1" placeholder="Konfirmasi Password">
          </div>
          
          <input name="btn_simpan" id="btn_simpan" class="btn btn-primary" type="submit" value="Simpan"> <a href="<?= site_url('user') ?>" class="btn btn-danger">Batal</a>
        </form>

        
      </div>
    </div>

  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>