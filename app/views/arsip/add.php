<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA ARSIP -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>Tambah Data Arsip</h3>
        <form action="<?= site_url('arsip/aksi_add') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="kode">KODE ARSIP</label>
            <input type="text" class="form-control <?= cekMsgError("kode") ?>" required="true" name="kode" id="kode" aria-describedby="helpIdArsip" <?= val("arsip_add", "kode") ?> placeholder="KODE ARSIP">
            <small id="helpIdArsip" class="form-text text-muted">Kode khusus untuk masing masing arsip.</small>
            <div class="invalid-feedback">
                <?= getMsgError("kode") ?>
              </div>
          </div>
          <div class="form-group">
            <label for="nama">NAMA ARSIP</label>
            <input type="text" class="form-control" required="true" name="nama" id="nama" aria-describedby="helpNamaArsip" <?= val("arsip_add", "nama") ?> placeholder="Beri Nama Pada Arsip">
          </div>
          <div class="form-group">
            <label for="jenis">JENIS ARSIP</label>
            <select class="form-control" required="true" name="jenis" id="jenis">
              <option <?= val_select("arsip_add", "jenis", "Surat") ?> value="Surat">Surat</option>
              <option <?= val_select("arsip_add", "jenis", "Laporan") ?> value="Laporan">Laporan</option>
              <option <?= val_select("arsip_add", "jenis", "Lainya") ?> value="Lainya">Lainya</option>
            </select>
          </div>
          <div class="form-group">
            <label for="waktu">WAKTU PELAKSANAAN</label>
            <div class="form-row">
              <div class="col-sm-2">
                <input type="text" class="form-control" required="true" name="tanggal" id="waktu" <?= val("arsip_add", "tanggal") ?> aria-describedby="helpNamaArsip" placeholder="Tanggal">
              </div>
              
              <div class="col-sm-2">
                <select class="form-control" name="bulan" id="bulan">
                  <option disabled selected value>-- Bulan --</option>
                  <option <?= val_select("arsip_add", "bulan", "1") ?> value="1">Januari</option>
                  <option <?= val_select("arsip_add", "bulan", "2") ?> value="2">Februari</option>
                  <option <?= val_select("arsip_add", "bulan", "3") ?> value="3">Maret</option>
                  <option <?= val_select("arsip_add", "bulan", "4") ?> value="4">April</option>
                  <option <?= val_select("arsip_add", "bulan", "5") ?> value="5">Mei</option>
                  <option <?= val_select("arsip_add", "bulan", "6") ?> value="6">Juni</option>
                  <option <?= val_select("arsip_add", "bulan", "7") ?> value="7">Juli</option>
                  <option <?= val_select("arsip_add", "bulan", "8") ?> value="8">Agustus</option>
                  <option <?= val_select("arsip_add", "bulan", "9") ?> value="9">September</option>
                  <option <?= val_select("arsip_add", "bulan", "10") ?> value="10">Oktober</option>
                  <option <?= val_select("arsip_add", "bulan", "11") ?> value="11">November</option>
                  <option <?= val_select("arsip_add", "bulan", "12") ?> value="12">Desember</option>
                </select>
              </div>
              
              <div class="col-sm-2">
                <input type="text" class="form-control" required="true" name="tahun" id="tahun" aria-describedby="helpNamaArsip" <?= val("arsip_add", "tahun") ?> placeholder="Tahun">
              </div>

              <div class="col-sm-1">
                <input type="text" class="form-control" required="true" name="jam" id="jam" aria-describedby="helpNamaArsip" <?= val("arsip_add", "jam") ?> placeholder="Jam">
              </div>

              <span style="padding-top:10px">:</span>

              <div class="col-sm-1">
                <input type="text" class="form-control" required="true" name="menit" id="menit" aria-describedby="helpNamaArsip" <?= val("arsip_add", "menit") ?> placeholder="Menit">
              </div>

            </div>
          </div>
          <div class="form-group">
            <label for="file">FILE</label>
            <input type="file" required="true" class="form-control-file" name="file" id="file" placeholder="FILE" aria-describedby="fileHelpId">
            <!-- <small id="fileHelpId" class="form-text text-muted">*doc, pdf, </small> -->
          </div>
          <div class="form-group">
            <label for="catatan">CATATAN</label>
            <input type="text" class="form-control" name="catatan" id="catatan" aria-describedby="helpNamaArsip" <?= val("arsip_add", "catatan") ?> placeholder="Catatan Arsip(Tidak Wajib)">
          </div>
          <input name="btn_simpan" id="btn_simpan" class="btn btn-primary" type="submit" value="Simpan"> <a href="<?= site_url('arsip') ?>" class="btn btn-danger">Batal</a>
        </form>


      </div>
    </div>

  </div>
</div>

<?php view("templates/footer") ?>
</body>

</html>