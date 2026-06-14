<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<?php
// Compute statistics from transactions database
$totalOrders = count($transactions);
$successOrders = 0;
$pendingOrders = 0;
$revenue = 0;

foreach ($transactions as $t) {
    $status = $t['status'] ?? 'Proses';
    if ($status === 'Selesai') {
        $successOrders++;
        
        // Extract numeric value from price (e.g. "Rp 20.000" -> 20000)
        $cleanPrice = preg_replace('/[^0-9]/', '', $t['price']);
        $revenue += (int)$cleanPrice;
    } elseif ($status === 'Proses') {
        $pendingOrders++;
    }
}

$successRate = $totalOrders > 0 ? round(($successOrders / $totalOrders) * 100, 1) : 100;
?>

<section class="mb-4 animate-fade-in-down">
    <span class="section-kicker mb-2"><i class="bi bi-speedometer2"></i> Dashboard Operasional</span>
    <h1 class="mb-2">Ringkasan aktivitas top up dalam satu tampilan.</h1>
    <p class="text-soft mb-0">Dashboard ini dirapikan supaya owner atau operator bisa memantau order, payment, dan status layanan secara langsung.</p>
</section>

<section class="row g-3 mb-4 animate-fade-in">
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Total Pesanan</div>
            <div class="display-6 fw-bold mb-0 text-dark"><?= $totalOrders ?></div>
            <div class="small text-success fw-semibold"><i class="bi bi-graph-up"></i> Akumulasi order</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Order Sukses</div>
            <div class="display-6 fw-bold mb-0 text-success"><?= $successOrders ?></div>
            <div class="small text-success fw-semibold"><i class="bi bi-check2-circle"></i> Sukses Rate: <?= $successRate ?>%</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Pending / Proses</div>
            <div class="display-6 fw-bold mb-0 text-warning"><?= $pendingOrders ?></div>
            <div class="small text-warning fw-semibold"><i class="bi bi-hourglass-split"></i> Perlu dipantau</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Omzet Sukses</div>
            <div class="display-6 fw-bold mb-0 text-brand">Rp <?= number_format($revenue, 0, ',', '.') ?></div>
            <div class="small text-brand fw-semibold"><i class="bi bi-cash-stack"></i> Total Pendapatan</div>
        </div>
    </div>
</section>

<section class="row g-4 mb-4 animate-fade-in-up">
    <div class="col-lg-8">
        <div class="glass-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                <div>
                    <h5 class="mb-1">Order Terbaru</h5>
                    <div class="small text-soft">Daftar transaksi terakhir yang masuk ke dalam sistem.</div>
                </div>
                <span class="badge rounded-pill text-bg-primary-subtle text-brand border border-primary-subtle px-3 py-2">Realtime data</span>
            </div>
            
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr class="text-soft">
                            <th>No. Transaksi</th>
                            <th>Produk</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($transactions)): ?>
                            <tr>
                                <td colspan="4" class="text-center text-soft py-4">Belum ada transaksi di database.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($transactions as $t): ?>
                                <tr>
                                    <td class="fw-bold">
                                        <?= esc($t['transaction_code']) ?>
                                        <small class="d-block text-soft fw-normal" style="font-size: 0.72rem;">
                                            ID: <?= esc($t['user_game_id']) ?> (<?= esc($t['zone_game_id']) ?>)
                                        </small>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark"><?= esc($t['game_name']) ?></div>
                                        <small class="text-soft"><?= esc($t['nominal']) ?></small>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill text-bg-light border text-uppercase">
                                            <?= esc($t['payment_method']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if (($t['status'] ?? '') === 'Selesai'): ?>
                                            <span class="badge rounded-pill text-bg-success">Selesai</span>
                                        <?php elseif (($t['status'] ?? '') === 'Batal'): ?>
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
        <div class="glass-card p-4 h-100">
            <h5 class="mb-3">Channel Pembayaran</h5>
            <?php
            // Calculate percentage of payment methods dynamically
            $methods = [];
            foreach ($transactions as $t) {
                $m = strtoupper($t['payment_method']);
                $methods[$m] = ($methods[$m] ?? 0) + 1;
            }
            arsort($methods);
            
            if ($totalOrders > 0):
                foreach ($methods as $method => $count):
                    $pct = round(($count / $totalOrders) * 100);
            ?>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-soft"><?= esc($method) ?></span>
                        <span class="fw-bold"><?= $pct ?>%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-brand" style="width: <?= $pct ?>%"></div>
                    </div>
                </div>
            <?php 
                endforeach;
            else:
            ?>
                <p class="text-soft small">Belum ada data channel aktif.</p>
            <?php endif; ?>
            
            <div class="summary-card p-3 mt-4">
                <div class="fw-bold mb-1">Catatan Operasional</div>
                <div class="small text-soft">Data di dashboard ini bersinkronisasi langsung dengan file `writable/transactions.json` secara dinamis.</div>
            </div>
        </div>
    </div>
</section>

<section class="row g-3">
    <div class="col-md-4">
        <div class="feature-card p-4 h-100">
            <div class="mb-3 text-brand fs-3"><i class="bi bi-inbox"></i></div>
            <h5>Pesanan Baru</h5>
            <p class="mb-0 text-soft">Operator bisa melihat order yang masuk secara langsung tanpa membuka halaman lain.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card p-4 h-100">
            <div class="mb-3 text-brand fs-3"><i class="bi bi-credit-card-2-front"></i></div>
            <h5>Channel Aktif</h5>
            <p class="mb-0 text-soft">Metode pembayaran yang digunakan pelanggan ditampilkan lebih ringkas.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card p-4 h-100">
            <div class="mb-3 text-brand fs-3"><i class="bi bi-sliders"></i></div>
            <h5>Siap Dikembangkan</h5>
            <p class="mb-0 text-soft">Struktur ini bisa diperluas ke halaman admin yang lebih lengkap saat dibutuhkan.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>