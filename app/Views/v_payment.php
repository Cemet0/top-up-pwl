<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<?php
$tx = session()->get('last_transaction') ?? [
    'transaction_code' => 'DANTE-882910',
    'game_name' => 'Mobile Legends',
    'nominal' => '86 Diamonds',
    'price' => 'Rp 20.000',
    'payment_method' => 'QRIS',
    'user_game_id' => '12345678',
    'zone_game_id' => '2001',
    'status' => 'Proses',
    'expires_at' => date('Y-m-d H:i:s', strtotime('+5 minutes')),
];
$isCompleted = ($tx['status'] ?? 'Proses') === 'Selesai';
$expiresAt = $tx['expires_at'] ?? date('Y-m-d H:i:s', strtotime('+5 minutes'));
$expiresTimestamp = strtotime($expiresAt) * 1000;
?>

<section class="row justify-content-center g-4 animate-fade-in-up">
    <div class="col-lg-8 text-center">
        <span class="section-kicker mb-3"><i class="bi bi-clock-history"></i> Pembayaran</span>
        <h1 class="mb-2"><?= $isCompleted ? 'Pembayaran Selesai' : 'Menunggu pembayaran diselesaikan.' ?></h1>
        <p class="text-soft mb-3">
            <?= $isCompleted
                ? 'Transaksi telah selesai. Terima kasih!'
                : 'Silakan bayar sebelum batas waktu habis agar pesanan tetap aktif di sistem.' ?>
        </p>

        <?php if (!$isCompleted): ?>
        <div class="badge rounded-pill text-bg-light border px-4 py-2 mb-2">
            <i class="bi bi-hourglass-split me-1"></i> Sisa waktu:
            <span class="text-danger fw-bold countdown-timer" data-expires="<?= $expiresTimestamp ?>">05:00</span>
        </div>
        <div class="small text-muted countdown-expired d-none">
            <i class="bi bi-exclamation-triangle-fill text-danger"></i> Waktu habis! Transaksi telah dibatalkan secara otomatis.
        </div>
        <?php endif; ?>
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
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">Status</span>
                <?php if ($isCompleted): ?>
                    <span class="badge rounded-pill text-bg-success">Selesai</span>
                <?php else: ?>
                    <span class="badge rounded-pill text-bg-warning text-dark">Menunggu</span>
                <?php endif; ?>
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
            <h4 class="mb-3"><?= $isCompleted ? 'Pembayaran telah dikonfirmasi' : 'Scan / Selesaikan Pembayaran Anda' ?></h4>

            <?php if (!$isCompleted): ?>
            <div class="bg-white p-3 d-inline-block rounded-4 border mb-3">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=<?= urlencode($tx['transaction_code'] . '|' . $tx['price']) ?>" alt="Payment QR / Code" class="img-fluid" style="border-radius: 8px;">
            </div>
            <p class="small text-soft mb-0">Silakan scan kode QR di atas menggunakan aplikasi e-wallet Anda untuk menyelesaikan pembayaran instan.</p>

            <hr class="my-4">

            <form action="<?= base_url('payment/complete') ?>" method="POST" id="payment-complete-form" enctype="multipart/form-data" class="text-start">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
                    <input type="file" name="payment_proof" class="form-control" accept="image/*" id="payment-proof-input" required>
                    <small class="text-muted">Upload screenshot atau foto bukti transfer / pembayaran.</small>
                </div>
                <button type="submit" class="btn btn-success btn-lg rounded-pill w-100 fw-bold payment-complete-btn" disabled>
                    <i class="bi bi-check-circle-fill me-2"></i> Konfirmasi Pembayaran
                </button>
            </form>
            <?php else: ?>
            <div class="text-center py-3">
                <i class="bi bi-check-circle-fill text-success display-4 mb-3 d-block"></i>
                <p class="small text-muted mb-0">Struk pembayaran telah diunduh. Simpan sebagai bukti transaksi.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="glass-card p-4 h-100">
            <h5 class="mb-3">Status Pembayaran</h5>
            <div class="timeline-card p-3 mb-3" style="border-left: 4px solid <?= $isCompleted ? 'var(--bs-success)' : 'var(--brand)' ?>;">
                <div class="fw-bold mb-1">1. Pembayaran diterima</div>
                <div class="small text-soft"><?= $isCompleted ? 'Pembayaran telah dikonfirmasi.' : 'Menunggu konfirmasi pembayaran.' ?></div>
            </div>
            <div class="timeline-card p-3 mb-3" style="border-left: 4px solid <?= $isCompleted ? 'var(--bs-success)' : 'var(--line)' ?>;">
                <div class="fw-bold mb-1">2. Pesanan diproses</div>
                <div class="small text-soft">Operator mengecek detail top up yang masuk.</div>
            </div>
            <div class="timeline-card p-3" style="border-left: 4px solid <?= $isCompleted ? 'var(--bs-success)' : 'var(--line)' ?>;">
                <div class="fw-bold mb-1">3. Status selesai</div>
                <div class="small text-soft"><?= $isCompleted ? 'Transaksi selesai.' : 'Dashboard akan menampilkan pesanan berhasil diproses.' ?></div>
            </div>
        </div>
    </div>

    <div class="col-12 text-center mt-4">
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= base_url('produk') ?>" class="btn btn-outline-brand rounded-pill px-4">Kembali ke Katalog</a>
            <?php if (session()->get('isLoggedIn') && session()->get('role') === 'Client'): ?>
                <a href="<?= base_url('profile') ?>" class="btn btn-brand rounded-pill px-4">Lihat Riwayat Saya</a>
            <?php endif; ?>
            <button onclick="window.print()" class="btn btn-outline-secondary rounded-pill px-4">Cetak Halaman</button>
        </div>
    </div>
</section>

<script>
(function() {
    var timer = document.querySelector('.countdown-timer');
    var fileInput = document.getElementById('payment-proof-input');
    var btn = document.querySelector('.payment-complete-btn');

    if (timer) {
        var expiresAt = parseInt(timer.dataset.expires, 10);
        var expiredEl = document.querySelector('.countdown-expired');

        function updateCountdown() {
            var now = new Date().getTime();
            var diff = expiresAt - now;

            if (diff <= 0) {
                timer.textContent = '00:00';
                timer.classList.remove('text-danger');
                timer.classList.add('text-muted');
                if (expiredEl) expiredEl.classList.remove('d-none');
                if (btn) { btn.disabled = true; btn.innerHTML = '<i class="bi bi-x-circle-fill me-2"></i> Kadaluarsa'; }
                return;
            }

            var minutes = Math.floor(diff / 60000);
            var seconds = Math.floor((diff % 60000) / 1000);
            timer.textContent = String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');

            if (diff <= 30000) {
                timer.classList.add('text-danger');
                timer.style.animation = 'pulse 1s infinite';
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    }

    if (fileInput && btn) {
        fileInput.addEventListener('change', function() {
            btn.disabled = !this.files || this.files.length === 0;
        });
    }
})();
</script>

<style>
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}
</style>

<?= $this->endSection() ?>
