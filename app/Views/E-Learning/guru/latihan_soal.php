<?= $this->extend('E-learning/layout/layout_guru'); ?>

<?= $this->section('content'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="text-center text-uppercase">LATIHAN SOAL <?= $pelajaran['judul'] ?></h1>
    <br>
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="col-lg-12">
            <br><br>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan') ?>
            </div>
        </div>
    <?php endif ?>
    <div class="container-fluid">        
        <div class="row">
                <div class="col">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Soal materi <?= $pelajaran['judul'] ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" action="<?= base_url() ?>/Learning/jawabLatihanSoal">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center" >
                                        <tr style="font-size: 13px;">
                                            <th style=" word-wrap: break-word;min-width : 250px;max-width: 250px;">Soal</th>
                                            <th style=" word-wrap: break-word;min-width : 70px;max-width: 30px;" colspan="4">Pilihan Jawaban</th>
                                            <th style=" word-wrap: break-word;min-width : 70px;max-width: 30px;">Jawaban</th>
                                            <th style=" word-wrap: break-word;min-width : 70px;max-width: 30px;">Poin</th>
                                            <th style=" word-wrap: break-word;min-width : 90px;max-width: 100px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 13px;">
                                        <?php foreach ($listSoal as $pertanyaan): ?>
                                            <tr>
                                                <td class="d-none">
                                                    <input type="text" name="id_soal_<?= $pertanyaan['id_soal']?>" value="<?= $pertanyaan['id_soal'] ?>" hidden>
                                                </td>
                                                <td style=" word-wrap: break-word;min-width : 250px;max-width: 250px;"><?= $pertanyaan['soal'] ?></td>
                                                <td class="text-center">
                                                    <?= $pertanyaan['jawaban1'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $pertanyaan['jawaban2'] ?>
                                                </td>
                                                <td class="text-center">
                                                <?= $pertanyaan['jawaban3'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $pertanyaan['jawaban4'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $pertanyaan['jawaban_benar'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $pertanyaan['poin_soal'] ?>
                                                </td>
                                                <td class="text-center"> 
                                                    <a style="font-size: 10px;" href="<?= base_url() ?>/Learning/editSoal/<?= $pertanyaan['id_soal']?>" class="btn btn-sm btn-warning">Edit</a> <br> <br>
                                                    <a style="font-size: 10px;"href="<?= base_url() ?>/Learning/hapusSoal/<?= $pertanyaan['id_soal'] ."/". $pelajaran['id_materi']?>" class="btn btn-sm btn-danger" onclick="return confirm('hapus soal ini ?')">Hapus</a>  
                                                </td>
                                            </tr>                                           
                                        <?php endforeach ?>                                     
                                    </tbody>
                                </table> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?= $this->endSection() ?>