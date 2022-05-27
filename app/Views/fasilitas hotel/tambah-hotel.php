<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas Hotel</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata fasilitas hotel baru</p>
<form method="POST" action="/hotel/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold"> Nama Fas</label>
<input type="text" name="txtInputFasilitasHotel" class="form-control" placeholder="Masukan tipe kamar" autocomplete="off" autofocus> </div>
<div class="form-group">
<label for="exampleFormControlTextarea1" class="font-weight-bold">Deskripsi</label>
<textarea name="txtInputDeskripsi" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
</div>
<div class="form-group">
<label class="font-weight-bold"> Foto</label>
<input type="file" name="txtInputFoto" class="form-control" placeholder="Masukan foto" autocomplete="off">
</div>
<div class="form-group">
</select>
</div>
<button class="btn btn-primary">Simpan Hotel</button>
</div>
</form>
<?= $this->endSection() ?>