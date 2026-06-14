<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<?php
// Retrieve transaction data from session or use fallback demo data
$tx = session()->get('last_transaction') ?? [
    'transaction_code' => 'DANTE-882910',
    'game_name' => 'Mobile Legends',
    'nominal' => '86 Diamonds',
    'price' => 'Rp 20.000',
    'payment_method' => 'QRIS',
    'user_game_id' => '12345678',
    'zone_game_id' => '2001',
    'status' => 'Proses'
];
?>

<section class="row justify-content-center g-4 animate-fade-in-up">
    <div class="col-lg-8 text-center">
        <span class="section-kicker mb-3"><i class="bi bi-clock-history"></i> Pembayaran</span>
        <h1 class="mb-2">Menunggu pembayaran diselesaikan.</h1>
        <p class="text-soft mb-3">Silakan bayar sebelum batas waktu habis agar pesanan tetap aktif di sistem.</p>
        <div class="badge rounded-pill text-bg-light border px-3 py-2">Batas waktu: <span class="text-danger fw-bold">23:59:59</span></div>
    </div>

    <div class="col-lg-7">
        <div class="glass-card p-4 mb-4">
            <h5 class="mb-4">Ringkasan Pesanan</h5>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">No. Transaksi</span>
                <span class="fw-bold text-brand"><?= esc($tx['transaction_code']) ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">Produk</span>
                <span class="fw-semibold"><?= esc($tx['game_name']) ?> - <?= esc($tx['nominal']) ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">ID User</span>
                <span class="fw-semibold"><?= esc($tx['user_game_id']) ?> (<?= esc($tx['zone_game_id']) ?>)</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">Metode Pembayaran</span>
                <span class="fw-semibold"><?= esc($tx['payment_method']) ?></span>
            </div>
            <hr class="my-4">
            <div class="d-flex justify-content-between align-items-center">
                <span class="h6 mb-0">Total Tagihan</span>
                <h3 class="fw-bold text-brand mb-0"><?= esc($tx['price']) ?></h3>
            </div>
        </div>

        <div class="glass-card text-center p-4 p-lg-5">
            <span class="section-kicker mb-3">
                <?php if (strtolower($tx['payment_method']) === 'qris'): ?>
                    <i class="bi bi-qr-code"></i> QRIS
                <?php else: ?>
                    <i class="bi bi-wallet2"></i> <?= esc($tx['payment_method']) ?>
                <?php endif; ?>
            </span>
            <h4 class="mb-3">Scan / Selesaikan Pembayaran Anda</h4>
            
            <div class="bg-white p-3 d-inline-block rounded-4 border mb-3">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=<?= urlencode($tx['transaction_code'] . '|' . $tx['price']) ?>" alt="Payment QR / Code" class="img-fluid" style="border-radius: 8px;">
            </div>
            
            <p class="small text-soft mb-0">Silakan scan kode QR di atas menggunakan aplikasi e-wallet Anda untuk menyelesaikan pembayaran instan.</p>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="glass-card p-4 h-100">
            <h5 class="mb-3">Status Pembayaran</h5>
            <div class="timeline-card p-3 mb-3" style="border-left: 4px solid var(--brand);">
                <div class="fw-bold mb-1">1. Pembayaran diterima</div>
                <div class="small text-soft">Sistem menunggu notifikasi dari channel pembayaran.</div>
            </div>
            <div class="timeline-card p-3 mb-3">
                <div class="fw-bold mb-1">2. Pesanan diproses</div>
                <div class="small text-soft">Operator mengecek detail top up yang masuk.</div>
            </div>
            <div class="timeline-card p-3">
                <div class="fw-bold mb-1">3. Status selesai</div>
                <div class="small text-soft">Dashboard akan menampilkan pesanan berhasil diproses.</div>
            </div>
        </div>
    </div>

    <div class="col-12 text-center mt-4">
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= base_url('produk') ?>" class="btn btn-outline-brand rounded-pill px-4">Kembali ke Katalog</a>
            <?php if (session()->get('isLoggedIn') && session()->get('role') === 'Client'): ?>
                <a href="<?= base_url('profile') ?>" class="btn btn-brand rounded-pill px-4">Lihat Riwayat Saya</a>
            <?php endif; ?>
            <button onclick="window.print()" class="btn btn-brand rounded-pill px-4">Cetak Bukti Bayar</button>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
