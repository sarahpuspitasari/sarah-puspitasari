<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Edit Fasilitas</h2>
<p>Silahkan masukan data Fasilitas Kamar baru pada form dibawah ini!</p>

<form method="POST" action="/fasilitas/update" enctype="multipart/form-data">
    <div class="form-group">id Fasilitas</label>
        <input type="text" name="idfas" class="form-control" placeholder="Masukan Nama Fasilitas" value="<?= $detailFasilitas['id_fasilitas_kamar']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">TipeKamar</label>
        <select name="tipe_kamar" class="form-control">
            <?php foreach ($tipe_kamar as $tk) : ?>
                <option value="<?= $tk['id_tipe_kamar'] ?>" <?= ($detailFasilitas['id_tipe_kamar'] == $tk['id_tipe_kamar'] ? 'selected' : '') ?>><?= $tk['nama_tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas</label>
        <input type="text" name="txtInputNamaFasilitas" class="form-control" placeholder="Masukan Nama Fasilitas" value="<?= $detailFasilitas['nama_fasilitas']; ?>">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Fasilitas</button>
    </div>
</form>
<?= $this->endSection() ?>