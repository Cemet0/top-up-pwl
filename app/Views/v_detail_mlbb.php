<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<style>
    .game-banner {
        height: 240px;
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.7)), url('<?= base_url('assets/img/mlbb-banner.png') ?>');
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
        <span class="badge rounded-pill bg-primary mb-2">Mobile Legends: Bang Bang</span>
        <h1 class="display-6 fw-bold mb-0">Top Up Diamonds</h1>
        <p class="opacity-75 mb-0">Proses Otomatis 24 Jam Cepat & Aman</p>
    </div>
</div>

<form action="<?= base_url('checkout') ?>" method="POST" class="row g-4">
    <?= csrf_field() ?>
    <input type="hidden" name="game_name" value="Mobile Legends">

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
                <p class="small text-soft mb-0">Klik pada profil di pojok kiri atas. User ID dan Zone ID tertera di bawah Nama Akun. Contoh: 12345678 (2001).</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="glass-card p-4 mb-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="step-number">2</div>
                <h5 class="mb-0">Pilih Item</h5>
            </div>
            
            <!-- Category Filters -->
            <div class="d-flex flex-wrap gap-2 mb-4 category-filters">
                <button type="button" class="btn btn-outline-brand rounded-pill px-4 btn-category" data-category="diamond">
                    <i class="bi bi-gem me-2"></i> Diamond
                </button>
                <button type="button" class="btn btn-brand rounded-pill px-4 btn-category active" data-category="wdp">
                    <i class="bi bi-box2-heart me-2"></i> Weekly Diamond Pass
                </button>
            </div>

            <div class="row g-3" id="items-container">
                <?php if (!empty($items)): ?>
                    <?php foreach ($items as $item):
                        $safeId = 'mlbb_nominal_' . $item['id'];
                        $priceFormatted = 'Rp ' . number_format((float)$item['price'], 0, ',', '.');
                        
                        $titleLower = strtolower($item['title']);
                        $category = 'diamond';
                        if (str_contains($titleLower, 'weekly diamond pass')) {
                            $category = 'wdp';
                        } elseif (str_contains($titleLower, 'twilight pass')) {
                            $category = 'twilight';
                        } elseif (str_contains($titleLower, 'bundle')) {
                            $category = 'bundle';
                        }
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 nominal-card position-relative item-card" data-category="<?= $category ?>" style="<?= $category == 'wdp' ? '' : 'display: none;' ?>">
                        <input type="radio" class="btn-check" name="nominal" id="<?= $safeId ?>" value="<?= esc($item['title']) ?>|<?= $priceFormatted ?>" autocomplete="off" required>
                        <label class="btn btn-outline-brand w-100 p-3 rounded-4 h-100 d-flex align-items-center text-start transition-all shadow-sm overflow-hidden" for="<?= $safeId ?>">
                            <?php if($category == 'wdp'): ?>
                                <img src="<?= base_url('assets/img/icon wdp.jpg') ?>" alt="WDP" class="rounded me-3" style="width: 42px; height: 42px; object-fit: cover; flex-shrink: 0;">
                            <?php else: ?>
                                <div class="rounded me-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: rgba(13, 202, 240, 0.15); flex-shrink: 0;">
                                    <i class="bi bi-gem fs-4 text-info"></i>
                                </div>
                            <?php endif; ?>
                            <div class="flex-grow-1">
                                <div class="fw-bold fs-6 mb-1 text-wrap lh-sm"><?= esc($item['title']) ?></div>
                                <div class="fw-bold fs-6 mt-1"><?= $priceFormatted ?></div>
                            </div>
                            <?php if ($item['discount']): ?>
                                <span class="badge text-bg-danger position-absolute top-0 start-0 m-1" style="font-size: 0.65rem; border-radius: 8px 0 8px 0; z-index: 2;"><?= esc($item['discount']) ?></span>
                            <?php endif; ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center text-muted py-4">Belum ada nominal tersedia.</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="glass-card p-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="step-number">3</div>
                <h5 class="mb-0">Metode Pembayaran</h5>
            </div>
            <div class="row g-3">
                <?php if (!empty($payments)): ?>
                    <?php foreach ($payments as $pm): ?>
                    <div class="col-md-6">
                        <label class="payment-method border p-3 rounded-4 d-flex align-items-center justify-content-between cursor-pointer w-100 h-100">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input me-3 border-2" type="radio" name="payment" value="<?= esc($pm['code']) ?>" required>
                                <div class="method-details">
                                    <div class="fw-bold"><?= esc($pm['name']) ?></div>
                                    <?php if ((float)$pm['fee'] > 0): ?>
                                        <small class="text-soft">Biaya admin Rp <?= number_format((float)$pm['fee'], 0, ',', '.') ?></small>
                                    <?php else: ?>
                                        <small class="text-soft">Tanpa biaya admin</small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <i class="bi bi-wallet2 fs-2 text-brand"></i>
                        </label>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center text-muted py-4">Belum ada metode pembayaran.</div>
                <?php endif; ?>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.btn-category');
    const items = document.querySelectorAll('.item-card');

    function filterItems(category) {
        items.forEach(item => {
            if (item.getAttribute('data-category') === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.classList.remove('btn-brand');
                b.classList.add('btn-outline-brand');
                b.classList.remove('active');
            });
            this.classList.remove('btn-outline-brand');
            this.classList.add('btn-brand');
            this.classList.add('active');

            const category = this.getAttribute('data-category');
            filterItems(category);
        });
    });
});
</script>

<?= $this->endSection() ?>