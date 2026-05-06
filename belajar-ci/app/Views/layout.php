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
        .site-footer,
        .navbar {
            position: relative;
            z-index: 1;
        }

        .navbar {
            backdrop-filter: blur(18px);
            background: rgba(255, 255, 255, 0.84) !important;
            border-bottom: 1px solid var(--line);
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.05);
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

        .site-footer {
            padding: 1.6rem 0 2rem;
            color: var(--muted);
        }

        .site-footer .footer-card {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 1rem 1.25rem;
        }

        .quick-link {
            color: var(--muted);
            text-decoration: none;
            font-weight: 600;
        }

        .quick-link:hover {
            color: var(--brand);
        }

        @media (max-width: 991.98px) {
            .navbar .nav-link {
                padding-left: 0;
                padding-right: 0;
            }
        }
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
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('keranjang') ?>">Pesanan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="site-shell">
        <div class="container">
            <div class="site-content">
                <div class="page-pad">
                    <?= $this->renderSection('client_content') ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-card d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                <div>
                    <div class="fw-bold text-brand">Dante Store</div>
                    <div class="small">Top up game cepat, aman, dan rapi untuk kebutuhan pelanggan serta operasional dashboard.</div>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a class="quick-link" href="<?= base_url('/') ?>">Beranda</a>
                    <a class="quick-link" href="<?= base_url('produk') ?>">Produk</a>
                </div>
            </div>
            <p class="text-center mb-0 mt-3 small">&copy; 2026 Dante Store. Tuan Muda Project.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>