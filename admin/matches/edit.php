<?php require_once('../../layouts/admin/header.php') ?>

<?php
$matches = query("SELECT
  pertandingan.*,
  klub_pertama.nama as nama_klub_pertama,
  klub_kedua.nama as nama_klub_kedua
  FROM pertandingan
  JOIN klub klub_pertama ON pertandingan.id_klub_pertama=klub_pertama.id
  JOIN klub klub_kedua ON pertandingan.id_klub_kedua=klub_kedua.id
  WHERE id_klub_pemenang IS NULL
");
$clubs = all("klub");
?>


<?php

if (isset($_POST['submit'])) {
  unset($_POST['submit']);
  update("pertandingan");
  flash("Berhasil menambah hasil pertandingan!", "success");
  header("Location: ./index.php");
}
?>
<div id="main" class="min-vh-100 pt-4">
  <div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
      <div class="mb-3 mb-lg-0">
        <h1 class="h4">Hasil Pertandingan</h1>
      </div>
    </div>
  </div>
  <div class="card border-0 shadow components-section">
    <div class="card-body">
      <form action="" method="POST">
        <div class="row">
          <div class="col-12 mb-3">
            <label for="birthday">Klub Pemenang</label>
            <select class="form-select select2" id="id" name="id" aria-label="Default select example">
              <?php foreach ($matches as $match) : ?>
                <option value="<?= $match['id'] ?>"><?= $match['nama_klub_pertama'] ?> - <?= $match['nama_klub_kedua'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-12 mb-3">
            <label for="birthday">Klub Pemenang</label>
            <select class="form-select select2" id="id_klub_pemenang" name="id_klub_pemenang" aria-label="Default select example">
              <?php foreach ($clubs as $club) : ?>
                <option value="<?= $club['id'] ?>"><?= $club['nama'] ?> - <?= $club['liga'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-12 mb-3">
            <label for="skor_klub_pertama" class="form-label">Skor Klub Pertama</label>
            <input class="form-control" type="number" id="skor_klub_pertama" name="skor_klub_pertama">
          </div>
          <div class="col-12 mb-3">
            <label for="skor_klub_kedua" class="form-label">Skor Klub Kedua</label>
            <input class="form-control" type="number" id="skor_klub_kedua" name="skor_klub_kedua">
          </div>
          <div class="col-12 mb-3">
            <label for="komentar">Komentar</label>
            <textarea name="komentar" id="komentar" cols="30" rows="10" class="form-control"></textarea>
          </div>
        </div>

        <div class="d-flex align-items-center justify-content-end">
          <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php require_once('../../layouts/admin/footer.php') ?>