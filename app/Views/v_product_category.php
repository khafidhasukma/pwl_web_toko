<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
if (session()->getFlashData('success')) {
?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?= session()->getFlashData('success') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if (session()->getFlashData('failed')) {
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= session()->getFlashData('failed') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
  Tambah Data
</button>

<!-- Table with stripped rows -->
<table class="table datatable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Deskripsi</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($product_category as $index => $category) : ?>
    <tr>
      <th scope="row"><?php echo $index + 1 ?></th>
      <td><?php echo $category['name'] ?></td>
      <td><?php echo $category['description'] ?></td>

      <td>
        <button type="button" class="btn btn-success" data-bs-toggle="modal"
          data-bs-target="#editModal-<?= $category['id'] ?>">
          Ubah
        </button>
        <a href="<?= base_url('produk-kategori/delete/' . $category['id']) ?>" class="btn btn-danger"
          onclick="return confirm('Yakin hapus data ini ?')">
          Hapus
        </a>
      </td>
    </tr>

    <!-- Edit Modal Begin -->
    <div class="modal fade" id="editModal-<?= $category['id'] ?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('produk-kategori/edit/' . $category['id']) ?>" method="post"
            enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="modal-body">
              <div class="form-group mb-2">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" value="<?= $category['name'] ?>"
                  placeholder="Nama Barang" required>
              </div>
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" placeholder="Deskripsi Barang" required
                  class="form-control"><?= $category['description'] ?></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Edit Modal End -->

    <?php endforeach ?>
  </tbody>
</table>
<!-- End Table with stripped rows -->

<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('produk-kategori') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="form-group mb-2">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Barang" required>
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" placeholder="Deskripsi Barang" required
              class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Modal End -->
<?= $this->endSection() ?>