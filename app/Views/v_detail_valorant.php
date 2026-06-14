<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<style>
    .game-banner {
        height: 240px;
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.7)), url('<?= base_url('assets/img/icon valo.jpg') ?>');
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
        <span class="badge rounded-pill bg-danger mb-2">Valorant</span>
        <h1 class="display-6 fw-bold mb-0">Top Up Points</h1>
        <p class="opacity-75 mb-0">Proses Otomatis 24 Jam Cepat & Aman</p>
    </div>
</div>

<form action="<?= base_url('checkout') ?>" method="POST" class="row g-4">
    <?= csrf_field() ?>
    <input type="hidden" name="game_name" value="Valorant">

    <div class="col-lg-4">
        <div class="glass-card p-4 sticky-top" style="top: 100px; z-index: 10;">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="step-number">1</div>
                <h5 class="mb-0">Data Akun</h5>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold text-soft">Riot ID</label>
                <input type="text" class="form-control form-control-lg border-2" placeholder="Masukkan Riot ID" name="user_id" required>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-soft">Tagline</label>
                <input type="text" class="form-control form-control-lg border-2" placeholder="Masukkan Tagline (tanpa #)" name="zone_id" required>
            </div>
            <div class="summary-card p-3 bg-light border-0">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-info-circle-fill text-brand"></i>
                    <span class="small fw-bold">Cara Menemukan Riot ID</span>
                </div>
                <p class="small text-soft mb-0">Login ke akun Riot Anda. Riot ID dan Tagline dapat dilihat pada menu pengaturan profil. Contoh: PlayerOne (Riot ID) 1234 (Tagline).</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="glass-card p-4 mb-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="step-number">2</div>
                <h5 class="mb-0">Pilih Nominal Points</h5>
            </div>
            <div class="row g-3">
                <?php
                $nominals = [
                    ['id' => 125, 'label' => '125 Points', 'price' => 'Rp 15.000'],
                    ['id' => 420, 'label' => '420 Points', 'price' => 'Rp 50.000'],
                    ['id' => 700, 'label' => '700 Points', 'price' => 'Rp 80.000'],
                    ['id' => 1375, 'label' => '1375 Points', 'price' => 'Rp 150.000'],
                    ['id' => 2400, 'label' => '2400 Points', 'price' => 'Rp 250.000'],
                    ['id' => 4000, 'label' => '4000 Points', 'price' => 'Rp 400.000'],
                    ['id' => 8150, 'label' => '8150 Points', 'price' => 'Rp 800.000'],
                ];

                foreach ($nominals as $item):
                    $safeId = 'valo_nominal_' . $item['id'];
                ?>
                <div class="col-6 col-md-4 nominal-card">
                    <input type="radio" class="btn-check" name="nominal" id="<?= $safeId ?>" value="<?= $item['label'] ?>|<?= $item['price'] ?>" autocomplete="off" required>
                    <label class="btn btn-outline-brand w-100 py-3 rounded-4 h-100 d-flex flex-column justify-content-center transition-all shadow-sm" for="<?= $safeId ?>">
                        <span class="fw-bold fs-5 mb-1"><?= explode(' ', $item['label'])[0] ?></span>
                        <span class="small opacity-75 mb-1">Points</span>
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
