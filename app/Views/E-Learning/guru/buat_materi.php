<?= $this->extend('E-learning/layout/layout_guru'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <form class="row g-3" method="post" action="<?= base_url() ?>/Learning/submitMateriBaru">
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="col-lg-12">
                <br><br>
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('pesan') ?>
                </div>
            </div>
        <?php endif ?>
        <div class="col-md-12">
            <label for="Judul" class="form-label">Kelas</label>
            <select name="kelas" class="form-control" required>
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        <br>
        </div>
        <div class="col-md-12">
            <label for="Judul" class="form-label">Judul Materi</label>
            <input type="text" class="form-control" id="Judul" name="judul" required>
        <br>
        </div>
        <div class="col-md-12">
            <label for="Isi" class="form-label">Isi Materi</label>
            <textarea rows="20" type="text" class="form-control" id="Isi" name="isi" required></textarea>              
        </div>
        <div>
            <br>
            <button type="submit" class="btn btn-success float-right">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>