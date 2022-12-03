<?php require_once('../../layouts/admin/header.php') ?>


<?php
$clubs = all("klub");
?>
<?php
if (isset($_POST['submit'])) {
  unset($_POST['submit']);

  store("favorit");
  flash("Berhasil menambah favorit!", "success");
  header("Location: ./index.php");
}
?>
<div id="main" class="min-vh-100 pt-4">
  <div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
      <div class="mb-3 mb-lg-0">
        <h1 class="h4">Tambah Klub Favorit</h1>
      </div>
    </div>
  </div>
  <div class="card border-0 shadow components-section">
    <div class="card-body">
      <form action="" method="POST">
        <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id'] ?>">

        <div class="mb-3">
          <label for="id_klub">Klub</label>
          <select class="form-select select2" id="id_klub" name="id_klub" aria-label="Default select example">
            <?php foreach ($clubs as $club) : ?>
              <option value="<?= $club['id'] ?>"><?= $club['nama'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="tanggal_tambah">Tanggal Tambah</label>
          <input class="form-control" name="tanggal_tambah" id="tanggal_tambah" type="date" required>
        </div>
        <div class="d-flex align-items-center justify-content-end">
          <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php require_once('../../layouts/admin/footer.php') ?>