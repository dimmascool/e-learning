<?= $this->extend('E-learning/layout/main_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary text-center"><?= $materi['judul'] ?></h3>
        </div>
        <div class="card-body">
            <p style="text-indent: 45px;"><?= $materi['isi'] ?></p>
            <br><br>
            <p class="text-right">Dibuat Oleh   : <?= $materi['pemateri'] ?> untuk kelas <?= $materi['kelas'] ?></p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>