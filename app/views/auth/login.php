<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page | <?= $_SESSION['PROFIL']['sistem'] ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/login.css">
</head>
<body>
<div class="login-form">
  <form action="<?= site_url("auth/aksi_login") ?>" method="post">
    <h1 class="text-center"><?= $_SESSION['PROFIL']['sistem'] ?></h1>
    <div class="content">
      <div class="input-field">
        <input type="text" name="username" placeholder="Nama Admin" required="true" autocomplete="nope" autofocus="true">
      </div>
      <div class="input-field">
        <input type="password" name="password" placeholder="Kata Sandi" required="true" autocomplete="nope">
      </div>
      <a href="javascript:void(0)" class="link">&nbsp;</a>
      <!-- <a href="javascript:void(0)" class="link">Forgot Your Password?</a> -->
    </div>
    <div class="action">
      <button type="submit">Masuk</button>
    </div>
  </form>
</div>
<!-- <script src="plugins/sweetalert2/dist/sweetalert2.all.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<script>
  <?= getMsg() ?>
</script>
</body>
</html>