<?php view('templates/header', $data) ?>

<?php view('templates/navigation') ?>

<div class="container pt-5">

  <div class="row mb-2">

    <!-- EDIT DATA ARSIP -->
    <div class="col-md-12 mb-3">
      <div class="card box-shadow p-5">
        <h3>Ubah Data Arsip</h3>
        <form action="<?= site_url('arsip/aksi_edit') ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" <?= val("arsip_edit", "id") ?>>
          <input type="hidden" name="file" <?= val("arsip_edit", "file") ?>>

          <div class="form-group">
            <label for="kode">KODE ARSIP</label>
            <input type="text"
              class="form-control <?= cekMsgError("kode") ?>" <?= val("arsip_edit", "kode") ?> name="kode" id="kode" aria-describedby="helpIdArsip" placeholder="ID ARSIP">
            <small id="helpIdArsip" class="form-text text-muted">Kode khusus untuk masing masing arsip.</small>
            <div class="invalid-feedback">
                <?= getMsgError("kode") ?>
              </div>
          </div>
          <div class="form-group">
            <label for="nama">NAMA ARSIP</label>
            <input type="text"
              class="form-control" <?= val("arsip_edit", "nama") ?> required="true" name="nama" id="nama" aria-describedby="helpNamaArsip" placeholder="Beri Nama Pada Arsip">
          </div>
          <div class="form-group">
            <label for="jenis">JENIS ARSIP</label>
            <select class="form-control" required="true" name="jenis" id="jenis">
              <option <?= val_select("arsip_edit", "jenis", "Surat") ?> value="Surat">Surat</option>
              <option <?= val_select("arsip_edit", "jenis", "Laporan") ?> value="Laporan">Laporan</option>
              <option <?= val_select("arsip_edit", "jenis", "Lainya") ?> value="Lainya">Lainya</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nama_arsip">WAKTU PELAKSANAAN</label>
            <div class="form-row">
              <div class="col-sm-2">
                <input type="text" class="form-control" required="true" name="tanggal" <?= val("arsip_edit", "tanggal") ?> id="nama_arsip" aria-describedby="helpNamaArsip" placeholder="Tanggal">
              </div>
              
              <div class="col-sm-2">
                <select class="form-control" name="bulan" id="bulan">
                <option disabled selected value>-- Bulan --</option>
                  <option <?= val_select("arsip_edit", "bulan", "1") ?> value="1">Januari</option>
                  <option <?= val_select("arsip_edit", "bulan", "2") ?> value="2">Februari</option>
                  <option <?= val_select("arsip_edit", "bulan", "3") ?> value="3">Maret</option>
                  <option <?= val_select("arsip_edit", "bulan", "4") ?> value="4">April</option>
                  <option <?= val_select("arsip_edit", "bulan", "5") ?> value="5">Mei</option>
                  <option <?= val_select("arsip_edit", "bulan", "6") ?> value="6">Juni</option>
                  <option <?= val_select("arsip_edit", "bulan", "7") ?> value="7">Juli</option>
                  <option <?= val_select("arsip_edit", "bulan", "8") ?> value="8">Agustus</option>
                  <option <?= val_select("arsip_edit", "bulan", "9") ?> value="9">September</option>
                  <option <?= val_select("arsip_edit", "bulan", "10") ?> value="10">Oktober</option>
                  <option <?= val_select("arsip_edit", "bulan", "11") ?> value="11">November</option>
                  <option <?= val_select("arsip_edit", "bulan", "12") ?> value="12">Desember</option>
                </select>
              </div>
              
              <div class="col-sm-2">
                <input type="text" class="form-control" required="true" name="tahun" id="tahun" <?= val("arsip_edit", "tahun") ?> aria-describedby="helpNamaArsip" placeholder="Tahun">
              </div>

              <div class="col-sm-2">
                <input type="text" class="form-control" required="true" name="jam" id="jam" <?= val("arsip_edit", "jam") ?> aria-describedby="helpNamaArsip" placeholder="Jam">
              </div>

              <div class="col-sm-2">
                <input type="text" class="form-control" required="true" name="menit" id="menit" <?= val("arsip_edit", "menit") ?> aria-describedby="helpNamaArsip" placeholder="Menit">
              </div>

            </div>
          </div>
          <!-- <div class="form-group">
            <label for="file">FILE</label>
            <input type="file" class="form-control-file" name="new_file" id="file" placeholder="FILE" aria-describedby="fileHelpId">
          </div> -->
          <div class="form-group">
            <label for="catatan">CATATAN</label>
            <input type="text" class="form-control" name="catatan" id="catatan" aria-describedby="helpNamaArsip" <?= val("arsip_edit", "catatan") ?> placeholder="Catatan Arsip(Tidak Wajib)">
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