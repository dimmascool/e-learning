<?= $this->extend('E-learning/layout/main_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="text-center" style="font-family:verdana">MENU TUGAS</h1>
    <h5 class="text-center">Silahkan pilih jenis pelajaran</h5>    
    <hr>
    <div class="row">
        <?php foreach ($pelajaran as $jenis_pelajaran): ?>
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-header">
                        Kelas <?= $jenis_pelajaran['kelas'] ?>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Tugas <?= $jenis_pelajaran['judul'] ?></h6>
                        <a href="/learning/tugas/<?= $jenis_pelajaran['id_materi'] ?>" class="btn btn-primary">Lihat</a>
                    </div>
                    <div class="card-footer text-muted">
                        Dibuat Oleh <?= $jenis_pelajaran['pemateri'] ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>