<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="fw-bold text-dark"><i class="bi bi-grid-fill text-primary me-2"></i>Daftar Item Top Up</h3>
            <p class="text-muted">Pilih produk digital favorit Anda dengan harga terbaik.</p>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-start-0" placeholder="Cari game...">
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="position-relative">
                    <img src="https://via.placeholder.com/300x160" class="card-img-top" alt="MLBB">
                    <span class="position-absolute top-0 end-0 m-2 badge bg-danger">Populer</span>
                </div>
                <div class="card-body text-center d-flex flex-column">
                    <h6 class="fw-bold mb-1">Mobile Legends</h6>
                    <small class="text-muted mb-3">Moonton</small>
                    <a href="<?= base_url('v_detail_mlbb') ?>" class="btn btn-primary btn-sm mt-auto rounded-pill px-4">Top Up</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://via.placeholder.com/300x160" class="card-img-top" alt="FF">
                <div class="card-body text-center d-flex flex-column">
                    <h6 class="fw-bold mb-1">Free Fire</h6>
                    <small class="text-muted mb-3">Garena</small>
                    <a href="#" class="btn btn-primary btn-sm mt-auto rounded-pill px-4">Top Up</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://via.placeholder.com/300x160" class="card-img-top" alt="GI">
                <div class="card-body text-center d-flex flex-column">
                    <h6 class="fw-bold mb-1">Genshin Impact</h6>
                    <small class="text-muted mb-3">HoYoverse</small>
                    <a href="#" class="btn btn-primary btn-sm mt-auto rounded-pill px-4">Top Up</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://via.placeholder.com/300x160" class="card-img-top" alt="VAL">
                <div class="card-body text-center d-flex flex-column">
                    <h6 class="fw-bold mb-1">Valorant</h6>
                    <small class="text-muted mb-3">Riot Games</small>
                    <a href="#" class="btn btn-primary btn-sm mt-auto rounded-pill px-4">Top Up</a>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    /* Tambahan style biar makin estetik */
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .btn-primary {
        background-color: #0d6efd;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
    }
</style>

<?= $this->endSection() ?>