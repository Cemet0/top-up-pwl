<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dante Store | Top Up Game</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --bg: #f4f7fb;
            --surface: rgba(255, 255, 255, 0.86);
            --surface-strong: #ffffff;
            --line: rgba(15, 23, 42, 0.08);
            --text: #0f172a;
            --muted: #64748b;
            --brand: #125dff;
            --brand-2: #24c6dc;
            --shadow: 0 18px 55px rgba(15, 23, 42, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: var(--text);
            font-family: "Manrope", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(18, 93, 255, 0.15), transparent 30%),
                radial-gradient(circle at top right, rgba(36, 198, 220, 0.12), transparent 26%),
                linear-gradient(180deg, #ffffff 0%, var(--bg) 100%);
            min-height: 100vh;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            filter: blur(30px);
            opacity: 0.22;
            pointer-events: none;
            z-index: 0;
        }

        body::before {
            top: -90px;
            left: -120px;
            background: #125dff;
        }

        body::after {
            right: -100px;
            bottom: 80px;
            background: #24c6dc;
        }

        .site-shell,
        .site-footer {
            position: relative;
            z-index: 1;
        }

        .navbar {
            backdrop-filter: blur(40px) saturate(220%) contrast(95%);
            -webkit-backdrop-filter: blur(40px) saturate(220%) contrast(95%);
            background: rgba(255, 255, 255, 0.08) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.22);
            box-shadow: 
                inset 0 1px 0 rgba(255, 255, 255, 0.45), 
                0 8px 32px rgba(15, 23, 42, 0.06);
            position: sticky !important;
            top: 0;
            z-index: 1020;
        }

        .navbar > .container {
            position: relative;
            z-index: 2;
        }

        .navbar-brand {
            font-family: "Space Grotesk", sans-serif;
            letter-spacing: 0.2px;
            color: var(--text) !important;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
            box-shadow: 0 14px 24px rgba(18, 93, 255, 0.25);
        }

        .navbar .nav-link {
            color: var(--muted);
            font-weight: 600;
            padding: 0.8rem 1rem;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link:focus,
        .navbar .nav-link.active {
            color: var(--brand);
        }

        .site-shell {
            padding: 2rem 0 3.5rem;
        }

        .site-content {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 32px;
            box-shadow: var(--shadow);
            overflow: hidden;
            backdrop-filter: blur(20px);
        }

        .page-pad {
            padding: clamp(1.25rem, 2vw, 2rem);
        }

        .section-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 999px;
            padding: 0.45rem 0.85rem;
            background: rgba(18, 93, 255, 0.09);
            color: var(--brand);
            font-size: 0.82rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        h1, h2, h3, h4, h5, h6,
        .display-1, .display-2, .display-3 {
            font-family: "Space Grotesk", sans-serif;
            letter-spacing: -0.03em;
        }

        .glass-card,
        .feature-card,
        .soft-card,
        .product-card,
        .metric-card,
        .timeline-card,
        .summary-card {
            background: var(--surface-strong);
            border: 1px solid var(--line);
            border-radius: 24px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        }

        .bg-brand {
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
        }

        .text-brand {
            color: var(--brand) !important;
        }

        .text-soft {
            color: var(--muted);
        }

        .btn-brand {
            background: linear-gradient(135deg, var(--brand), #2f79ff);
            border: none;
            color: #fff;
            box-shadow: 0 14px 28px rgba(18, 93, 255, 0.25);
        }

        .btn-brand:hover {
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-outline-brand {
            border-color: rgba(18, 93, 255, 0.22);
            color: var(--brand);
        }

        .btn-outline-brand:hover {
            background: rgba(18, 93, 255, 0.08);
            color: var(--brand);
        }

        .site-footer-wide {
            padding: 4rem 0 3rem;
            color: var(--muted);
            backdrop-filter: blur(40px) saturate(220%) contrast(95%);
            -webkit-backdrop-filter: blur(40px) saturate(220%) contrast(95%);
            background: rgba(255, 255, 255, 0.08) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.22);
            box-shadow: 
                inset 0 1px 0 rgba(255, 255, 255, 0.45), 
                0 -8px 32px rgba(15, 23, 42, 0.05);
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .site-footer-wide > .container {
            position: relative;
            z-index: 2;
        }

        .footer-brand {
            font-family: "Space Grotesk", sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark-small {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
            font-size: 1.1rem;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(15, 23, 42, 0.05);
            color: var(--muted);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background: var(--brand);
            color: #fff;
            transform: translateY(-3px);
        }

        .quick-link {
            color: var(--muted);
            text-decoration: none;
            font-weight: 600;
        }

        .quick-link:hover {
            color: var(--brand);
        }

        /* Custom Dropdown Styling */
        .dropdown-menu .dropdown-item {
            font-weight: 600;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }
        .dropdown-menu .dropdown-item:hover {
            background: rgba(18, 93, 255, 0.08);
            transform: translateX(2px);
        }

        @media (max-width: 991.98px) {
            .navbar .nav-link {
                padding-left: 0;
                padding-right: 0;
            }
        }

        /* Full Image Banner Hero Styles */
        .hero-full-banner {
            height: 480px;
            background: #0a192f;
            position: relative;
        }

        .banner-image-container {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center right;
            filter: brightness(0.8);
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(10, 25, 47, 0.95) 20%, rgba(10, 25, 47, 0.4) 60%, transparent 100%);
        }

        .hero-badge-small {
            display: inline-block;
            padding: 4px 12px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            color: #4fc3f7;
            text-transform: uppercase;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-glass-dark {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-glass-dark:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .banner-status-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: 15;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .floating-badge {
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .animate-float-delayed {
            animation: float-main 6s ease-in-out infinite;
            animation-delay: 1s;
        }

        /* Gradient Text Fix */
        .text-gradient-gold {
            background: linear-gradient(to right, #ffca28, #fbc02d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-cyan {
            background: linear-gradient(to right, #4fc3f7, #00bcd4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-gradient-primary {
            background: linear-gradient(135deg, #125dff, #00d2ff);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-gradient-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(18, 93, 255, 0.3);
            color: white;
        }

        /* Carousel Custom Premium Styles */
        .carousel-control-prev,
        .carousel-control-next {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            margin: 0 24px;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 12;
        }

        .carousel-control-prev { left: 0; }
        .carousel-control-next { right: 0; }

        .hero-full-banner:hover .carousel-control-prev,
        .hero-full-banner:hover .carousel-control-next {
            opacity: 1;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            transform: translateY(-50%) scale(1.08);
            opacity: 1 !important;
        }

        .carousel-indicators {
            bottom: 24px;
            left: 24px;
            margin: 0;
            justify-content: flex-start;
            gap: 8px;
            z-index: 12;
        }

        @media (min-width: 992px) {
            .carousel-indicators {
                left: 48px;
                bottom: 32px;
            }
        }

        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 6px;
            border-radius: 3px;
            border: none;
            background-color: rgba(255, 255, 255, 0.35);
            opacity: 1;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .carousel-indicators .active {
            width: 28px;
            background: linear-gradient(135deg, #125dff, #00d2ff);
            box-shadow: 0 0 12px rgba(18, 93, 255, 0.6);
        }

        /* Slide staggered content transitions */
        .carousel-item .hero-badge-small,
        .carousel-item h2,
        .carousel-item p,
        .carousel-item .d-flex {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .carousel-item .hero-badge-small {
            transform: translateY(-16px);
        }

        .carousel-item.active .hero-badge-small {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.15s;
        }

        .carousel-item.active h2 {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.3s;
        }

        .carousel-item.active p {
            opacity: 0.8;
            transform: translateY(0);
            transition-delay: 0.45s;
        }

        .carousel-item.active .d-flex {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.6s;
        }



        /* Animations */
        .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
        .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 0.8s ease-out forwards; }
        .animate-float { animation: float-main 5s ease-in-out infinite; }

        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes float-main { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-3" href="<?= base_url('/') ?>">
                <span class="brand-mark"><i class="bi bi-lightning-charge-fill"></i></span>
                <span>
                    DANTE STORE
                    <small class="d-block text-uppercase text-soft fw-semibold" style="font-size: .72rem; letter-spacing: .18em;">Top Up Company Profile</small>
                </span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('produk') ?>">Produk</a></li>
                    
                    <?php if (session()->get('isLoggedIn')): ?>
                        <?php if (session()->get('role') === 'Client'): ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('profile') ?>">Profil & Riwayat</a></li>
                        <?php endif; ?>
                        
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 py-1 px-3 rounded-pill" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: rgba(18, 93, 255, 0.1); border: 1px solid rgba(18, 93, 255, 0.2); color: var(--brand);">
                                <i class="bi bi-person-circle fs-5"></i>
                                <span><?= esc(session()->get('username')) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end glass-card border-0 shadow-lg p-2" aria-labelledby="userDropdown" style="backdrop-filter: blur(25px); background: rgba(255, 255, 255, 0.85);">
                                <li>
                                    <div class="dropdown-header text-dark fw-bold">
                                        <?= esc(session()->get('username')) ?>
                                        <small class="d-block text-muted"><?= esc(session()->get('role')) ?></small>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider opacity-10"></li>
                                <?php if (session()->get('role') === 'Administrator'): ?>
                                    <li><a class="dropdown-item rounded-3 text-dark" href="<?= base_url('dashboard') ?>"><i class="bi bi-speedometer2 me-2"></i> Dashboard Admin</a></li>
                                <?php elseif (session()->get('role') === 'Client'): ?>
                                    <li><a class="dropdown-item rounded-3 text-dark" href="<?= base_url('profile') ?>"><i class="bi bi-person-badge-fill me-2"></i> Profil Saya</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item rounded-3 text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-brand btn-sm rounded-pill px-4" href="<?= base_url('login') ?>">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk / Daftar
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="site-shell">
        <div class="container">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 rounded-4 shadow-sm py-3 px-4 mb-4 d-flex align-items-center gap-3" role="alert" style="background: rgba(25, 135, 84, 0.12); color: #198754; backdrop-filter: blur(15px);">
                    <i class="bi bi-patch-check-fill fs-4"></i>
                    <div><?= session()->getFlashdata('success') ?></div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger border-0 rounded-4 shadow-sm py-3 px-4 mb-4 d-flex align-items-center gap-3" role="alert" style="background: rgba(220, 53, 69, 0.12); color: #dc3545; backdrop-filter: blur(15px);">
                    <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                    <div><?= session()->getFlashdata('error') ?></div>
                </div>
            <?php endif; ?>

            <div class="site-content">
                <div class="page-pad">
                    <?= $this->renderSection('client_content') ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="site-footer-wide">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-5">
                    <a href="<?= base_url('/') ?>" class="footer-brand mb-4">
                        <span class="brand-mark-small"><i class="bi bi-lightning-charge-fill"></i></span>
                        <span>DANTE STORE</span>
                    </a>
                    <p class="mb-4 text-soft pe-lg-5" style="line-height: 1.7;">
                        Platform top-up game tercepat dan terpercaya. Kami menghadirkan kemudahan transaksi untuk pengalaman gaming yang lebih maksimal bagi komunitas gamer Indonesia.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-discord"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2 ms-auto">
                    <h6 class="fw-bold text-dark mb-4 text-uppercase small" style="letter-spacing: 1px;">Layanan</h6>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li><a href="<?= base_url('/') ?>" class="quick-link">Beranda</a></li>
                        <li><a href="<?= base_url('produk') ?>" class="quick-link">Katalog Produk</a></li>
                        <li><a href="<?= base_url('keranjang') ?>" class="quick-link">Pesanan Saya</a></li>
                        <li><a href="#" class="quick-link">Metode Pembayaran</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="fw-bold text-dark mb-4 text-uppercase small" style="letter-spacing: 1px;">Bantuan</h6>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li><a href="#" class="quick-link">Hubungi Kami</a></li>
                        <li><a href="#" class="quick-link">Pusat Bantuan</a></li>
                        <li><a href="#" class="quick-link">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="quick-link">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-5 opacity-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <p class="mb-0 small text-soft">&copy; 2026 Dante Store. Seluruh hak cipta dilindungi.</p>
                <div class="d-flex align-items-center gap-2 small text-soft">
                    <span>Powering gamers across the nation</span>
                    <span class="opacity-25">|</span>
                    <span class="text-primary fw-bold">Dante Team</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="<?= base_url('assets/js/fluid-glass.js') ?>"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Navbar liquid glass (iOS 26 style)
            new FluidGlass('.navbar', {
                mode: 'navbar',
                intensity: 1.0
            });

            // Footer liquid glass (iOS 26 style)
            new FluidGlass('.site-footer-wide', {
                mode: 'footer',
                intensity: 0.95
            });
        });
    </script>
</body>
</html>