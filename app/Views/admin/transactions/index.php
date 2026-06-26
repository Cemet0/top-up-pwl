<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="card p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No. Transaksi</th>
                    <th>Game</th>
                    <th>Nominal</th>
                    <th>ID Player</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($transactions)): ?>
                    <tr><td colspan="10" class="text-center text-muted py-4">Belum ada transaksi.</td></tr>
                <?php else: ?>
                    <?php foreach ($transactions as $i => $t): ?>
                    <tr>
                        <td class="text-muted"><?= $i + 1 ?></td>
                        <td class="fw-semibold" style="color:var(--brand);"><?= esc($t['transaction_code'] ?? '-') ?></td>
                        <td><?= esc($t['game_name'] ?? '-') ?></td>
                        <td><?= esc($t['nominal'] ?? '-') ?></td>
                        <td><code><?= esc($t['user_game_id'] ?? '-') ?></code> <small class="text-muted">(<?= esc($t['zone_game_id'] ?? '-') ?>)</small></td>
                        <td><span class="badge rounded-pill text-bg-light border text-uppercase"><?= esc($t['payment_method'] ?? '-') ?></span></td>
                        <td class="fw-semibold"><?= esc($t['price'] ?? '-') ?></td>
                        <td>
                            <?php $s = $t['status'] ?? 'Proses'; ?>
                            <?php if ($s === 'Selesai'): ?>
                                <span class="badge rounded-pill text-bg-success">Selesai</span>
                            <?php elseif ($s === 'Batal'): ?>
                                <span class="badge rounded-pill text-bg-danger">Batal</span>
                            <?php else: ?>
                                <span class="badge rounded-pill text-bg-warning text-dark">Proses</span>
                            <?php endif; ?>
                        </td>
                        <td class="small text-muted"><?= date('d M Y H:i', strtotime($t['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/transactions/detail/' . $t['id']) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-eye"></i></a>
                            <a href="<?= base_url('admin/transactions/delete/' . $t['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill" data-confirm="Hapus transaksi <?= esc($t['transaction_code'] ?? '') ?>?"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
