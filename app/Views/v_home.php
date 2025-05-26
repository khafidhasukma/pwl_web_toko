<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<!-- Table with stripped rows -->
<div class="row">
  <?php foreach ($product as $key => $item) : ?>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <img src="<?php echo base_url() . "img/" . $item['foto'] ?>" alt="..." width="100%">
        <h5 class="card-title"><?php echo $item['nama'] ?><br><?php echo $item['harga'] ?></h5>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>
<!-- End Table with stripped rows -->
<?= $this->endSection() ?>