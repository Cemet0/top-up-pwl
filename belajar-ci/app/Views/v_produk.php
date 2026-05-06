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
    <?php
    $products = [
        ['title' => 'Mobile Legends', 'provider' => 'Moonton', 'icon' => 'controller', 'badge' => 'Populer', 'link' => 'detail-mlbb'],
        ['title' => 'Free Fire', 'provider' => 'Garena', 'icon' => 'fire', 'badge' => 'Best Seller', 'link' => '#'],
        ['title' => 'Genshin Impact', 'provider' => 'HoYoverse', 'icon' => 'gem', 'badge' => 'Cepat', 'link' => '#'],
        ['title' => 'Valorant', 'provider' => 'Riot Games', 'icon' => 'crosshair', 'badge' => 'Recommended', 'link' => '#'],
    ];

    foreach ($products as $product): ?>
    <div class="col-6 col-lg-3">
        <div class="product-card h-100 p-3">
            <div class="position-relative mb-3">
                <div class="ratio ratio-4x3 rounded-4 overflow-hidden border">
                    <?php if ($product['title'] === 'Mobile Legends'): ?>
                        <img src="<?= base_url('assets/img/mlbb-icon.png') ?>" class="w-100 h-100 object-fit-cover" alt="MLBB">
                    <?php else: ?>
                        <div class="bg-brand text-white d-flex align-items-center justify-content-center w-100 h-100">
                            <i class="bi bi-<?= esc($product['icon']) ?> display-5"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <span class="badge text-bg-light position-absolute top-0 end-0 m-2 rounded-pill border"><?= esc($product['badge']) ?></span>
            </div>
            <h5 class="mb-1"><?= esc($product['title']) ?></h5>
            <p class="text-soft small mb-3"><?= esc($product['provider']) ?></p>
            <a href="<?= $product['link'] === '#' ? '#' : base_url($product['link']) ?>" class="btn btn-brand w-100 rounded-pill">Mulai Top Up</a>
        </div>
    </div>
    <?php endforeach; ?>
</section>

<?= $this->endSection() ?>