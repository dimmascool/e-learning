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
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <?php $no = 1 ?>
                                        <tr>
                                            <th>No</th>
                                            <th>Tugas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 13px;">
                                        <?php foreach ($listTugas as $soal): ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$soal['tugas'] ?></td>
                                                <td>
                                                    <a href="<?= base_url() ?>/learning/hapus_soal/<?=$soal['id_tugas'] ."/". $pelajaran['id_materi']?>" class="btn btn-sm btn-danger">Hapus</a>
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