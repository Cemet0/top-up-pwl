<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<section class="mb-4">
    <span class="section-kicker mb-2"><i class="bi bi-speedometer2"></i> Dashboard Operasional</span>
    <h1 class="mb-2">Ringkasan aktivitas top up dalam satu tampilan.</h1>
    <p class="text-soft mb-0">Dashboard ini dirapikan supaya owner atau operator bisa memantau order, payment, dan status layanan tanpa tampilan yang penuh komponen acak.</p>
</section>

<section class="row g-3 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Pesanan hari ini</div>
            <div class="display-6 fw-bold mb-0">128</div>
            <div class="small text-success fw-semibold"><i class="bi bi-arrow-up"></i> 12% dari kemarin</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Order sukses</div>
            <div class="display-6 fw-bold mb-0">116</div>
            <div class="small text-success fw-semibold"><i class="bi bi-check2-circle"></i> Tingkat sukses 90,6%</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Pending payment</div>
            <div class="display-6 fw-bold mb-0">9</div>
            <div class="small text-warning fw-semibold"><i class="bi bi-hourglass-split"></i> Perlu dipantau</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="metric-card p-4 h-100">
            <div class="text-soft small">Omzet hari ini</div>
            <div class="display-6 fw-bold mb-0">Rp 3,8 jt</div>
            <div class="small text-brand fw-semibold"><i class="bi bi-graph-up"></i> Stabil</div>
        </div>
    </div>
</section>

<section class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="glass-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                <div>
                    <h5 class="mb-1">Order terbaru</h5>
                    <div class="small text-soft">Daftar transaksi terakhir yang masuk ke sistem.</div>
                </div>
                <span class="badge rounded-pill text-bg-primary-subtle text-brand border border-primary-subtle px-3 py-2">Live update</span>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#882910</td>
                            <td>Mobile Legends - 86 Diamonds</td>
                            <td>QRIS</td>
                            <td><span class="badge rounded-pill text-bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>#882911</td>
                            <td>Free Fire - 70 Diamonds</td>
                            <td>DANA</td>
                            <td><span class="badge rounded-pill text-bg-warning text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#882912</td>
                            <td>Valorant - 475 VP</td>
                            <td>QRIS</td>
                            <td><span class="badge rounded-pill text-bg-info">Diproses</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="glass-card p-4 h-100">
            <h5 class="mb-3">Channel pembayaran</h5>
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-soft">QRIS</span>
                    <span class="fw-bold">72%</span>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-brand" style="width: 72%"></div>
                </div>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-soft">E-Wallet</span>
                    <span class="fw-bold">21%</span>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-info" style="width: 21%"></div>
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-soft">Transfer bank</span>
                    <span class="fw-bold">7%</span>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-warning" style="width: 7%"></div>
                </div>
            </div>
            <div class="summary-card p-3">
                <div class="fw-bold mb-1">Catatan operasional</div>
                <div class="small text-soft">Dashboard diposisikan untuk melihat performa top up dan status pesanan secara cepat. Cocok sebagai halaman admin ringan.</div>
            </div>
        </div>
    </div>
</section>

<section class="row g-3">
    <div class="col-md-4">
        <div class="feature-card p-4 h-100">
            <div class="mb-3 text-brand fs-3"><i class="bi bi-inbox"></i></div>
            <h5>Pesanan baru</h5>
            <p class="mb-0 text-soft">Operator bisa melihat order yang masuk tanpa membuka halaman lain.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card p-4 h-100">
            <div class="mb-3 text-brand fs-3"><i class="bi bi-credit-card-2-front"></i></div>
            <h5>Channel aktif</h5>
            <p class="mb-0 text-soft">Metode pembayaran yang digunakan pelanggan ditampilkan lebih ringkas.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card p-4 h-100">
            <div class="mb-3 text-brand fs-3"><i class="bi bi-sliders"></i></div>
            <h5>Siap dikembangkan</h5>
            <p class="mb-0 text-soft">Struktur ini bisa diperluas ke halaman admin yang lebih lengkap saat dibutuhkan.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>