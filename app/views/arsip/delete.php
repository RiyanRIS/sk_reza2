<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA ARSIP -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>Hapus Data Arsip</h3>
        <form action="<?= site_url('arsip/aksi_delete') ?>" method="post">
        <input type="hidden" name="id" <?= val("arsip_delete", "id") ?>>

          <div class="form-group">
            <label for="id_arsip">KODE ARSIP</label>
            <input type="text"
              class="form-control" disabled="true" name="id_arsip2" id="id_arsip" aria-describedby="helpIdArsip" <?= val("arsip_delete", "kode") ?> placeholder="ID ARSIP">
            <small id="helpIdArsip" class="form-text text-muted">Kode khusus untuk masing masing arsip.</small>
          </div>
          <div class="form-group">
            <label for="nama_arsip">NAMA ARSIP</label>
            <input type="text"
              class="form-control" disabled="true" name="nama_arsip" id="nama_arsip" aria-describedby="helpNamaArsip" <?= val("arsip_delete", "nama") ?> placeholder="Beri Nama Pada Arsip">
          </div>
          <input name="btn_simpan" id="btn_simpan" class="btn btn-primary" type="submit" value="Hapus"> <a href="<?= site_url('arsip') ?>" class="btn btn-danger">Batal</a>
        </form>

        
      </div>
    </div>

  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>