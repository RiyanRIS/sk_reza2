<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA ARSIP -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>Detail Arsip
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" title="Tambah Data">
            <i class="fa fa-plus" aria-hidden="true"></i> Tambah
          </button>
        </h3>
        <table class="table table-bordered">
          <tr>
            <td><h1><?= $_SESSION['arsip_detail']['nama'] ?></h1></td>
            <td>
              <table>
              <?php if(count($data['list_berkas']) == 0){ ?>
                <tr><td>Data Masih Kosong.</td></tr>
              <?php } else { foreach($data['list_berkas'] as $key){ ?>
                <tr><td>
                <a href="<?= toUrl("arsip", $key['nama_file']) ?>"><?= $key['nama_file'] ?></a> </td>
                <?php if(isAdmin()){ ?>
                  <td>
                    <a href="<?= site_url("arsip/hapusdetailarsip/".$key['id']."/".$data['kode_arsip']) ?>" class="btn btn-sm btn-primary float-right">hapus</a>
                  </td>
                <?php } ?>
              
              </tr>
              <?php } } ?>
              
              </table>
              <?php if(isAdmin()){ ?>
                <?php if(count($data['list_berkas2']) == 0){ ?>
                  
              <?php } else { ?> 
                <h4>Berkas diusulkan</h4>
              <table>
                <?php foreach($data['list_berkas2'] as $key){ ?>
                <tr><td>
                <a href="<?= toUrl("arsip", $key['nama_file']) ?>"><?= $key['nama_file'] ?></a> </td>
                  <td>
                    <a href="<?= site_url("arsip/tolak/".$key['id']."/".$data['kode_arsip']) ?>" class="btn btn-sm btn-danger float-right">tolak</a>
                    <a href="<?= site_url("arsip/verif/".$key['id']."/".$data['kode_arsip']) ?>" class="btn btn-sm btn-primary float-right">verifikasi</a>
                  </td>
              
              </tr>
              <?php } ?>
              </table>
              <?php } } ?>

            </td>
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

<!-- MODAL -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= site_url('arsip/aksi_add_detail') ?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Arsip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="file">FILE</label>
          <input type="hidden" name="code" value="<?= $data['kode_arsip'] ?>">
          <input type="file" required="true" class="form-control-file" name="file" id="file" placeholder="FILE" aria-describedby="fileHelpId">
          <small id="fileHelpId" class="form-text text-muted">*png, jpg </small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>