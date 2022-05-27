<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Fasilitas Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata fasilitas kamar baru</p>
<form method="POST" action="/fasilitas/simpan">
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <select name="tipe_kamar" class="form-control">
            <?php foreach ($tipe_kamar as $tk) : ?>
                <option value="<?= $tk['id_tipe_kamar'] ?>"><?= $tk['nama_tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Fasilitas Kamar</label>
        <input type="text" name="txtInputNamaFasilitas" class="form-control" placeholder="Masukan Fasilitas" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan Fasilitas</button>
    </div>
</form>
<?= $this->endSection() ?>