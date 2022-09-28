<?php 

$konek = mysqli_connect('localhost', 'root', '', 'e_learning');
$id_materi = $pelajaran['id_materi'];

$check_sudah_mengerjakan = mysqli_query($konek, "SELECT * FROM jawaban_soal_latihan WHERE id_pelajar = '$id_pelajar' AND id_materi = '$id_materi'");

$result_rows = mysqli_num_rows($check_sudah_mengerjakan);

$nilai = 0;

$no = 1;

?>
<?= $this->extend('E-learning/layout/main_layout'); ?>

<?= $this->section('content'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="text-center text-uppercase">LATIHAN SOAL <?= $pelajaran['judul'] ?></h1>
	<br>
	<div class="container">
        <?php if (session()->getFlashdata('pesan_berhasil')): ?>
            <div class="col-lg-12">
                <br><br>
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('pesan_berhasil') ?>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('pesan_gagal')): ?> 
        	<div class="col-lg-12">
                <br><br>
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('pesan_gagal') ?>
                </div>
            </div>
    	<?php endif ?>
		<div class="row">
			<?php if ($result_rows > 0): ?>
				<div class="col">
				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Soal materi <?= $pelajaran['judul'] ?></h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">							
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead class="text-center" >
										<tr style="font-size: 13px;">
											<th style=" word-wrap: break-word;min-width : 200px;max-width: 250px;">Soal</th>
											<th style=" word-wrap: break-word;min-width : 200px;max-width: 250px;">Jawaban Anda</th>
											<th style=" word-wrap: break-word;min-width : 50px;max-width: 100px;">Nilai (benar/salah)</th>
										</tr>
									</thead>
									<tbody style="font-size: 13px;">
										<?php foreach ($soal as $pertanyaan): ?>
											<?php 
												$id_soal = $pertanyaan['id_soal'];
												$query_jawaban = mysqli_query($konek, "SELECT * FROM jawaban_soal_latihan WHERE id_pelajar = '$id_pelajar' AND id_soal = '$id_soal'");
												$f_data = mysqli_fetch_array($query_jawaban);
												$jawaban_pelajar = $f_data['jawaban_pelajar'];
												$jawaban_benar = $pertanyaan['jawaban_benar'];
												if ($jawaban_pelajar == $jawaban_benar) {
													$status = 'Benar';
													$nilai = $nilai + $pertanyaan['poin_soal'];
												} else {
													$status = 'Salah';
												}
											?>
											<tr>												
												<td style=" word-wrap: break-word;min-width : 250px;max-width: 250px;"><?= $pertanyaan['soal'] ?></td>
												<td class="text-center"><?= $jawaban_pelajar ?></td>
												<td class="text-center"><?= $status ?></td>
											</tr>											
										<?php endforeach ?>										
									</tbody>
											<tr style="font-size: 13px;">
												<th style=" word-wrap: break-word;min-width : 200px;max-width: 250px; text-align: center;" colspan="2">Nilai</th>
												<th style=" word-wrap: break-word;min-width : 200px;max-width: 250px; text-align: center;"><?= $nilai ?></th>
											</tr>
									<tfooter>
									</tfooter>
								</table> 
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php else : ?>
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
											<input type="text" name="id_materi" value="<?= $pelajaran['id_materi'] ?>" hidden>
										</tr>
									</thead>
									<tbody style="font-size: 13px;">
										<?php foreach ($soal as $pertanyaan): ?>
											<tr>
												<td class="d-none">
													<input type="text" name="id_soal_<?= $no ?>" value="<?= $pertanyaan['id_soal'] ?>" hidden>
												</td>
												<td style=" word-wrap: break-word;min-width : 250px;max-width: 250px;"><?= $pertanyaan['soal'] ?>
													<input type="text" name="number_<?= $no ?>" value="<?= $no ?>" hidden>
												</td>
												<td class="text-center">
													<?= $pertanyaan['jawaban1'] ?>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jawaban_<?= $no ?>" value="<?= $pertanyaan['jawaban1'] ?>" id="flexRadioDefault1" required >
													</div>
												</td>
												<td class="text-center">
													<?= $pertanyaan['jawaban2'] ?>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jawaban_<?= $no ?>" value="<?= $pertanyaan['jawaban2'] ?>"id="flexRadioDefault2" >
													</div>
												</td>
												<td class="text-center">
												<?= $pertanyaan['jawaban3'] ?>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jawaban_<?= $no ?>" value="<?= $pertanyaan['jawaban3'] ?>"id="flexRadioDefault3" >
													</div>
												</td>
												<td class="text-center">
													<?= $pertanyaan['jawaban4'] ?>
													<div class="form-check">
														<input class="form-check-input" type="radio"name="jawaban_<?= $no++ ?>" value="<?= $pertanyaan['jawaban4'] ?>" id="flexRadioDefault4" >
													</div>
												</td>
											</tr>											
										<?php endforeach ?>										
									</tbody>
								</table>
								<button type="submit" class="btn btn-primary">Submit</button>   
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php endif  ?>
		</div>
	</div>

</div>
<!-- /.container-fluid -->


<?= $this->endSection() ?>