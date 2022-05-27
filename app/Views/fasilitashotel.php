<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg ">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Fasilitas Hotel</h2>
      <p>Berikut adalah data Fasilitas Hotel</p>
    </div>

    <div class="row">
      <?php foreach ($fasilitashotel as $row) : ?>
        <div class="col-md-6">
          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
            <img src="<?= base_url("/gambar/" . $row['foto']); ?>" class="testimonial-img" width="100" height="100" alt="">
            <h4><a href="#">Tipe Hotel : <?= $row['nama_fasilitas']; ?></a></h4>
            <p>Deskripsi Hotel : <?= $row['deskripsi']; ?></p>
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>
</section><!-- End Services Section -->
<?= $this->endSection() ?>