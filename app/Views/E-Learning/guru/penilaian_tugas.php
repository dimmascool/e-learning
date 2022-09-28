<?php 

    $konek = mysqli_connect('localhost', 'root', '', 'e_learning');    

?>
<?= $this->extend('E-learning/layout/layout_guru'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="text-center" style="font-family:verdana">PENILAIAN TUGAS</h1>
    <hr>
    <?php if (session()->getFlashdata('pesan')): ?>
    <br><br>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan') ?>
    </div>
    <?php endif ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tugas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="font-size: 13px;">
                                <th>Pelajar</th>
                                <th>Tugas</th>
                                <th>Jawaban</th>
                                <th>Nilai</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 13px;">
                            <?php foreach ($listBerkas as $data): ?>
                                <tr>                            
                                    <td style=" word-wrap: break-word;min-width : 250px;max-width: 250px;">
                                        <?php 
                                            $idpelajar = $data['id_pelajar'];
                                            $sql = mysqli_query($konek, "SELECT * FROM pelajar WHERE id_pelajar = '$idpelajar'");
                                            $result = mysqli_fetch_array($sql);

                                            echo $result['nama_depan']." ".$result['nama_belakang'];
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                            $idtugas = $data['id_tugas'];
                                            $sql = mysqli_query($konek, "SELECT * FROM tugas WHERE id_tugas = '$idtugas'");
                                            $result = mysqli_fetch_array($sql);

                                            echo $result['tugas'];
                                        ?>
                                    </td>
                                    <td class="text-center"><a href="<?= base_url() ?>/upload_jawaban/<?= $data['nama_file'] ?>"><?= $data['nama_file'] ?></a></td>
                                    <?php if (!empty($data['nilai_tugas'])): ?>
                                        <td class="text-center"><?= $data['nilai_tugas']?></td>
                                        <td class="text-center">--</td>
                                    <?php else : ?>
                                        <td class="text-center">Belum Dinilai</td>
                                        <td class="text-center"><a href="<?= base_url() ?>/guru/nilai_tugas/<?= $data['id_jawaban'] ?>">Beri Nilai</a></td>
                                    <?php endif?>
                                </tr>
                            <?php endforeach ?>                                    
                        </tbody>
                    </table> 
                </div>
            </div>

<?= $this->endSection(); ?>