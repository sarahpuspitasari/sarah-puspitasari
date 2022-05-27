<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini!</p>
<form method="POST" action="/kamar/update" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nomor Kamar</label>
        <input type="text" name="txtNo" class="form-control" placeholder="Masukan No Kamar" value="<?= $detailKamar[0]['nomor_kamar']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <select name="tipe_kamar" class="form-control">
            <?php foreach ($tipe_kamar as $tk) : ?>
                <option value="<?= $tk['id_tipe_kamar'] ?>" <?= ($detailKamar[0]['id_tipe_kamar'] == $tk['id_tipe_kamar'] ? 'selected' : '') ?>><?= $tk['nama_tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Deskripsi Kamar</label>
        <textarea name="TxtInputDeskripsi" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3"><?= $detailKamar[0]['deskripsi']; ?></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Kamar</label><br />
        <?php
        if (!empty($detailKamar[0]['foto'])) {
            echo '<img src="' . base_url("/gambar/" . $detailKamar[0]['foto']) . '" width="150">';
        }
        ?>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Kamar</button>
    </div>
</form>
<?= $this->endSection() ?>