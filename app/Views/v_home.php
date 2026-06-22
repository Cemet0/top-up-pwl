<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<section id="heroCarousel" class="carousel slide hero-full-banner mb-5 overflow-hidden rounded-5 position-relative" data-bs-ride="carousel" data-bs-interval="4000">
    <!-- Indicators/Dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

    <!-- Carousel Items -->
    <div class="carousel-inner h-100">
        <!-- Slide 1: General Hero Banner -->
        <div class="carousel-item active h-100">
            <!-- Main Banner Image -->
            <div class="banner-image-container">
                <img src="<?= base_url('assets/img/image.png') ?>" class="banner-img" alt="Hero Banner 1">
                <div class="banner-overlay"></div>
            </div>

            <!-- Text Content Over Image -->
            <div class="banner-content position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="z-index: 10;">
                <div class="container text-start ps-4 ps-lg-5">
                    <div class="hero-badge-small mb-3">
                        <i class="bi bi-controller me-2"></i> Official Store
                    </div>
                    
                    <h2 class="fw-800 mb-2 text-white font-space-grotesk" style="font-size: 2.2rem; max-width: 500px; line-height: 1.2;">
                        Solusi Pembayaran <span class="text-gradient-gold">Terbaik</span> <br>
                        Untuk Gaming <span class="text-gradient-cyan">Lancar</span>
                    </h2>
                    
                    <p class="mb-4 text-white opacity-80" style="max-width: 450px; font-size: 0.95rem;">
                        Top up cepat, aman, dan terpercaya. Nikmati kemudahan transaksi dengan berbagai metode pembayaran hanya di Dante Store.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="<?= base_url('produk') ?>" class="btn btn-gradient-primary btn-sm rounded-pill px-4 py-2 fw-bold shadow-lg">
                            Top Up Sekarang <i class="bi bi-lightning-charge-fill ms-1"></i>
                        </a>
                        <a href="#" class="btn btn-glass-dark btn-sm rounded-pill px-4 py-2 fw-bold text-white">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: Dante Store Official (Plain) -->
        <div class="carousel-item h-100">
            <!-- Main Banner Image -->
            <div class="banner-image-container">
                <img src="<?= base_url('assets/img/Banner DS.png') ?>" class="banner-img" alt="Hero Banner 2">
            </div>
        </div>
    </div>

    <!-- Navigation Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Berikutnya</span>
    </button>

    <!-- Floating Status Overlays (static on top of slider) -->
    <div class="banner-status-container d-none d-lg-block">
        <div class="floating-badge success-badge glass-morphism animate-float" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
            <i class="bi bi-patch-check-fill text-success"></i> 10.000+ Transaksi Berhasil
        </div>
        <div class="floating-badge secure-badge glass-morphism animate-float-delayed" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
            <i class="bi bi-shield-lock-fill text-primary"></i> 100% Aman & Terpercaya
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="promo-section p-4 rounded-4 position-relative overflow-hidden" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); box-shadow: 0 26px 60px rgba(0,0,0,0.16);">
        <div class="mb-3">
            <span class="section-kicker mb-2"><i class="bi bi-stars"></i> Penawaran Spesial</span>
            <p class="text-soft small mb-0 mt-1">Jangan lewatkan penawaran spesial kami! Temukan harga terbaik dan diskon eksklusif sekarang.</p>
        </div>
        <div class="row g-3">
            <?php
            $promos = [
                [
                    'title'    => '1 Month VIP',
                    'discount' => '51%',
                    'original' => 'Rp56.000',
                    'price'    => 'Rp27.467',
                    'color'    => '#28a745',
                    'icon'     => 'star-fill',
                ],
                [
                    'title'    => '3 Month VIP',
                    'discount' => '46,4%',
                    'original' => 'Rp135.000',
                    'price'    => 'Rp72.311',
                    'color'    => '#125dff',
                    'icon'     => 'star-half',
                ],
                [
                    'title'    => '12 Month VIP',
                    'discount' => '43,9%',
                    'original' => 'Rp449.000',
                    'price'    => 'Rp251.687',
                    'color'    => '#e83e8c',
                    'icon'     => 'gem',
                ],
            ];
            foreach ($promos as $promo): ?>
            <div class="col-md-4">
                <div class="feature-card p-3 h-100 position-relative overflow-hidden" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px);">
                    <!-- Discount badge -->
                    <div class="position-absolute top-0 end-0">
                        <div class="px-2 py-1 text-white fw-bold" style="background: #e83e8c; font-size: 0.75rem; border-radius: 0 0 0 12px;">
                            <?= esc($promo['discount']) ?> OFF
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:<?= esc($promo['color']) ?>20;">
                            <i class="bi bi-<?= esc($promo['icon']) ?> fs-4" style="color:<?= esc($promo['color']) ?>"></i>
                        </div>
                        <div>
                            <div class="fw-bold"><?= esc($promo['title']) ?></div>
                            <span class="badge rounded-pill text-white px-2" style="background:<?= esc($promo['color']) ?>;font-size:0.7rem;">PROMO</span>
                        </div>
                    </div>
                    <div class="small text-soft text-decoration-line-through"><?= esc($promo['original']) ?></div>
                    <div class="fw-bold fs-5" style="color:<?= esc($promo['color']) ?>"><?= esc($promo['price']) ?></div>
                    <a href="<?= base_url('produk') ?>" class="btn btn-brand w-100 rounded-pill mt-3 btn-sm">Beli Sekarang</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
        <div>
            <span class="section-kicker mb-2"><i class="bi bi-controller"></i> Game Populer</span>
            <h2 class="mb-0">Produk yang paling sering dicari pelanggan</h2>
        </div>
        <a href="<?= base_url('produk') ?>" class="quick-link fw-bold">Lihat semua produk <i class="bi bi-arrow-right-short"></i></a>
    </div>
    <div class="row g-3">
        <?php
        $games = [
            ['name' => 'Mobile Legends', 'provider' => 'Moonton', 'img' => 'iconMl.png', 'link' => 'detail-mlbb'],
            ['name' => 'MagicChess go go', 'provider' => 'Moonton', 'img' => 'iconMcgg.png', 'link' => '#'],
            ['name' => 'Valorant', 'provider' => 'Riot Games', 'img' => 'icon valo.jpg', 'link' => '#'],
            ['name' => 'Free Fire', 'provider' => 'Garena', 'img' => 'iconff.jpg', 'link' => '#'],
        ];

        foreach ($games as $game): ?>
        <div class="col-6 col-lg-3">
            <div class="product-card p-3 h-100" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px);">
                <div class="ratio ratio-1x1 rounded-4 mb-3 overflow-hidden border">
                    <?php if (isset($game['img'])): ?>
                        <img src="<?= base_url('assets/img/' . $game['img']) ?>" class="w-100 h-100 object-fit-cover" alt="<?= esc($game['name']) ?>">
                    <?php else: ?>
                        <div class="bg-brand text-white d-flex align-items-center justify-content-center w-100 h-100">
                            <i class="bi bi-<?= esc($game['icon']) ?> fs-1"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <h5 class="mb-1"><?= esc($game['name']) ?></h5>
                <p class="small text-soft mb-3"><?= esc($game['provider']) ?></p>
                <a href="<?= $game['link'] === '#' ? '#' : base_url($game['link']) ?>" class="btn btn-outline-brand w-100 rounded-pill">Top Up</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection() ?>