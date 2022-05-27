<!-- <?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas</h2>
<p>Silahkan masukan data fasilitas Kamar baru pada form dibawah.</p>
<form method="POST" action="/reservasi/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">No Tamu</label>
<input type="text" name="txttipeNoTamu"
class="form-control" placeholder="Masukan No Tamu" autocomplete="off" autofocus required>
</div>
<div class="form-group">
<label class="font-weight-bold">Id Tamu</label>
<input type="text" name="txtInputIdTamu" class="form-control" placeholder="Masukan Id Tamu" autocomplete="off" required>
</div>
<div class="form-group">
<label class="font-weight-bold">Cek In</label>
<input type="text" name="txtInputCekIn" class="form-control" placeholder="Tanggal cek in" autocomplete="off" required>
</div>
<div class="form-group">
<label class="font-weight-bold">Cek Out</label>
<input type="text" name="txtInputCekOut" class="form-control" placeholder="Tanggal cek out" autocomplete="off" required>
</div>
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtInputTipeKamar" class="form-control" placeholder="Masukan Tipe Kamar" autocomplete="off" required>
</div>
<div class="form-group">
<label class="font-weight-bold">Jumlah Kamar</label>
<input type="text" name="txtInputJumlah Kamar" class="form-control" placeholder="Masukan Jumlah Kamar" autocomplete="off" required>
</div>
<div class="form-group">
<label class="font-weight-bold">Harga</label>
<input type="text" name="txtInputHarga" class="form-control" placeholder="Masukan Harga" autocomplete="off" required>
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Reservasi</button>
</div>
</form>
<?= $this->endSection() ?> -->