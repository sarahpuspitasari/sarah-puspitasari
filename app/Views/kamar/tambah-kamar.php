<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini!</p>
<form method="POST" action="/kamar/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nomor Kamar</label>
        <input type="text" name="txtNo" class="form-control" placeholder="Masukan No Kamar" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <select name="tipe_kamar" class="form-control">
            <?php foreach ($tipe_kamar as $tk) : ?>
                <option value="<?= $tk['id_tipe_kamar'] ?>"><?= $tk['nama_tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label class="exampleFormControlTextareal" class="font-weight-bold">Deskripsi Kamar</label>
        <textarea name="TxtInputDeskripsi" class="form-control rounded-0" id="exampleFormControlTextareal" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Kamar</label>
        <input type="file" name="txtInputFoto" class="form-control" placeholder="Masukan Foto" autocomplete="off">
    </div>
    <div class="form-group">
        </select>
    </div>
    <button class="btn btn-primary">Simpan Kamar</button>
    </div>
</form>
<?= $this->endSection() ?>