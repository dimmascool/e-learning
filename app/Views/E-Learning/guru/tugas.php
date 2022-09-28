<?= $this->extend('E-learning/layout/layout_guru'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="text-center" style="font-family:verdana">MENU TUGAS</h1>
    <h5 class="text-center">Silahkan pilih jenis pelajaran / Buat baru</h5>
    <a href="<?= base_url()  ?>/guru/buat_tugas" class="btn btn-primary">Buat Tugas Baru</a>
    <hr>
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="col-lg-12">
            <br><br>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan') ?>
            </div>
        </div>
    <?php endif ?>
    <div class="row">
       <?php foreach ($listMateri as $data_materi): ?>
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-header">
                        Kelas <?= $data_materi['kelas'] ?>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?= $data_materi['judul'] ?></h6>
                        <a href="/guru/tugas/<?= $data_materi['id_materi'] ?>" class="btn btn-primary">Lihat</a>
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