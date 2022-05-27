<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>Berikut ini daftar kamar yang sudah terdaftar dalam database.</p>
<p>
    <a href="/kamar/tambah" class="btn btn-primary btn-sm">Tambah Kamar</a>
<p>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>No Kamar</th>
            <th>Tipe Kamar</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        foreach ($ListKamar as $row) {
            $htmlData = '<tr>';
            $htmlData .= '<td class="text-center">' . $row['nomor_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['nama_tipe_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['deskripsi'] . '</td>';
            $htmlData .= '<td class="text-center">' . '<img src="' . base_url("gambar/" . $row['foto']) . '"width="150">' . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/kamar/edit/' . $row['id_kamar'] . '" class="btn btn-info btn-sm mr-1">Update</a>';
            $htmlData .= '<a href="/kamar/editfoto/' . $row['id_kamar'] . '" class="btn btn-info btn-sm mr-1">Foto</a>';
            $htmlData .= '<a href="/kamar/hapus/' . $row['id_kamar'] . '" class="btn btn-danger btn-sm">Hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>