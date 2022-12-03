<?php require_once('../../layouts/admin/header.php') ?>


<?php
if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    store("klub");
    flash("Berhasil menambah klub!", "success");
    header("Location: ./index.php");
}
?>
<div id="main" class="min-vh-100 pt-4">
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Klub</h1>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow components-section">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input class="form-control" name="nama" id="nama" type="text" required>
                </div>
                <div class="mb-3">
                    <label for="foto">Link Foto</label>
                    <input class="form-control" name="foto" id="foto" type="text" required>
                </div>
                <div class="mb-3">
                    <label for="liga">Nama Liga</label>
                    <input class="form-control" name="liga" id="liga" type="text" required>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once('../../layouts/admin/footer.php') ?>