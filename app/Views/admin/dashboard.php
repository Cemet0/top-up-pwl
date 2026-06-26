<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card stat-card p-4 bg-primary bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Total Pesanan</span>
                    <h2 class="fw-bold mb-0 mt-2"><?= $totalOrders ?></h2>
                </div>
                <div class="bg-primary bg-opacity-25 rounded-3 p-3">
                    <i class="bi bi-cart-check fs-3 text-primary"></i>
                </div>
            </div>
            <small class="text-muted mt-2"><i class="bi bi-clock me-1"></i> Akumulasi semua transaksi</small>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card stat-card p-4 bg-success bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Sukses</span>
                    <h2 class="fw-bold mb-0 mt-2 text-success"><?= $successOrders ?></h2>
                </div>
                <div class="bg-success bg-opacity-25 rounded-3 p-3">
                    <i class="bi bi-check-circle fs-3 text-success"></i>
                </div>
            </div>
            <small class="text-muted mt-2"><i class="bi bi-graph-up me-1"></i> Sukses Rate: <?= $totalOrders > 0 ? round(($successOrders / $totalOrders) * 100, 1) : 100 ?>%</small>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card stat-card p-4 bg-warning bg-opacity-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Pending</span>
                    <h2 class="fw-bold mb-0 mt-2 text-warning"><?= $pendingOrders ?></h2>
                </div>
                <div class="bg-warning bg-opacity-25 rounded-3 p-3">
                    <i class="bi bi-hourglass-split fs-3 text-warning"></i>
                </div>
            </div>
            <small class="text-muted mt-2"><i class="bi bi-eye me-1"></i> Perlu dipantau</small>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card stat-card p-4" style="background: rgba(18,93,255,0.06);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Omzet</span>
                    <h2 class="fw-bold mb-0 mt-2" style="color:var(--brand);">Rp <?= number_format($revenue, 0, ',', '.') ?></h2>
                </div>
                <div style="background:rgba(18,93,255,0.15);" class="rounded-3 p-3">
                    <i class="bi bi-cash-stack fs-3" style="color:var(--brand);"></i>
                </div>
            </div>
            <small class="text-muted mt-2"><i class="bi bi-currency-dollar me-1"></i> Total pendapatan</small>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Game</span>
                    <h2 class="fw-bold mb-0 mt-2"><?= $totalGames ?></h2>
                </div>
                <div class="badge-brand rounded-3 p-3">
                    <i class="bi bi-controller fs-3" style="color:var(--brand);"></i>
                </div>
            </div>
            <small class="text-muted mt-2"><i class="bi bi-joystick me-1"></i> Produk aktif</small>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card stat-card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Pengguna</span>
                    <h2 class="fw-bold mb-0 mt-2"><?= $totalUsers ?></h2>
                </div>
                <div class="badge-brand rounded-3 p-3">
                    <i class="bi bi-people fs-3" style="color:var(--brand);"></i>
                </div>
            </div>
            <small class="text-muted mt-2"><i class="bi bi-person-badge me-1"></i> Terdaftar</small>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                <h5 class="mb-0 fw-bold">Transaksi Terbaru</h5>
                <a href="<?= base_url('admin/transactions') ?>" class="btn btn-outline-brand btn-sm rounded-pill px-3">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Produk</th>
                            <th>Pembayaran</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($transactions)): ?>
                            <tr><td colspan="5" class="text-center text-muted py-4">Belum ada transaksi.</td></tr>
                        <?php else: ?>
                            <?php $i = 0; foreach ($transactions as $t): $i++; if ($i > 10) break; ?>
                            <tr>
                                <td class="fw-semibold" style="color:var(--brand);"><?= esc($t['transaction_code'] ?? '-') ?></td>
                                <td><?= esc($t['game_name'] ?? '-') ?> <small class="d-block text-muted"><?= esc($t['nominal'] ?? '') ?></small></td>
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
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card p-4">
            <h5 class="fw-bold mb-3">Channel Pembayaran</h5>
            <?php
            $methods = [];
            foreach ($transactions as $t) {
                $m = strtoupper($t['payment_method'] ?? '-');
                $methods[$m] = ($methods[$m] ?? 0) + 1;
            }
            arsort($methods);
            if ($totalOrders > 0):
                foreach ($methods as $method => $count):
                    $pct = round(($count / $totalOrders) * 100);
            ?>
                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1">
                        <span class="text-muted"><?= esc($method) ?></span>
                        <span class="fw-bold"><?= $pct ?>%</span>
                    </div>
                    <div class="progress" style="height:8px;">
                        <div class="progress-bar" style="background:var(--brand);width:<?= $pct ?>%;"></div>
                    </div>
                </div>
            <?php endforeach;
            else: ?>
                <p class="text-muted small">Belum ada data.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
