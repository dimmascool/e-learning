<?php  
error_reporting(0);

$konek = mysqli_connect('localhost', 'root', '', 'e_learning') or die('Koneksi Error');
$status = null;

?>
<?= $this->extend('E-learning/layout/main_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tugas</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <?php if (session()->getFlashdata('pesanBerhasil')): ?>
                    <div class="col-lg-12">
                        <br><br>
                        <div class="alert alert-success" role="alert">
                          <?= session()->getFlashdata('pesanBerhasil') ?>
                        </div>
                    </div>
                <?php elseif (session()->getFlashdata('pesanGagal')) : ?> 
                    <div class="col-lg-12">
                        <br><br>
                        <div class="alert alert-danger" role="alert">
                          <?= session()->getFlashdata('pesanGagal') ?>
                        </div>
                    </div>
                <?php endif ?> 
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pelajaran</th>
                            <th scope="col">Tugas</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <?php $no = 1 ?>
                    <tbody style="font-size: 14px;">
                        <?php foreach ($tugas as $data): ?>
                            <tr>
                                <?php
                                    $id_tugas = $data['id_tugas'];
                                    $sql = mysqli_query($konek, "SELECT * FROM `berkas_jawaban` WHERE id_tugas = '$id_tugas' AND id_pelajar = '$id_pelajar'");
                                    $result = mysqli_fetch_array($sql);   
                                    $nilai = $result['nilai_tugas'];                                
                                    if (mysqli_num_rows($sql) > 0) {
                                        $status = "Sudah dikerjakan";
                                    }
                                ?>
                                <td><?= $no++ ?></td>
                                <td><?= $pelajaran['judul']?></td>
                                <td><?= $data['tugas'] ?></td>
                                <td>
                                    <?php if ($status == 'Sudah dikerjakan') : ?>
                                        <?= $status ?>
                                    <?php else : ?>
                                    <form action="<?= base_url();?>/Learning/ngumpulinTugas" method="post" enctype="multipart/form-data"> 
                                        <input type="text" name="id_pelajar" value="<?= $id_pelajar ?>" hidden>
                                        <input type="text" name="id_materi" value="<?= $pelajaran['id_materi'] ?>" hidden>
                                        <input type="text" name="id_tugas" value="<?= $data['id_tugas'] ?>" hidden>
                                        <input type="file" class="form-control-file" name="berkas" required><br>
                                        <input type="submit" class="btn btn-success">
                                    </form>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?php if ($nilai != null): ?>
                                        <?= $nilai ?>
                                    <?php else :?>
                                        Niilai belum diberikan 
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>