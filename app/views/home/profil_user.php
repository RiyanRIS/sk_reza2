<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA PROFIL -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>Detail Profil</h3>

        <table class="table table-bordered">
          <tr>
            <td colspan="2" style="text-align:center"><h1><?= $data['profil']['lembaga'] ?> <br><?= $data['profil']['kampus'] ?></h1></td>
          </tr>
          <tr>
            <td><img width="120px" src="<?= toUrl("img_lembaga", $data['profil']['logo_lembaga']) ?>"></td>
            <td><h4><?= $data['profil']['penjelasan'] ?></h4></td>
          </tr>
        </table>
        <a href="<?= site_url('home') ?>" class="btn btn-primary w-25">Kembali</a>
      </div>
    </div>

  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>