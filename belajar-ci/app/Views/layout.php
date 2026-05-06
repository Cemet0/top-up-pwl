<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dante Store | Top Up Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { 
            background-color: #ffffff; 
            color: #333333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Biru */
        .navbar {
            background-color: #007bff !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Container Biru untuk Konten Utama */
        .main-container {
            background-color: #e7f1ff; /* Biru muda transparan */
            border-radius: 15px;
            padding: 30px;
            border: 1px solid #cfe2ff;
        }

        .card-game {
            border: none;
            border-radius: 12px;
            transition: 0.3s;
            background-color: #ffffff;
        }

        .card-game:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,123,255,0.1);
        }

        .footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 30px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
                <i class="bi bi-lightning-fill"></i> DANTE STORE
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('v_produk') ?>">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('v_keranjang') ?>">Detail Pesanan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-5">
        <div class="main-container">
            <?= $this->renderSection('client_content') ?>
        </div>
    </main>

    <footer class="footer text-center">
        <p class="mb-0 text-muted">&copy; 2026 <b>Dante Store</b>. Tuan Muda Project</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>