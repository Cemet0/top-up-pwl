<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin | Dante Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="<?= base_url('NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
    <style>
        :root {
            --brand: #125dff;
            --brand-2: #24c6dc;
        }
        body { font-family: "Manrope", sans-serif; background: #f6f9ff; }
        .brand-gradient { background: linear-gradient(135deg, var(--brand), var(--brand-2)); }
        .sidebar-nav .nav-link.active { background: rgba(18, 93, 255, 0.1); color: var(--brand); }
        .sidebar-nav .nav-link:hover { background: rgba(18, 93, 255, 0.05); }
        .card { border-radius: 16px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.04); }
        .btn-brand { background: linear-gradient(135deg, var(--brand), #2f79ff); border: none; color: #fff; }
        .btn-brand:hover { color: #fff; transform: translateY(-1px); box-shadow: 0 8px 20px rgba(18, 93, 255, 0.3); }
        .btn-outline-brand { border-color: var(--brand); color: var(--brand); }
        .btn-outline-brand:hover { background: var(--brand); color: #fff; }
        .page-title { font-family: "Space Grotesk", sans-serif; letter-spacing: -0.03em; }
        .table th { font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; border-bottom-width: 1px; }
        .stat-card { border-radius: 16px; border: none; transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,0,0,0.08); }
        .badge-brand { background: rgba(18, 93, 255, 0.12); color: var(--brand); }
    </style>
</head>
<body>
    <?= $this->include('components/header') ?>
    <?= $this->include('components/sidebar') ?>

    <main id="main" class="main">
        <div class="pagetitle d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h1 class="page-title fw-bold fs-3 mb-1"><?= isset($title) ? $title : 'Dashboard' ?></h1>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none">Admin</a></li>
                        <li class="breadcrumb-item active"><?= isset($title) ? $title : 'Dashboard' ?></li>
                    </ol>
                </nav>
            </div>
            <div>
                <?php if (isset($headerButton)): ?>
                    <a href="<?= $headerButton['url'] ?>" class="btn btn-brand btn-sm rounded-pill px-3">
                        <i class="bi <?= $headerButton['icon'] ?> me-1"></i> <?= $headerButton['label'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success border-0 rounded-4 shadow-sm d-flex align-items-center gap-2 py-3 px-4 mb-4">
                <i class="bi bi-check-circle-fill fs-5"></i> <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger border-0 rounded-4 shadow-sm d-flex align-items-center gap-2 py-3 px-4 mb-4">
                <i class="bi bi-exclamation-triangle-fill fs-5"></i> <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('admin_content') ?>
    </main>

    <?= $this->include('components/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('NiceAdmin/assets/js/main.js') ?>"></script>
    <script>
        document.querySelectorAll('[data-confirm]').forEach(el => {
            el.addEventListener('click', function(e) {
                if (!confirm(this.dataset.confirm || 'Yakin?')) e.preventDefault();
            });
        });
    </script>
</body>
</html>
