</head>

<body>
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-2 pt-1">
        <img class="ml-3" width="72px" src="<?= toUrl("img_kampus", $_SESSION['PROFIL']['logo_kampus']) ?>" alt="Image Kampus">
      </div>
      <div class="col-8 text-center">
        <a class="blog-header-logo text-dark" href="#"><?= $_SESSION['PROFIL']['lembaga'] ?></a> <br>
        <a class="blog-header-logo-secondary text-dark" href="#"><?= $_SESSION['PROFIL']['kampus'] ?></a>
      </div>
      <div class="col-2 pt-1 text-right">
        <img class="mr-3" width="72px" src="<?= toUrl("img_lembaga", $_SESSION['PROFIL']['logo_lembaga']) ?>" alt="Image Lembaga">
      </div>
    </div>
  </header>