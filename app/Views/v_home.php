<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<section class="hero-full-banner mb-5 overflow-hidden rounded-5 position-relative">
    <!-- Main Banner Image -->
    <div class="banner-image-container">
        <img src="<?= base_url('assets/img/image.png') ?>" class="banner-img" alt="Hero Banner">
        <div class="banner-overlay"></div>
    </div>

    <!-- Text Content Over Image -->
    <div class="banner-content position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="z-index: 10;">
        <div class="container text-start ps-4 ps-lg-5">
            <div class="hero-badge-small mb-3 animate-fade-in-down">
                <i class="bi bi-controller me-2"></i> Official Store
            </div>
            
            <h2 class="fw-800 mb-2 text-white font-space-grotesk animate-fade-in" style="font-size: 2.2rem; max-width: 500px; line-height: 1.2;">
                Solusi Pembayaran <span class="text-gradient-gold">Terbaik</span> <br>
                Untuk Gaming <span class="text-gradient-cyan">Lancar</span>
            </h2>
            
            <p class="mb-4 text-white opacity-80 animate-fade-in-up" style="max-width: 450px; font-size: 0.95rem;">
                Top up cepat, aman, dan terpercaya. Nikmati kemudahan transaksi dengan berbagai metode pembayaran hanya di Dante Store.
            </p>

            <div class="d-flex flex-wrap gap-2 animate-fade-in-up">
                <a href="<?= base_url('produk') ?>" class="btn btn-gradient-primary btn-sm rounded-pill px-4 py-2 fw-bold shadow-lg">
                    Top Up Sekarang <i class="bi bi-lightning-charge-fill ms-1"></i>
                </a>
                <a href="#" class="btn btn-glass-dark btn-sm rounded-pill px-4 py-2 fw-bold text-white">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Floating Status Overlays -->
    <div class="banner-status-container d-none d-lg-block">
        <div class="floating-badge success-badge glass-morphism animate-float">
            <i class="bi bi-patch-check-fill text-success"></i> 10.000+ Transaksi Berhasil
        </div>
        <div class="floating-badge secure-badge glass-morphism animate-float-delayed">
            <i class="bi bi-shield-lock-fill text-primary"></i> 100% Aman & Terpercaya
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="row g-3">
        <div class="col-md-4">
            <div class="feature-card p-4 h-100">
                <div class="mb-3 text-brand fs-3"><i class="bi bi-bag-check"></i></div>
                <h5>Transaksi yang jelas</h5>
                <p class="mb-0 text-soft">Setiap pesanan punya alur yang mudah dipahami dari katalog, keranjang, sampai pembayaran.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card p-4 h-100">
                <div class="mb-3 text-brand fs-3"><i class="bi bi-stopwatch"></i></div>
                <h5>Proses cepat</h5>
                <p class="mb-0 text-soft">Dashboard diringkas supaya operator dan pelanggan bisa melihat status top up tanpa kebingungan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card p-4 h-100">
                <div class="mb-3 text-brand fs-3"><i class="bi bi-chat-dots"></i></div>
                <h5>Support responsif</h5>
                <p class="mb-0 text-soft">Kontak dan informasi layanan ditempatkan di area yang mudah dijangkau saat pelanggan butuh bantuan.</p>
            </div>
        </div>
    </div>
</section>

<section class="row g-4 align-items-center mb-5">
    <div class="col-lg-6">
        <div class="soft-card p-4 p-lg-5 h-100">
            <span class="section-kicker mb-3"><i class="bi bi-building"></i> Tentang Kami</span>
            <h2 class="mb-3">Dante Store dibangun untuk kebutuhan top up yang cepat dan profesional.</h2>
            <p class="text-soft mb-4">Kami menempatkan company profile, katalog game, dan dashboard operasional dalam satu pengalaman yang konsisten. Tujuannya agar user langsung paham apa yang ditawarkan tanpa harus mencari-cari menu yang tersembunyi.</p>
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="summary-card p-3 h-100">
                        <div class="fw-bold">100% responsif</div>
                        <div class="small text-soft">Nyaman di laptop maupun ponsel.</div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="summary-card p-3 h-100">
                        <div class="fw-bold">Fokus top up</div>
                        <div class="small text-soft">Konten disusun khusus untuk kebutuhan game digital.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="glass-card p-4 p-lg-5">
            <span class="section-kicker mb-3"><i class="bi bi-diagram-3"></i> Alur Top Up</span>
            <div class="timeline-card p-3 mb-3">
                <div class="fw-bold mb-1">1. Pilih game</div>
                <div class="small text-soft">Buka katalog dan tentukan game yang ingin diisi.</div>
            </div>
            <div class="timeline-card p-3 mb-3">
                <div class="fw-bold mb-1">2. Lengkapi data</div>
                <div class="small text-soft">Masukkan ID, zone, nominal, dan metode pembayaran.</div>
            </div>
            <div class="timeline-card p-3">
                <div class="fw-bold mb-1">3. Bayar dan cek status</div>
                <div class="small text-soft">Pembayaran diproses, lalu status pesanan muncul di dashboard.</div>
            </div>
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
            ['name' => 'Mobile Legends', 'provider' => 'Moonton', 'icon' => 'controller', 'link' => 'detail-mlbb'],
            ['name' => 'Free Fire', 'provider' => 'Garena', 'icon' => 'fire', 'link' => '#'],
            ['name' => 'Genshin Impact', 'provider' => 'HoYoverse', 'icon' => 'gem', 'link' => '#'],
            ['name' => 'Valorant', 'provider' => 'Riot Games', 'icon' => 'crosshair', 'link' => '#'],
        ];

        foreach ($games as $game): ?>
        <div class="col-6 col-lg-3">
            <div class="product-card p-3 h-100">
                <div class="ratio ratio-1x1 rounded-4 mb-3 overflow-hidden border">
                    <?php if ($game['name'] === 'Mobile Legends'): ?>
                        <img src="<?= base_url('assets/img/mlbb-icon.png') ?>" class="w-100 h-100 object-fit-cover" alt="MLBB">
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