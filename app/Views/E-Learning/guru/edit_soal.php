<?= $this->extend('E-learning/layout/layout_guru'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <form class="row g-3" method="post" action="<?= base_url() ?>/Learning/submitEditSoal">
        <div class="col-md-12">
            <label for="materi" class="form-label">Materi</label>
            <input type="text" class="form-control" name="id_materi" value="<?= $soal['id_materi']?>" required readonly hidden>
            <input type="text" class="form-control" name="id_soal" value="<?= $soal['id_soal']?>" required readonly hidden>
            <input type="text" class="form-control" name="materi" value="<?= $judul ?>" required readonly>
        <br>
        </div>
        <div class="col-md-12">
            <label for="marteri" class="form-label">Soal</label>
            <input type="text" class="form-control" name="soal" value="<?= $soal['soal']?>" required>
            <br>
        </div>
        <div class="col-md-12">
            <label for="jawaban1" class="form-label">jawaban 1</label>
            <input type="text" class="form-control" name="jawaban1" value="<?= $soal['jawaban1']?>" required>
            <br>
        </div>
        <div class="col-md-12">
            <label for="jawaban2" class="form-label">jawaban 2</label>
            <input type="text" class="form-control" name="jawaban2" value="<?= $soal['jawaban2']?>" required>
            <br>
        </div>
        <div class="col-md-12">
            <label for="jawaban3" class="form-label">jawaban 3</label>
            <input type="text" class="form-control" name="jawaban3" value="<?= $soal['jawaban3']?>" required>
            <br>
        </div>
        <div class="col-md-12">
            <label for="jawaban4" class="form-label">jawaban 4</label>
            <input type="text" class="form-control" name="jawaban4" value="<?= $soal['jawaban4']?>" required>
            <br>
        </div>
        <div class="col-md-12">
            <label for="jawaban_benar" class="form-label">jawaban benar</label>
            <input type="text" class="form-control" name="jawaban_benar" value="<?= $soal['jawaban_benar']?>" required>
            <br>
        </div>
        <div class="col-md-12">
            <label for="poin_soal" class="form-label">Poin soal</label>
            <input type="text" class="form-control" name="poin_soal" placeholder="angka 1 sampai 100" value="<?= $soal['poin_soal']?>" required>
            <br>
        </div>
        <div>
            <br>
            <button type="submit" class="btn btn-success float-right">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>