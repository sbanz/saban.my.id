<?php require_once('../../layouts/web/header.php') ?>


<?php
$matches = query("SELECT
    pertandingan.*,
    klub_pertama.nama as nama_klub_pertama,
    klub_kedua.nama as nama_klub_kedua,
    klub_pertama.foto as foto_klub_pertama,
    klub_kedua.foto as foto_klub_kedua
    FROM pertandingan
    JOIN klub klub_pertama ON pertandingan.id_klub_pertama=klub_pertama.id
    JOIN klub klub_kedua ON pertandingan.id_klub_kedua=klub_kedua.id
    WHERE id_klub_pemenang IS NULL
");
?>
<div class="hero overlay" style="background-image: url('../../assets/web/images/bg_3.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mx-auto text-center">
                <h1 class="text-white">Fixtures</h1>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-dark">
    <div class="container">

        <div class="row">
            <div class="col-12 title-section">
                <h2 class="heading">Upcoming Match</h2>
            </div>
            <?php foreach ($matches as $match) : ?>
                <div class="col-lg-6 mb-4">
                    <div class="bg-light p-4 rounded">
                        <div class="widget-body">
                            <div class="widget-vs">
                                <div class="d-flex align-items-center justify-content-around justify-content-between w-100">
                                    <div class="team-1 text-center">
                                        <img src="<?= $match['foto_klub_pertama'] ?>" alt="Image" style="height: 110px; width: 110px;">
                                        <h3><?= $match['nama_klub_pertama'] ?></h3>
                                    </div>
                                    <div>
                                        <span class="vs"><span>VS</span></span>
                                    </div>
                                    <div class="team-2 text-center">
                                        <img src="<?= $match['foto_klub_kedua'] ?>" alt="Image" style="height: 110px; width: 110px;">
                                        <h3><?= $match['nama_klub_kedua'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center widget-vs-contents mb-4">
                            <h4><?= $match['lokasi'] ?></h4>
                            <p class="mb-5">
                                <span class="d-block"><?= $match['tanggal'] ?></span>
                            </p>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once('../../layouts/web/footer.php') ?>