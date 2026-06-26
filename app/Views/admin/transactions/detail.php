<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card p-4">
            <h5 class="fw-bold mb-4">Informasi Transaksi</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <small class="text-muted d-block">No. Transaksi</small>
                    <span class="fw-semibold" style="color:var(--brand);"><?= esc($tx['transaction_code'] ?? '-') ?></span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Tanggal</small>
                    <span class="fw-semibold"><?= date('d M Y H:i:s', strtotime($tx['created_at'])) ?></span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Game</small>
                    <span class="fw-semibold"><?= esc($tx['game_name'] ?? '-') ?></span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Nominal</small>
                    <span class="fw-semibold"><?= esc($tx['nominal'] ?? '-') ?></span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">ID Player</small>
                    <span><code><?= esc($tx['user_game_id'] ?? '-') ?></code></span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Zone / Server</small>
                    <span><code><?= esc($tx['zone_game_id'] ?? '-') ?></code></span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Metode Pembayaran</small>
                    <span class="badge rounded-pill text-bg-light border text-uppercase"><?= esc($tx['payment_method'] ?? '-') ?></span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Total Harga</small>
                    <span class="fw-bold fs-5" style="color:var(--brand);"><?= esc($tx['price'] ?? '-') ?></span>
                </div>
                <div class="col-12">
                    <small class="text-muted d-block">Status</small>
                    <?php $s = $tx['status'] ?? 'Proses'; ?>
                    <?php if ($s === 'Selesai'): ?>
                        <span class="badge rounded-pill text-bg-success fs-6 px-3 py-2">Selesai</span>
                    <?php elseif ($s === 'Batal'): ?>
                        <span class="badge rounded-pill text-bg-danger fs-6 px-3 py-2">Batal</span>
                    <?php else: ?>
                        <span class="badge rounded-pill text-bg-warning text-dark fs-6 px-3 py-2">Proses</span>
                    <?php endif; ?>
                </div>
                <?php if (isset($tx['user_id'])): ?>
                <div class="col-md-6">
                    <small class="text-muted d-block">User ID (Akun)</small>
                    <span class="fw-semibold">#<?= (int)$tx['user_id'] ?></span>
                </div>
                <?php endif; ?>
                <?php if (!empty($tx['payment_proof'])): ?>
                <div class="col-12">
                    <small class="text-muted d-block">Bukti Pembayaran</small>
                    <a href="<?= base_url($tx['payment_proof']) ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill mt-1">
                        <i class="bi bi-image me-1"></i> Lihat Bukti
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card p-4">
            <h5 class="fw-bold mb-4">Update Status</h5>
            <form action="<?= base_url('admin/transactions/update-status/' . $tx['id']) ?>" method="POST">
                <div class="mb-3">
                    <select name="status" class="form-select">
                        <option value="Proses" <?= ($tx['status'] ?? '') === 'Proses' ? 'selected' : '' ?>>Proses</option>
                        <option value="Selesai" <?= ($tx['status'] ?? '') === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="Batal" <?= ($tx['status'] ?? '') === 'Batal' ? 'selected' : '' ?>>Batal</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-brand w-100 rounded-pill">Perbarui Status</button>
            </form>
            <hr>
            <div class="d-grid">
                <a href="<?= base_url('admin/transactions') ?>" class="btn btn-outline-secondary rounded-pill">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
