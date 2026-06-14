<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<style>
    .game-banner {
        height: 240px;
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.7)), url('<?= base_url('assets/img/iconMcgg.png') ?>');
        background-size: cover;
        background-position: center;
        border-radius: 24px;
        display: flex;
        align-items: flex-end;
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid var(--line);
    }
    .nominal-card .btn-check:checked + .btn-outline-brand {
        background: var(--brand);
        color: white;
        border-color: var(--brand);
        box-shadow: 0 8px 20px rgba(18, 93, 255, 0.3);
    }
    .payment-method .form-check-input:checked ~ .method-details .fw-bold {
        color: var(--brand);
    }
    .payment-method:hover {
        border-color: var(--brand) !important;
        background: rgba(18, 93, 255, 0.02);
    }
    .step-number {
        width: 32px;
        height: 32px;
        background: var(--brand);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.9rem;
    }
</style>

<div class="game-banner">
    <div class="text-white">
        <span class="badge rounded-pill bg-success mb-2">Magic Chess Go Go</span>
        <h1 class="display-6 fw-bold mb-0">Top Up Diamonds</h1>
        <p class="opacity-75 mb-0">Proses Otomatis 24 Jam Cepat & Aman</p>
    </div>
</div>

<form action="<?= base_url('checkout') ?>" method="POST" class="row g-4">
    <?= csrf_field() ?>
    <input type="hidden" name="game_name" value="Magic Chess Go Go">

    <div class="col-lg-4">
        <div class="glass-card p-4 sticky-top" style="top: 100px; z-index: 10;">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="step-number">1</div>
                <h5 class="mb-0">Data Akun</h5>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold text-soft">User ID</label>
                <input type="number" class="form-control form-control-lg border-2" placeholder="Masukkan User ID" name="user_id" required>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-soft">Zone ID</label>
                <input type="number" class="form-control form-control-lg border-2" placeholder="Masukkan Zone ID" name="zone_id" required>
            </div>
            <div class="summary-card p-3 bg-light border-0">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-info-circle-fill text-brand"></i>
                    <span class="small fw-bold">Cara Menemukan User ID</span>
                </div>
                <p class="small text-soft mb-0">Buka game Magic Chess Go Go, klik avatar profil. User ID dan Zone ID akan terlihat. Contoh: 12345678 (1234).</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="glass-card p-4 mb-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="step-number">2</div>
                <h5 class="mb-0">Pilih Nominal</h5>
            </div>
            <div class="row g-3">
                <?php
                $nominals = [
                    ['id' => 5, 'label' => '5 Diamonds', 'price' => 'Rp 1.500'],
                    ['id' => 14, 'label' => '14 Diamonds', 'price' => 'Rp 4.000'],
                    ['id' => 42, 'label' => '42 Diamonds', 'price' => 'Rp 12.000'],
                    ['id' => 70, 'label' => '70 Diamonds', 'price' => 'Rp 20.000'],
                    ['id' => 140, 'label' => '140 Diamonds', 'price' => 'Rp 40.000'],
                    ['id' => 344, 'label' => '344 Diamonds', 'price' => 'Rp 100.000'],
                ];

                foreach ($nominals as $item):
                    $safeId = 'mcgg_nominal_' . $item['id'];
                ?>
                <div class="col-6 col-md-4 nominal-card">
                    <input type="radio" class="btn-check" name="nominal" id="<?= $safeId ?>" value="<?= $item['label'] ?>|<?= $item['price'] ?>" autocomplete="off" required>
                    <label class="btn btn-outline-brand w-100 py-3 rounded-4 h-100 d-flex flex-column justify-content-center transition-all shadow-sm" for="<?= $safeId ?>">
                        <span class="fw-bold fs-5 mb-1"><?= explode(' ', $item['label'])[0] ?></span>
                        <span class="small opacity-75 mb-1">Diamonds</span>
                        <div class="mt-2 pt-2 border-top w-100 fw-bold"><?= $item['price'] ?></div>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="glass-card p-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="step-number">3</div>
                <h5 class="mb-0">Metode Pembayaran</h5>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="payment-method border p-3 rounded-4 d-flex align-items-center justify-content-between cursor-pointer w-100 mb-2">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-3 border-2" type="radio" name="payment" value="qris" required>
                            <div class="method-details">
                                <div class="fw-bold">QRIS (All Payment)</div>
                                <small class="text-soft">Gopay, OVO, ShopeePay, Dana, LinkAja</small>
                            </div>
                        </div>
                        <i class="bi bi-qr-code fs-2 text-brand"></i>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="payment-method border p-3 rounded-4 d-flex align-items-center justify-content-between cursor-pointer w-100 h-100">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-3 border-2" type="radio" name="payment" value="dana" required>
                            <div class="method-details">
                                <div class="fw-bold">DANA</div>
                                <small class="text-soft">Proses Instan</small>
                            </div>
                        </div>
                        <i class="bi bi-wallet2 fs-2 text-primary"></i>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="payment-method border p-3 rounded-4 d-flex align-items-center justify-content-between cursor-pointer w-100 h-100">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-3 border-2" type="radio" name="payment" value="shopeepay" required>
                            <div class="method-details">
                                <div class="fw-bold">ShopeePay</div>
                                <small class="text-soft">Proses Instan</small>
                            </div>
                        </div>
                        <i class="bi bi-bag-heart fs-2 text-danger"></i>
                    </label>
                </div>
            </div>

            <hr class="my-4 opacity-50">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div class="text-center text-md-start">
                    <p class="small text-soft mb-0">Dengan klik Beli Sekarang, Anda menyetujui</p>
                    <a href="#" class="small text-brand text-decoration-none fw-bold">Syarat & Ketentuan</a>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= base_url('produk') ?>" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
                    <button type="submit" class="btn btn-brand rounded-pill px-5 py-2 fw-bold">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
