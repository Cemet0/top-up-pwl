<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<style>
    .login-tabs .nav-link {
        color: var(--muted);
        font-weight: 700;
        font-size: 0.95rem;
        background: transparent;
        border: none;
        transition: all 0.3s ease;
    }
    .login-tabs .nav-link.active {
        background: var(--brand) !important;
        color: white !important;
        box-shadow: 0 8px 20px rgba(18, 93, 255, 0.25);
    }
    .form-control-custom {
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(15, 23, 42, 0.1);
        border-radius: 0 12px 12px 0;
        color: var(--text);
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .form-control-custom:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 4px rgba(18, 93, 255, 0.15);
        background: #fff;
        outline: none;
    }
</style>

<?php
// Get active tab from session flashdata (defaults to 'login')
$activeTab = session()->getFlashdata('active_tab') ?? 'login';
?>

<div class="row justify-content-center py-5">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <!-- iOS 26 Style Liquid Glass Card -->
        <div class="login-card p-4 p-sm-5 text-center overflow-hidden position-relative animate-fade-in" style="
            background: rgba(255, 255, 255, 0.06) !important;
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 32px;
            box-shadow: 
                inset 0 1px 0 rgba(255, 255, 255, 0.45), 
                0 24px 60px rgba(15, 23, 42, 0.12);
            backdrop-filter: blur(40px) saturate(220%) contrast(95%);
            -webkit-backdrop-filter: blur(40px) saturate(220%) contrast(95%);
        ">
            <!-- Glass Reflections Mesh -->
            <div class="reflection-glow" style="
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle at center, rgba(18, 93, 255, 0.1) 0%, transparent 60%);
                pointer-events: none;
                z-index: 0;
            "></div>

            <div class="position-relative" style="z-index: 1;">
                <!-- Brand Logo Mark -->
                <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-4" style="
                    width: 64px;
                    height: 64px;
                    background: linear-gradient(135deg, var(--brand), var(--brand-2));
                    color: #fff;
                    box-shadow: 0 14px 28px rgba(18, 93, 255, 0.25);
                ">
                    <i class="bi bi-person-lock fs-2"></i>
                </div>

                <h2 class="fw-800 text-dark mb-1" style="font-family: 'Space Grotesk', sans-serif;">DANTE PORTAL</h2>
                <p class="text-soft small mb-4">Masuk untuk melihat riwayat pesanan Anda atau kelola sistem.</p>

                <!-- Tabs Navigation -->
                <div class="d-flex justify-content-center mb-4">
                    <div class="nav nav-pills p-1 bg-white border rounded-pill login-tabs" id="authTabs" role="tablist" style="box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);">
                        <button class="nav-link rounded-pill px-4 py-2 <?= $activeTab === 'login' ? 'active' : '' ?>" id="login-tab" data-bs-toggle="pill" data-bs-target="#login-panel" type="button" role="tab" aria-controls="login-panel" aria-selected="<?= $activeTab === 'login' ? 'true' : 'false' ?>">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                        </button>
                        <button class="nav-link rounded-pill px-4 py-2 <?= $activeTab === 'register' ? 'active' : '' ?>" id="register-tab" data-bs-toggle="pill" data-bs-target="#register-panel" type="button" role="tab" aria-controls="register-panel" aria-selected="<?= $activeTab === 'register' ? 'true' : 'false' ?>">
                            <i class="bi bi-person-plus-fill me-1"></i> Daftar
                        </button>
                    </div>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content text-start" id="authTabsContent">
                    <!-- Login Panel -->
                    <div class="tab-pane fade <?= $activeTab === 'login' ? 'show active' : '' ?>" id="login-panel" role="tabpanel" aria-labelledby="login-tab">
                        <form action="<?= base_url('login') ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="username" class="form-label small fw-bold text-dark opacity-75">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0" style="background: rgba(15, 23, 42, 0.04); color: var(--muted); border-radius: 12px 0 0 12px;">
                                        <i class="bi bi-person-fill"></i>
                                    </span>
                                    <input type="text" class="form-control px-3 form-control-custom" id="username" name="username" placeholder="Masukkan username" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label small fw-bold text-dark opacity-75 mb-0">Password</label>
                                    <a href="#" class="small text-brand fw-semibold text-decoration-none">Lupa Password?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text border-0" style="background: rgba(15, 23, 42, 0.04); color: var(--muted); border-radius: 12px 0 0 12px;">
                                        <i class="bi bi-key-fill"></i>
                                    </span>
                                    <input type="password" class="form-control px-3 form-control-custom" id="password" name="password" placeholder="Masukkan password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-brand w-100 rounded-pill py-2-5 fw-bold d-flex align-items-center justify-content-center gap-2 mb-4" style="
                                background: linear-gradient(135deg, var(--brand), #2f79ff);
                                box-shadow: 0 12px 24px rgba(18, 93, 255, 0.3);
                                transition: all 0.3s ease;
                            " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 16px 32px rgba(18, 93, 255, 0.4)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 12px 24px rgba(18, 93, 255, 0.3)';">
                                <span>Masuk Sekarang</span> <i class="bi bi-box-arrow-in-right fs-5"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Register Panel -->
                    <div class="tab-pane fade <?= $activeTab === 'register' ? 'show active' : '' ?>" id="register-panel" role="tabpanel" aria-labelledby="register-tab">
                        <form action="<?= base_url('register') ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="reg_username" class="form-label small fw-bold text-dark opacity-75">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0" style="background: rgba(15, 23, 42, 0.04); color: var(--muted); border-radius: 12px 0 0 12px;">
                                        <i class="bi bi-person-fill"></i>
                                    </span>
                                    <input type="text" class="form-control px-3 form-control-custom" id="reg_username" name="username" placeholder="Pilih username" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="reg_email" class="form-label small fw-bold text-dark opacity-75">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0" style="background: rgba(15, 23, 42, 0.04); color: var(--muted); border-radius: 12px 0 0 12px;">
                                        <i class="bi bi-envelope-fill"></i>
                                    </span>
                                    <input type="email" class="form-control px-3 form-control-custom" id="reg_email" name="email" placeholder="Alamat email Anda" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="reg_password" class="form-label small fw-bold text-dark opacity-75">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0" style="background: rgba(15, 23, 42, 0.04); color: var(--muted); border-radius: 12px 0 0 12px;">
                                        <i class="bi bi-key-fill"></i>
                                    </span>
                                    <input type="password" class="form-control px-3 form-control-custom" id="reg_password" name="password" placeholder="Buat password" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="reg_confirm_password" class="form-label small fw-bold text-dark opacity-75">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0" style="background: rgba(15, 23, 42, 0.04); color: var(--muted); border-radius: 12px 0 0 12px;">
                                        <i class="bi bi-shield-fill-check"></i>
                                    </span>
                                    <input type="password" class="form-control px-3 form-control-custom" id="reg_confirm_password" name="confirm_password" placeholder="Ulangi password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-brand w-100 rounded-pill py-2-5 fw-bold d-flex align-items-center justify-content-center gap-2 mb-4" style="
                                background: linear-gradient(135deg, var(--brand), #2f79ff);
                                box-shadow: 0 12px 24px rgba(18, 93, 255, 0.3);
                                transition: all 0.3s ease;
                            " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 16px 32px rgba(18, 93, 255, 0.4)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 12px 24px rgba(18, 93, 255, 0.3)';">
                                <span>Daftar Sekarang</span> <i class="bi bi-person-plus-fill fs-5"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Demo Credentials Info Badge -->
                <div class="p-3 rounded-4 text-start mt-2" style="
                    background: rgba(18, 93, 255, 0.06);
                    border: 1px solid rgba(18, 93, 255, 0.15);
                ">
                    <div class="d-flex align-items-center gap-2 text-brand fw-bold small mb-2">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>Demo Credentials (Akun Demo)</span>
                    </div>
                    <ul class="mb-0 ps-3 small text-soft" style="line-height: 1.6; list-style-type: square;">
                        <li><strong>Administrator:</strong> admin / admin</li>
                        <li><strong>Client User:</strong> client / client</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
