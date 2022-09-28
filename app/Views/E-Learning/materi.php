<?= $this->extend('E-learning/layout/main_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="text-center" style="font-family:verdana">MENU MATERI</h1>
    <h5 class="text-center">Silahkan pilih jenis pelajaran</h5>
    <hr>
    <div class="row">
        <?php foreach ($materi as $data_materi): ?>
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-header">
                        Kelas <?= $data_materi['kelas'] ?>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?= $data_materi['judul'] ?></h6>
                        <a href="/learning/materi/<?= $data_materi['id_materi'] ?>" class="btn btn-primary">Lihat</a>
                    </div>
                    <div class="card-footer text-muted">
                        Dibuat Oleh <?= $data_materi['pemateri'] ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>