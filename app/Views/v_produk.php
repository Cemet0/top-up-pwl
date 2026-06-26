<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<section class="mb-4">
    <div class="row align-items-end g-3">
        <div class="col-lg-8">
            <span class="section-kicker mb-2"><i class="bi bi-grid-1x2"></i> Katalog Produk</span>
            <h1 class="mb-2">Pilih nominal top up yang paling sesuai untuk pelanggan Anda.</h1>
            <p class="text-soft mb-0">Daftar produk disusun rapi agar cepat dipindai, mudah dicari, dan tetap enak dilihat di dashboard maupun landing page.</p>
        </div>
        <div class="col-lg-4">
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-start-0" placeholder="Cari game atau nominal">
            </div>
        </div>
    </div>
</section>

<section class="row g-3">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <div class="col-6 col-lg-3">
            <div class="product-card h-100 p-3">
                <div class="position-relative mb-3">
                    <div class="ratio ratio-4x3 rounded-4 overflow-hidden border">
                        <?php if (!empty($product['img'])): ?>
                            <img src="<?= base_url('assets/img/' . $product['img']) ?>" class="w-100 h-100 object-fit-cover" alt="<?= esc($product['name']) ?>">
                        <?php else: ?>
                            <div class="bg-brand text-white d-flex align-items-center justify-content-center w-100 h-100">
                                <i class="bi bi-controller display-5"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($product['badge'])): ?>
                    <span class="badge text-bg-light position-absolute top-0 end-0 m-2 rounded-pill border"><?= esc($product['badge']) ?></span>
                    <?php endif; ?>
                </div>
                <h5 class="mb-1"><?= esc($product['name']) ?></h5>
                <p class="text-soft small mb-3"><?= esc($product['provider']) ?></p>
                <a href="<?= base_url($product['link'] ?? '#') ?>" class="btn btn-brand w-100 rounded-pill">Mulai Top Up</a>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5 text-muted">Belum ada produk tersedia.</div>
    <?php endif; ?>
</section>

<?= $this->endSection() ?>