<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA ARSIP -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>Detail Arsip</h3>

        <table class="table table-bordered">
          <tr>
            <td><h1><?= $_SESSION['arsip_detail']['nama'] ?></h1></td>
            <td><a href="<?= toUrl("arsip", $_SESSION['arsip_detail']['file']) ?>">download</a></td>
          </tr>
          <tr>
            <td colspan="2"><?= ($_SESSION['arsip_detail']['catatan'] == "" ? "catatan kosong" : $_SESSION['arsip_detail']['catatan']) ?></td>
          </tr>
        </table>
        <a href="<?= site_url('arsip') ?>" class="btn btn-primary w-25">Kembali</a>
      </div>
    </div>

  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>