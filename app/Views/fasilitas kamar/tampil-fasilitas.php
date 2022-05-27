<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Kamar</h2>
<p>Berikut ini daftar kamar yang sudah terdaftar dalam database.</p>
<p>
    <a href="/fasilitas/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Kamar</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>Tipe Kamar</th>
            <th>Nama Fasilitas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        foreach ($ListFasilitas as $row) {
            $htmlData = '<tr>';
            $htmlData .= '<td class="text-center">' . $row['nama_tipe_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['nama_fasilitas'] . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/fasilitas/edit/' . $row['id_fasilitas_kamar'] . '" class="btn btn-info btn-sm mr-1">Update</a>';
            $htmlData .= '<a href="/fasilitas/hapus/' . $row['id_fasilitas_kamar'] . '" class="btn btn-danger btn-sm">Hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>