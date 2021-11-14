<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA USER -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>Hapus Data User</h3>
        <form action="<?= site_url('user/aksi_delete') ?>" method="post">
        <input type="hidden" name="id" <?= val("user_delete", "id") ?>>
          
          <div class="form-group">
            <label for="nama">NAMA USER</label>
            <input type="text"
              class="form-control" disabled="true" required="true" name="nama" id="nama" aria-describedby="helpNamaUser" placeholder="Beri Nama Pada User" <?= val("user_delete", "nama") ?>>
          </div>

          <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text"
              class="form-control" disabled="true" required="true" name="username" id="username" aria-describedby="helpNamaUser" placeholder="Username" <?= val("user_delete", "username") ?>>
          </div>

          <input name="btn_simpan" id="btn_simpan" class="btn btn-primary" type="submit" value="Hapus"> <a href="<?= site_url('user') ?>" class="btn btn-danger">Batal</a>
        </form>

        
      </div>
    </div>

  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>