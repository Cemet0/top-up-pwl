<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            
            <div class="text-center mb-4">
                <div class="display-1 text-warning mb-2">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h3 class="fw-bold">Menunggu Pembayaran</h3>
                <p class="text-muted">Silakan selesaikan pembayaran Anda sebelum waktu habis.</p>
                <div class="badge bg-light text-dark border p-2 px-3 rounded-pill">
                    Batas Waktu: <span class="text-danger fw-bold">23:59:59</span>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-4">Ringkasan Pesanan</h6>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">No. Transaksi</span>
                        <span class="fw-bold text-primary">#DANTE-882910</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Produk</span>
                        <span class="fw-bold">Mobile Legends - 86 Diamonds</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">ID User</span>
                        <span class="fw-bold">12345678 (2001)</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Metode Pembayaran</span>
                        <span class="fw-bold">QRIS</span>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h6 mb-0">Total Tagihan</span>
                        <h4 class="fw-bold text-primary mb-0">Rp 20.000</h4>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4 text-center">
                <div class="card-header bg-dark text-white py-3 rounded-top-4">
                    <h6 class="mb-0 fw-bold">Scan QRIS Di Bawah Ini</h6>
                </div>
                <div class="card-body p-5">
                    <div class="bg-white p-3 d-inline-block border rounded-3 mb-3">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=DanteStorePayment" alt="QRIS Code" class="img-fluid">
                    </div>
                    <p class="small text-muted mb-0">Dapat discan menggunakan GoPay, OVO, Dana, LinkAja, atau Mobile Banking.</p>
                </div>
            </div>

            <div class="d-grid gap-2">
                <a href="<?= base_url('v_produk') ?>" class="btn btn-outline-secondary rounded-pill fw-bold">Kembali ke Katalog</a>
                <button onclick="window.print()" class="btn btn-primary rounded-pill fw-bold">Cetak Bukti Bayar</button>
            </div>

        </div>
    </div>
</div>

<style>
    /* Tambahan agar tampilan terlihat premium */
    .card {
        background: #ffffff;
    }
    .text-primary {
        color: #0d6efd !important;
    }
    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>

<?= $this->endSection() ?>
