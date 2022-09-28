<?= $this->extend('E-learning/layout/layout_guru'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <form class="row g-3" method="post" action="<?= base_url() ?>/Learning/submitTugas">
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="col-lg-12">
                <br><br>
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('pesan') ?>
                </div>
            </div>
        <?php endif ?>
        <div class="col-md-12">
            <label for="Judul" class="form-label">Materi Tugas</label>
            <select name="id_materi" class="form-control" required>
                <option value="">Pilih</option>
                <?php foreach ($listMateri as $materi): ?>
                    <option value="<?= $materi['id_materi'] ?>"><?= $materi['judul'] ?></option>
                <?php endforeach ?>
            </select>
        <br>
        </div>
        <div class="col-md-12">
            <label for="Judul" class="form-label">Isi Tugas</label>
            <input type="text" class="form-control" id="Judul" name="tugas" required>
        <br>
        </div>
        <div>
            <br>
            <button type="submit" class="btn btn-success float-right">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>