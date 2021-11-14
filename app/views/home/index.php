<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

  <div class="container pt-5">

    <div class="row mb-2 main-content">
      <!-- ARSIP -->
      <div class="col-md-12 mb-3">
        <a href="<?= site_url('arsip') ?>">
          <div class="card box-shadow">
            <div class="card-body">
              <h1>Arsip</h1>
            </div>
          </div>
        </a>
      </div>

      <?php if(isAdmin()){ ?>

      <!-- USER -->
      <div class="col-md-12 mb-3">
        <a href="<?= site_url('user') ?>">
          <div class="card box-shadow">
            <div class="card-body">
              <h1>User</h1>
            </div>
          </div>
        </a>
      </div>

      <?php } ?>

      <!-- Profil -->
      <div class="col-md-12 mb-3">
        <a href="<?= site_url('home/profil') ?>">
          <div class="card box-shadow">
            <div class="card-body">
              <h1>Profil</h1>
            </div>
          </div>
        </a>
      </div>


      <!-- Logout -->
      <div class="col-md-12">
        <a href="<?= site_url("auth/logout") ?>">
          <div class="card box-shadow">
            <div class="card-body">
              <h1>Logout</h1>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>

  <?php view("templates/footer") ?>
</body>

</html>