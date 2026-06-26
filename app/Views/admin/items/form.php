<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="card p-4">
    <form action="<?= $item ? base_url('admin/items/update/' . $item['id']) : base_url('admin/items/store') ?>" method="POST" class="row g-3">
        <input type="hidden" name="game_id" value="<?= $item ? (int)$item['game_id'] : (int)$game['id'] ?>">

        <div class="col-md-6">
            <label class="form-label fw-semibold small">Game</label>
            <input type="text" class="form-control" value="<?= esc($item ? $game['name'] ?? '-' : $game['name']) ?>" disabled>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Nama Nominal</label>
            <input type="text" name="title" class="form-control" value="<?= $item ? esc($item['title']) : '' ?>" placeholder="contoh: 86 Diamonds" required>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold small">Harga (Rp)</label>
            <input type="number" name="price" class="form-control" value="<?= $item ? (float)$item['price'] : '' ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold small">Harga Asli (Rp) <small class="text-muted">(opsional)</small></label>
            <input type="number" name="original_price" class="form-control" value="<?= $item && $item['original_price'] ? (float)$item['original_price'] : '' ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold small">Diskon <small class="text-muted">(opsional)</small></label>
            <input type="text" name="discount" class="form-control" value="<?= $item ? esc($item['discount'] ?? '') : '' ?>" placeholder="contoh: 20%">
        </div>
        <div class="col-12">
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-brand rounded-pill px-4"><?= $item ? 'Perbarui' : 'Simpan' ?></button>
                <a href="<?= base_url('admin/items') ?>" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
