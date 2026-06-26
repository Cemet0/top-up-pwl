<?php
$currentUri = trim(service('uri')->getPath(), '/');
$isActive = fn($path) => str_starts_with($currentUri, $path) ? 'active' : '';
$isOpen = fn($path) => str_starts_with($currentUri, $path) ? 'show' : '';
?>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?= $isActive('admin/dashboard') ?>" href="<?= base_url('admin/dashboard') ?>">
                <i class="bi bi-grid"></i><span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= $isActive('/admin/games') ? '' : 'collapsed' ?>" data-bs-target="#games-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-controller"></i><span>Games / Produk</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="games-nav" class="nav-content collapse <?= $isOpen('/admin/games') ?>" data-bs-parent="#sidebar-nav">
                <li><a href="<?= base_url('admin/games') ?>" class="<?= $currentUri === 'admin/games' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Daftar Game</span></a></li>
                <li><a href="<?= base_url('admin/games/create') ?>" class="<?= $currentUri === 'admin/games/create' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Tambah Game</span></a></li>
                <li><a href="<?= base_url('admin/items') ?>" class="<?= $currentUri === 'admin/items' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Daftar Nominal</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= $isActive('/admin/payments') ? '' : 'collapsed' ?>" data-bs-target="#payments-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-credit-card"></i><span>Pembayaran</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="payments-nav" class="nav-content collapse <?= $isOpen('/admin/payments') ?>" data-bs-parent="#sidebar-nav">
                <li><a href="<?= base_url('admin/payments') ?>" class="<?= $currentUri === 'admin/payments' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Metode Pembayaran</span></a></li>
                <li><a href="<?= base_url('admin/payments/create') ?>" class="<?= $currentUri === 'admin/payments/create' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Tambah Metode</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= $isActive('/admin/transactions') ? '' : 'collapsed' ?>" data-bs-target="#transactions-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-receipt"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="transactions-nav" class="nav-content collapse <?= $isOpen('/admin/transactions') ?>" data-bs-parent="#sidebar-nav">
                <li><a href="<?= base_url('admin/transactions') ?>" class="<?= $currentUri === 'admin/transactions' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Semua Transaksi</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= $isActive('/admin/users') ? '' : 'collapsed' ?>" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse <?= $isOpen('/admin/users') ?>" data-bs-parent="#sidebar-nav">
                <li><a href="<?= base_url('admin/users') ?>" class="<?= $currentUri === 'admin/users' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Daftar Pengguna</span></a></li>
            </ul>
        </li>

        <li class="nav-item mt-3">
            <a class="nav-link" href="<?= base_url('/') ?>" target="_blank">
                <i class="bi bi-house-door"></i><span>Ke Situs Utama</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
                <i class="bi bi-box-arrow-right"></i><span>Keluar</span>
            </a>
        </li>
    </ul>
</aside>
