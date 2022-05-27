<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas Hotel</h2>
<p>Silahkan Masukan data fasilitas hotel baru pada form dibawah ini.</p>
<form method="POST" action="/hotel/update" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Nama Fasilitas Hotel</label>
<input type="hidden" name="idfas" value="<?=$detailHotel[0]['id_fasilitas'];?>">
<input type="text" name="txtInputFasilitasHotel"
class="form-control" placeholder="Masukan Fasilitas Hotel" value="<?=$detailHotel[0]['nama_fasilitas'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi Hotel</label>
<input type="text" name="txtInputDeskripsi"
class="form-control" placeholder="Masukan Deskripsi" value="<?=$detailHotel[0]['deskripsi'];?>">
</div>
<div class="form-group">
<button class="btn btn-primary">Update Fasilitas Hotel</button>
</div>
</form>
<?= $this->endSection();?>