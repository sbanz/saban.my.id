<?php require_once('../../layouts/admin/header.php') ?>
<?php
$clubs = all("klub");
?>

<div id="main" class="min-vh-100 pt-4">
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Daftar Klub</h1>
            </div>
            <a href="./create.php" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="card border-0 shadow components-section">
        <div class="card-body">
            <table class="datatable table w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Liga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($clubs as $club) : ?>
                        <tr>
                            <th><?= $i ?></th>
                            <td>
                                <img src="<?= $club['foto'] ?>" alt="" class="img-fluid img-thumbnail" style="height: 100px;" >
                            </td>
                            <td><?= $club['nama'] ?></td>
                            <td><?= $club['liga'] ?></td>

                            <td>
                                <a href="./delete.php?id=<?= $club['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                <a href="./edit.php?id=<?= $club['id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once('../../layouts/admin/footer.php') ?>