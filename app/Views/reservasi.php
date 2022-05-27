<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Reservasi</h2>
    </div>
    <?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
      <div class="alert alert-success">
        <?php echo session()->getFlashdata('berhasil'); ?>
      </div>
    <?php } ?>
    <!-- Tamu bakal ngisi apa aja? -->
    <!-- 
      1. Nama Lengkap 
      2. email 
      3. no_tlp
      4. nik
      5. cek in
      6. cek out
      7. tipe kamar
      8. jumlah kamar dipesan
    -->
    <!--
      Type ada:
      text, email, number, date
    -->
    <form class="row g-3" action="/reservasi" method="POST">
      <div class="col-12">
        <label for="nik" class="form-label">Nik</label>
        <input type="text" class="form-control" id="nik" placeholder="Masukkan nik" name="nik">
      </div>
      <div class="col-12">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap" name="nama">
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="MasukkanEmail" name="email">
      </div>
      <div class="col-md-6">
        <label for="no_hp" class="form-label">No Handphone</label>
        <input type="number" class="form-control" id="no_hp" placeholder="Masukkan No Handphone" name="no_hp">
      </div>
      <div class="col-md-8">
        <label for="inputTipeKamar" class="form-label">Tipe Kamar</label>
        <select id="inputTipeKamar" class="form-select" name="tipe_kamar">
          <?php foreach ($tipe_kamar as $tk) : ?>
            <option value="<?= $tk['id_tipe_kamar'] ?>"><?= $tk['nama_tipe_kamar'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-md-4">
        <label for="inputJulmahKamar" class="form-label">Jumlah Kamar</label>
        <input type="number" class="form-control" id="inputJulmahKamar" name="jumlah_kamar">
      </div>
      <div class="col-md-6">
        <label for="inputCheckin" class="form-label">Check-in</label>
        <input type="date" class="form-control" id="" name="checkin">
      </div>
      <div class="col-md-6">
        <label for="inputCheckout" class="form-label">Check-out</label>
        <input type="date" class="form-control" id="" name="checkout">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Pesan</button>
      </div>
    </form>

  </div>
</section><!-- End Portfolio Section -->
<?= $this->endSection() ?>