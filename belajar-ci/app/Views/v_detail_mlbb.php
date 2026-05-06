<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<section class="row g-4 align-items-start">
    <div class="col-lg-4">
        <div class="glass-card overflow-hidden">
            <div class="bg-brand text-white p-4">
                <span class="badge rounded-pill text-bg-light text-brand mb-3">Mobile Legends</span>
                <h2 class="mb-2">Top up Diamond dalam alur yang lebih rapi.</h2>
                <p class="mb-0 text-white-50">Pelanggan cukup isi data, pilih nominal, lalu lanjut ke pembayaran tanpa keluar dari tampilan yang sama.</p>
            </div>
            <div class="p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="brand-mark"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <div class="fw-bold">Proses instan</div>
                        <div class="small text-soft">Aktif 24 jam</div>
                    </div>
                </div>
                <div class="summary-card p-3">
                    <div class="small text-soft mb-1">Tips</div>
                    <div class="fw-semibold">Pastikan User ID dan Zone ID sudah sesuai sebelum checkout.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="glass-card p-4 mb-4">
            <span class="section-kicker mb-3"><i class="bi bi-person-vcard"></i> Langkah 1</span>
            <h4 class="mb-3">Masukkan data akun</h4>
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">User ID</label>
                    <input type="number" class="form-control form-control-lg" placeholder="Contoh: 12345678">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Zone ID</label>
                    <input type="number" class="form-control form-control-lg" placeholder="Contoh: 2001">
                </div>
            </div>
        </div>

        <div class="glass-card p-4 mb-4">
            <span class="section-kicker mb-3"><i class="bi bi-lightning-charge"></i> Langkah 2</span>
            <h4 class="mb-3">Pilih nominal diamond</h4>
            <div class="row g-3">
                <?php
                $nominals = [
                    ['label' => '5 Diamonds', 'price' => 'Rp 1.500'],
                    ['label' => '12 Diamonds', 'price' => 'Rp 3.500'],
                    ['label' => '50 Diamonds', 'price' => 'Rp 14.500'],
                    ['label' => '86 Diamonds', 'price' => 'Rp 20.000'],
                    ['label' => '172 Diamonds', 'price' => 'Rp 40.000'],
                    ['label' => '257 Diamonds', 'price' => 'Rp 60.000'],
                ];

                foreach ($nominals as $index => $item):
                    $safeId = 'mlbb_nominal_' . $index;
                ?>
                <div class="col-6 col-md-4">
                    <input type="radio" class="btn-check" name="nominal" id="<?= $safeId ?>" autocomplete="off">
                    <label class="btn btn-outline-brand w-100 py-3 rounded-4 h-100 d-flex flex-column justify-content-center" for="<?= $safeId ?>">
                        <span class="fw-bold"><?= esc($item['label']) ?></span>
                        <small><?= esc($item['price']) ?></small>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="glass-card p-4">
            <span class="section-kicker mb-3"><i class="bi bi-credit-card"></i> Langkah 3</span>
            <h4 class="mb-3">Pilih metode pembayaran</h4>
            <div class="list-group mb-4">
                <label class="list-group-item d-flex justify-content-between align-items-center py-3 rounded-4 mb-2 border">
                    <div class="d-flex align-items-center">
                        <input class="form-check-input me-3" type="radio" name="payment" value="qris">
                        <div>
                            <div class="fw-bold">QRIS (All Payment)</div>
                            <small class="text-soft">Proses otomatis</small>
                        </div>
                    </div>
                    <i class="bi bi-qr-code fs-3 text-brand"></i>
                </label>
                <label class="list-group-item d-flex justify-content-between align-items-center py-3 rounded-4 border">
                    <div class="d-flex align-items-center">
                        <input class="form-check-input me-3" type="radio" name="payment" value="dana">
                        <div>
                            <div class="fw-bold">DANA</div>
                            <small class="text-soft">Proses instan</small>
                        </div>
                    </div>
                    <i class="bi bi-wallet2 fs-3 text-brand"></i>
                </label>
            </div>
            <div class="d-grid gap-2 d-md-flex">
                <a href="<?= base_url('produk') ?>" class="btn btn-outline-brand rounded-pill px-4">Kembali</a>
                <a href="<?= base_url('payment') ?>" class="btn btn-brand rounded-pill px-4">Beli Sekarang</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>