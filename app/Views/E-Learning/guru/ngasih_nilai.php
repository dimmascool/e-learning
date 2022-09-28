<form action="<?= base_url() ?>/Learning/beri_nilai" method='post'>
	<label>Masukan Nilai</label>
	<input type="text" name="id_berkas" value="<?= $berkas['id_jawaban'] ?>" hidden>
	<input type="text" name="nilai">	
	<input type="submit">
</form>