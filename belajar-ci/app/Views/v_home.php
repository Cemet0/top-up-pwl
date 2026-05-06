<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<section class="hero mb-5">
    <div class="row g-4 align-items-center">
        <div class="col-lg-7">
            <span class="section-kicker mb-3"><i class="bi bi-stars"></i> Company Profile Top Up</span>
            <h1 class="display-5 fw-bold mb-3">Layanan top up yang cepat, rapi, dan siap dipakai untuk dashboard operasional.</h1>
            <p class="lead text-soft mb-4">Dante Store membantu pelanggan melakukan top up game tanpa proses yang berbelit. Tampilan dirancang sebagai company profile yang tetap nyambung dengan dashboard, katalog, dan alur pembayaran.</p>
            <div class="d-flex flex-wrap gap-3">
                <a href="<?= base_url('produk') ?>" class="btn btn-brand btn-lg rounded-pill px-4">Lihat Produk</a>
            </div>
            <div class="d-flex flex-wrap gap-3 mt-4 small text-soft">
                <span><i class="bi bi-shield-check text-brand me-1"></i> Aman</span>
                <span><i class="bi bi-lightning-charge text-brand me-1"></i> Proses cepat</span>
                <span><i class="bi bi-headset text-brand me-1"></i> Support aktif</span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="glass-card p-4 p-lg-5">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <div class="text-uppercase text-soft small fw-bold">Ringkasan Layanan</div>
                        <h3 class="mb-0">Top Up Dashboard</h3>
                    </div>
                    <span class="badge rounded-pill text-bg-primary-subtle text-brand border border-primary-subtle px-3 py-2">Live</span>
                </div>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="metric-card p-3 h-100">
                            <div class="text-soft small">Pesanan selesai</div>
                            <div class="h3 fw-bold mb-0">1.2K</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metric-card p-3 h-100">
                            <div class="text-soft small">Waktu proses</div>
                            <div class="h3 fw-bold mb-0">&lt; 5 mnt</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="summary-card p-3 d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-soft small">Metode pembayaran aktif</div>
                                <div class="fw-bold">QRIS, E-Wallet, Transfer</div>
                            </div>
                            <i class="bi bi-wallet2 fs-1 text-brand"></i>
                        </div>
                    </div>
                </div>
            </div>
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