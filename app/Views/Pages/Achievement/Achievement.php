<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<p class="fs-3 fw-bolder">DATA PRESTASI</p>

<?= $this->include('Layout/Message') ?>

<?php
if (getDefault($auth, 'is_login', false)) {
?>
    <div class="d-flex justify-content-end mb-4">
        <a type="button" class="btn btn-outline-success mx-3" href="/achievement/create">Tambah Data</a>
    </div>
<?php
}
?>

<table class="table table-striped table-hover">
    <tr>
        <th>KODE PRESTASI</th>
        <th>JUDUL PRESTASI</th>
        <th>DESKRIPSI</th>
        <th>MIN POIN</th>
        <th>MAX POIN</th>
        <th>JUMLAH PERAIH</th>
        <th>TANGGAL</th>
        <th>AKSI</th>
    </tr>
    <?php
    foreach ($data as $key => $value) {
    ?>
        <tr>
            <td><?= $value['code'] ?></td>
            <td><?= $value['title'] ?></td>
            <td>
                <div class="text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $value['description'] ?>">
                    <?= $value['description'] ?>
                </div>
            </td>
            <td><?= $value['min_point'] ?></td>
            <td><?= $value['max_point'] ?></td>
            <td><?= $value['count'] ?></td>
            <td><?= date_format(date_create($value['created_at']), 'd F Y') ?></td>
            <td>
                <div class="d-flex gap-2">
                    <a type="button" class="btn btn-sm btn-outline-primary" href="/achievement/update/<?= $value['code'] ?>">Edit</a>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal_message" onclick="showMessage({title: 'Hapus Data', body: 'Apakah anda yakin untuk menghapus data?'}, '/achievement/delete/<?= $value['code'] ?>')">Delete</button>
                </div>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<!-- <div class="d-flex justify-content-end">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div> -->

<?= $this->endSection() ?>