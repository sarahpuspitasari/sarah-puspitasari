<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas Hotel</h2>
<p>Silahkan Masukan data fasilitas hotel baru pada form dibawah ini.</p>
<form method="POST" action="/hotel/updatefoto" enctype="multipart/form-data">
	<input type="hidden" name="idfas" value="<?= $detailHotel['id_fasilitas']; ?>">
	<div class="form-group">
		<label class="font-weight-bold">Foto hotel</label>
		<input type="file" name="txtInputFoto" class="form-control">
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Update Fasilitas Hotel</button>
	</div>
</form>
<?= $this->endSection(); ?>