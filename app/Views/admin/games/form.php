<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="card p-4">
    <form action="<?= $game ? base_url('admin/games/update/' . $game['id']) : base_url('admin/games/store') ?>" method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Nama Game</label>
            <input type="text" name="name" class="form-control" value="<?= $game ? esc($game['name']) : '' ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Provider</label>
            <input type="text" name="provider" class="form-control" value="<?= $game ? esc($game['provider']) : '' ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold small">Nama File Gambar</label>
            <input type="text" name="img" class="form-control" value="<?= $game ? esc($game['img'] ?? '') : '' ?>" placeholder="contoh: iconMl.png">
            <small class="text-muted">Letakkan di public/assets/img/</small>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold small">Link / Slug</label>
            <input type="text" name="link" class="form-control" value="<?= $game ? esc($game['link'] ?? '') : '' ?>" placeholder="contoh: detail-mlbb" required>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold small">Badge</label>
            <input type="text" name="badge" class="form-control" value="<?= $game ? esc($game['badge'] ?? '') : '' ?>" placeholder="Populer, Best Seller, dll">
        </div>
        <div class="col-12">
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-brand rounded-pill px-4"><?= $game ? 'Perbarui' : 'Simpan' ?></button>
                <a href="<?= base_url('admin/games') ?>" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
