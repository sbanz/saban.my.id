<?php require_once('../../layouts/admin/header.php') ?>

<?php
$clubs = all("klub");
?>


<?php

if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    store("pertandingan");
    flash("Berhasil menambah pertandingan!", "success");
    header("Location: ./index.php");
}
?>
<div id="main" class="min-vh-100 pt-4">
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Pertandingan</h1>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow components-section">
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="birthday">Klub Pertama</label>
                        <select class="form-select select2" id="id_klub_pertama" name="id_klub_pertama" aria-label="Default select example">
                            <?php foreach ($clubs as $club) : ?>
                                <option value="<?= $club['id'] ?>"><?= $club['nama'] ?> - <?= $club['liga'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="birthday">Klub Kedua</label>
                        <select class="form-select select2" id="id_klub_kedua" name="id_klub_kedua" aria-label="Default select example">
                            <?php foreach ($clubs as $club) : ?>
                                <option value="<?= $club['id'] ?>"><?= $club['nama'] ?> - <?= $club['liga'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input class="form-control" type="text" id="lokasi" name="lokasi">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input class="form-control" type="date" id="tanggal" name="tanggal">
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