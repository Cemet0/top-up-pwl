<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<!-- Profile and Purchase History Section -->
<div class="row g-4 animate-fade-in-up">
    <!-- User Profile Summary Column -->
    <div class="col-lg-4">
        <div class="glass-card p-4 h-100 position-relative overflow-hidden" style="
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.18);
        ">
            <!-- Subtle Reflection Glow -->
            <div class="reflection-glow" style="
                position: absolute;
                top: -30%;
                left: -30%;
                width: 160%;
                height: 160%;
                background: radial-gradient(circle at center, rgba(18, 93, 255, 0.07) 0%, transparent 60%);
                pointer-events: none;
                z-index: 0;
            "></div>

            <div class="position-relative" style="z-index: 1;">
                <div class="text-center mb-4">
                    <!-- Profile avatar circle -->
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 bg-brand" style="
                        width: 90px;
                        height: 90px;
                        box-shadow: 0 12px 24px rgba(18, 93, 255, 0.25);
                        border: 4px solid rgba(255, 255, 255, 0.5);
                    ">
                        <i class="bi bi-person-fill text-white fs-1"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-1"><?= esc(session()->get('username')) ?></h3>
                    <span class="badge rounded-pill bg-primary px-3 py-2 text-uppercase" style="letter-spacing: 0.5px; font-size: 0.72rem;">
                        <?= esc(session()->get('role')) ?>
                    </span>
                </div>

                <hr class="my-4 opacity-10">

                <h6 class="fw-bold text-uppercase text-soft small mb-3">Informasi Akun</h6>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-soft small"><i class="bi bi-envelope-fill me-1"></i> Email</span>
                        <span class="fw-semibold text-dark"><?= esc(session()->get('email') ?? 'client@gmail.com') ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-soft small"><i class="bi bi-calendar-event-fill me-1"></i> Terdaftar</span>
                        <span class="fw-semibold text-dark">Juni 2026</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-soft small"><i class="bi bi-shield-check me-1"></i> Status</span>
                        <span class="text-success fw-bold"><i class="bi bi-check-circle-fill"></i> Aktif</span>
                    </div>
                </div>

                <hr class="my-4 opacity-10">

                <h6 class="fw-bold text-uppercase text-soft small mb-3">Statistik Transaksi</h6>
                <div class="row g-2">
                    <div class="col-6">
                        <div class="p-3 rounded-4 bg-light text-center border-0">
                            <span class="d-block text-soft small mb-1">Total Order</span>
                            <span class="fs-4 fw-bold text-dark"><?= count($transactions) ?></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded-4 bg-light text-center border-0">
                            <span class="d-block text-soft small mb-1">Selesai</span>
                            <?php
                            $successCount = 0;
                            foreach ($transactions as $t) {
                                if (($t['status'] ?? '') === 'Selesai') $successCount++;
                            }
                            ?>
                            <span class="fs-4 fw-bold text-success"><?= $successCount ?></span>
                        </div>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger rounded-pill py-2">
                        <i class="bi bi-box-arrow-right me-1"></i> Keluar Akun
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Purchase History Column -->
    <div class="col-lg-8">
        <div class="glass-card p-4 h-100" style="
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.18);
        ">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                <div>
                    <h4 class="mb-1 fw-bold text-dark">Riwayat Pembelian</h4>
                    <p class="small text-soft mb-0">Daftar transaksi top up game yang telah Anda lakukan.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= base_url('profile/download') ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Download PDF
                    </a>
                    <a href="<?= base_url('produk') ?>" class="btn btn-brand btn-sm rounded-pill px-3">
                        <i class="bi bi-plus-circle-fill me-1"></i> Top Up Baru
                    </a>
                </div>
            </div>

            <?php if (empty($transactions)): ?>
                <!-- Empty State -->
                <div class="text-center py-5">
                    <div class="mb-3 text-muted" style="font-size: 4rem;">
                        <i class="bi bi-receipt-cutoff"></i>
                    </div>
                    <h5>Belum Ada Transaksi</h5>
                    <p class="text-soft small mb-4">Semua riwayat top up Anda akan tercatat secara otomatis di sini.</p>
                    <a href="<?= base_url('produk') ?>" class="btn btn-brand rounded-pill px-4">Beli Diamonds Sekarang</a>
                </div>
            <?php else: ?>
                <!-- Transactions Table -->
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr class="text-soft">
                                <th class="border-0">No. Transaksi</th>
                                <th class="border-0">Game / Nominal</th>
                                <th class="border-0">Metode</th>
                                <th class="border-0">Total Harga</th>
                                <th class="border-0">Status</th>
                                <th class="border-0">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transactions as $t): ?>
                                <tr>
                                    <td class="fw-bold text-brand">
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
                                        <span class="badge rounded-pill text-bg-light border px-2 py-1 text-uppercase">
                                            <?= esc($t['payment_method']) ?>
                                        </span>
                                    </td>
                                    <td class="fw-bold text-dark"><?= esc($t['price']) ?></td>
                                    <td>
                                        <?php if (($t['status'] ?? '') === 'Selesai'): ?>
                                            <span class="badge rounded-pill text-bg-success px-2 py-1">Selesai</span>
                                        <?php elseif (($t['status'] ?? '') === 'Batal'): ?>
                                            <span class="badge rounded-pill text-bg-danger px-2 py-1">Batal</span>
                                        <?php else: ?>
                                            <span class="badge rounded-pill text-bg-warning text-dark px-2 py-1">Proses</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-soft small">
                                        <?= date('d M Y, H:i', strtotime($t['created_at'])) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
