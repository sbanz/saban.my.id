<?php require_once('../../layouts/admin/header.php') ?>
<?php

$favorites = query("SELECT id_klub FROM favorit WHERE id_pengguna={$_SESSION['id']}");

$club_ids = implode(", ", array_map(function($favorit) {
    return $favorit['id_klub'];
}, $favorites));

$matches = query("SELECT
    pertandingan.*,
    klub_pertama.nama as nama_klub_pertama,
    klub_kedua.nama as nama_klub_kedua
    FROM pertandingan
    JOIN klub klub_pertama ON pertandingan.id_klub_pertama=klub_pertama.id
    JOIN klub klub_kedua ON pertandingan.id_klub_kedua=klub_kedua.id
    WHERE id_klub_pertama IN ($club_ids) OR id_klub_kedua IN ($club_ids)
");
?>

<div id="main" class="min-vh-100 pt-4">
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Daftar Pertandingan</h1>
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
                        <th>Tanggal</th>
                        <th>Klub</th>
                        <th>Lokasi</th>
                        <th>Skor</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($matches as $pertandingan) : ?>
                        <tr>
                            <th><?= $i ?></th>
                            <td><?= $pertandingan['tanggal'] ?></td>
                            <td><?= $pertandingan['nama_klub_pertama'] ?> - <?= $pertandingan['nama_klub_kedua'] ?></td>
                            <td><?= $pertandingan['lokasi'] ?></td>
                            <td><?= $pertandingan['skor_klub_pertama'] ?> - <?= $pertandingan['skor_klub_kedua'] ?></td>
                            <td><?= $pertandingan['komentar'] ?></td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once('../../layouts/admin/footer.php') ?>