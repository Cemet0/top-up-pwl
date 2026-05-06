<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<div class="container py-5">
    <div class="row g-4">
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="MLBB Banner">
                <div class="card-body">
                    <h4 class="fw-bold">Mobile Legends</h4>
                    <p class="text-muted small">Top up Diamond Mobile Legends hanya dalam hitungan detik! Cukup masukkan User ID dan Zone ID Anda, pilih nominal yang diinginkan, dan selesaikan pembayaran.</p>
                    <hr>
                    <div class="d-flex align-items-center text-primary">
                        <i class="bi bi-clock-history me-2"></i>
                        <span class="small fw-bold">Proses Instan 24 Jam</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                    <h6 class="mb-0 fw-bold">1. Masukkan User ID</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label small fw-bold">User ID</label>
                            <input type="number" class="form-control" placeholder="Contoh: 12345678">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label small fw-bold">Zone ID</label>
                            <input type="number" class="form-control" placeholder="(2001)">
                        </div>
                    </div>
                    <small class="text-muted">Untuk mengetahui User ID Anda, silakan klik menu profil di bagian kiri atas menu utama game.</small>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                    <h6 class="mb-0 fw-bold">2. Pilih Nominal Diamond</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <?php 
                        $nominals = [
                            ['qty' => '5 Diamonds', 'price' => 'Rp 1.500'],
                            ['qty' => '12 Diamonds', 'price' => 'Rp 3.500'],
                            ['qty' => '50 Diamonds', 'price' => 'Rp 14.500'],
                            ['qty' => '86 Diamonds', 'price' => 'Rp 20.000'],
                            ['qty' => '172 Diamonds', 'price' => 'Rp 40.000'],
                            ['qty' => '257 Diamonds', 'price' => 'Rp 60.000'],
                        ];
                        foreach($nominals as $item): ?>
                        <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check" name="nominal" id="item_<?= $item['qty'] ?>" autocomplete="off">
                            <label class="btn btn-outline-primary w-100 py-3 rounded-3 h-100 d-flex flex-column justify-content-center" for="item_<?= $item['qty'] ?>">
                                <span class="fw-bold"><?= $item['qty'] ?></span>
                                <small><?= $item['price'] ?></small>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                    <h6 class="mb-0 fw-bold">3. Pilih Metode Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <label class="list-group-item d-flex justify-content-between align-items-center py-3 rounded-3 mb-2 border shadow-sm">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input me-3" type="radio" name="payment" value="qris">
                                <div>
                                    <h6 class="mb-0 fw-bold">QRIS (All Payment)</h6>
                                    <small class="text-muted">Proses otomatis</small>
                                </div>
                            </div>
                            <i class="bi bi-qr-code fs-4"></i>
                        </label>
                        <label class="list-group-item d-flex justify-content-between align-items-center py-3 rounded-3 border shadow-sm">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input me-3" type="radio" name="payment" value="dana">
                                <div>
                                    <h6 class="mb-0 fw-bold">DANA</h6>
                                    <small class="text-muted">Proses instan</small>
                                </div>
                            </div>
                            <i class="bi bi-wallet2 fs-4"></i>
                        </label>
                    </div>
                    <a href="<?= base_url('v_payment') ?>" class="btn btn-primary btn-lg w-100 mt-4 rounded-pill fw-bold">Beli Sekarang</a>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Style agar radio button terlihat seperti kartu pilihan yang ditekan */
    .btn-check:checked + .btn-outline-primary {
        background-color: #0d6efd;
        color: white;
        border-color: #0d6efd;
        box-shadow: 0 4px 10px rgba(13, 110, 253, 0.4);
    }
    .btn-outline-primary {
        border: 2px solid #eee;
        color: #444;
    }
    .btn-outline-primary:hover {
        border-color: #0d6efd;
        background-color: transparent;
        color: #0d6efd;
    }
</style>

<?= $this->endSection() ?>