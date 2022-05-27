<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg ">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Kamar Hotel</h2>
      <p>Berikut adalah data Fasilitas Kamar</p>
    </div>

    <div class="row">
      <?php foreach ($ListKamar as $row) {
      ?>
        <div class="col-md-6">
          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">

            <img src="<?= base_url("/gambar/" . $row['foto']); ?>" class="testimonial-img" width="100" height="100" alt="">
            <h4><a href="#">Tipe Kamar : <?= $row['nama_tipe_kamar']; ?></a></h4>
            <p>Deskripsi Kamar : <?= $row['deskripsi']; ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section><!-- End Services Section -->
<?= $this->endSection() ?>