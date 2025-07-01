<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashData('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session()->getFlashData('success') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if (session()->getFlashData('failed')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= session()->getFlashData('failed') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
  Tambah Diskon
</button>

<table class="table datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal</th>
      <th>Nominal (Rp)</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($diskon as $index => $d) : ?>
    <tr>
      <td><?= $index + 1 ?></td>
      <td><?= $d['tanggal'] ?></td>
      <td><?= number_format($d['nominal'], 0, ',', '.') ?></td>
      <td>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
          data-bs-target="#editModal-<?= $d['id'] ?>">
          Ubah
        </button>
        <a href="<?= base_url('diskon/delete/' . $d['id']) ?>" class="btn btn-danger btn-sm"
          onclick="return confirm('Yakin hapus data ini ?')">Hapus</a>
      </td>
    </tr>

    <!-- Edit Modal Begin -->
    <div class="modal fade" id="editModal-<?= $d['id'] ?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Diskon</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('diskon/edit/' . $d['id']) ?>" method="post">
            <?= csrf_field(); ?>
            <div class="modal-body">
              <div class="form-group mb-4">
                <label class="form-label" for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $d['tanggal'] ?>"
                  readonly>
              </div>
              <div class="form-group">
                <label class="form-label" for="nominal">Diskon (Rp)</label>
                <input type="number" id="nominal" name="nominal" class="form-control" value="<?= $d['nominal'] ?>"
                  required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Edit Modal End -->

    <?php endforeach ?>
  </tbody>
</table>

<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Diskon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('diskon') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="form-group mb-4">
            <label class="form-label" for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="nominal">Diskon (Rp)</label>
            <input type="number" id="nominal" name="nominal" class="form-control" placeholder="Contoh: 100000" required>
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