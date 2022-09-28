<?= $this->extend('E-learning/layout/layout_guru'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="col-lg-12">
            <br><br>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan') ?>
            </div>
        </div>
    <?php endif ?> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary text-center"><?= $materi['judul'] ?></h3>
        </div>
        <div class="card-body">
            <p style="text-indent: 45px;"><?= $materi['isi'] ?></p>
            <br><br>
            <p class="text-right">Dibuat Oleh   : <?= $materi['pemateri'] ?> untuk kelas <?= $materi['kelas'] ?></p>
            <a href="<?= base_url() ?>/guru/edit_materi/<?= $materi['id_materi'] ?>" class="btn btn-warning">Edit</a>
            <a href="<?= base_url() ?>/guru/hapus_materi/<?= $materi['id_materi'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Materi ?')">Delete</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>