<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<section class="row justify-content-center g-4">
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
                <span class="fw-bold text-brand">#DANTE-882910</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">Produk</span>
                <span class="fw-semibold">Mobile Legends - 86 Diamonds</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">ID User</span>
                <span class="fw-semibold">12345678 (2001)</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-soft">Metode Pembayaran</span>
                <span class="fw-semibold">QRIS</span>
            </div>
            <hr class="my-4">
            <div class="d-flex justify-content-between align-items-center">
                <span class="h6 mb-0">Total Tagihan</span>
                <h3 class="fw-bold text-brand mb-0">Rp 20.000</h3>
            </div>
        </div>

        <div class="glass-card text-center p-4 p-lg-5">
            <span class="section-kicker mb-3"><i class="bi bi-qr-code"></i> QRIS</span>
            <h4 class="mb-3">Scan kode di bawah ini</h4>
            <div class="bg-white p-3 d-inline-block rounded-4 border mb-3">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=DanteStorePayment" alt="QRIS Code" class="img-fluid">
            </div>
            <p class="small text-soft mb-0">Dapat discan dengan GoPay, OVO, DANA, LinkAja, atau mobile banking.</p>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="glass-card p-4 h-100">
            <h5 class="mb-3">Status Pembayaran</h5>
            <div class="timeline-card p-3 mb-3">
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

    <div class="col-12">
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= base_url('produk') ?>" class="btn btn-outline-brand rounded-pill px-4">Kembali ke Katalog</a>
            <button onclick="window.print()" class="btn btn-brand rounded-pill px-4">Cetak Bukti Bayar</button>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
