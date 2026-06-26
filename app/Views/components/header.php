<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= base_url('admin/dashboard') ?>" class="logo d-flex align-items-center text-decoration-none">
            <span class="brand-gradient d-flex align-items-center justify-content-center rounded-3 text-white fw-bold" style="width:36px;height:36px;font-size:1.1rem;">
                <i class="bi bi-lightning-charge-fill"></i>
            </span>
            <span class="d-none d-lg-block ms-2 fw-bold" style="font-family:'Space Grotesk',sans-serif;">DANTE ADMIN</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Cari..." title="Cari">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0 text-decoration-none" href="#" data-bs-toggle="dropdown">
                    <div class="brand-gradient d-flex align-items-center justify-content-center rounded-circle text-white fw-bold" style="width:36px;height:36px;font-size:0.9rem;">
                        <?= strtoupper(substr(session()->get('username') ?? 'A', 0, 1)) ?>
                    </div>
                    <span class="d-none d-md-block dropdown-toggle ps-2 fw-semibold"><?= esc(session()->get('username')) ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile shadow-sm border-0 rounded-4 p-2">
                    <li class="dropdown-header">
                        <h6 class="mb-0"><?= esc(session()->get('username')) ?></h6>
                        <span class="small text-muted"><?= esc(session()->get('role')) ?></span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item rounded-3" href="<?= base_url('/') ?>"><i class="bi bi-house-door me-2"></i> Ke Situs Utama</a></li>
                    <li><a class="dropdown-item rounded-3 text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
