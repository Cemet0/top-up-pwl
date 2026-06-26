<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="card p-4">
    <form action="<?= $payment ? base_url('admin/payments/update/' . $payment['id']) : base_url('admin/payments/store') ?>" method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold small">Nama Metode</label>
            <input type="text" name="name" class="form-control" value="<?= $payment ? esc($payment['name']) : '' ?>" placeholder="contoh: QRIS" required>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold small">Kode</label>
            <input type="text" name="code" class="form-control" value="<?= $payment ? esc($payment['code']) : '' ?>" placeholder="contoh: QRIS" required>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold small">Biaya Admin (Rp)</label>
            <input type="number" name="fee" class="form-control" value="<?= $payment ? (float)$payment['fee'] : '0' ?>" min="0">
        </div>
        <div class="col-12">
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-brand rounded-pill px-4"><?= $payment ? 'Perbarui' : 'Simpan' ?></button>
                <a href="<?= base_url('admin/payments') ?>" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
