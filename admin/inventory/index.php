<?php require_once('../../layouts/admin/header.php') ?>


<div id="main" class="min-vh-100 pt-4">
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Inventaris</h1>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow components-section">
        <div class="card-body">
            <table class="datatable table w-full">
              <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Tambah</th>
                    <th>Kurang</th>
                    <th>Total</th>
                    <th>Terakhir Terubah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <th>1</th>
                    <td>Gitar 1</td>
                    <td>1</td>
                    <td>-</td>
                    <td>1</td>
                    <td>2021-10-10</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once('../../layouts/admin/footer.php') ?>