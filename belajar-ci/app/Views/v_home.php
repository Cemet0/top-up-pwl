<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>

<div class="row mb-4">
    <div class="col-12 text-center">
        <h2 class="fw-bold text-primary">Katalog Top Up</h2>
        <p class="text-secondary">Pilih game favorit Tuan Muda dan mulai top up sekarang.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card card-game shadow-sm h-100 overflow-hidden text-center p-3">
            <div class="rounded-3 bg-primary bg-opacity-10 mb-3 py-4">
                <i class="bi bi-controller fs-1 text-primary"></i>
            </div>
            <h6 class="fw-bold mb-3">Mobile Legends</h6>
            <a href="<?= base_url('v_detail_mlbb') ?>" class="btn btn-primary btn-sm rounded-pill w-100">Top Up</a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
        <div class="card card-game shadow-sm h-100 overflow-hidden text-center p-3">
            <div class="rounded-3 bg-primary bg-opacity-10 mb-3 py-4">
                <i class="bi bi-fire fs-1 text-primary"></i>
            </div>
            <h6 class="fw-bold mb-3">Free Fire</h6>
            <a href="#" class="btn btn-primary btn-sm rounded-pill w-100">Top Up</a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
        <div class="card card-game shadow-sm h-100 overflow-hidden text-center p-3">
            <div class="rounded-3 bg-primary bg-opacity-10 mb-3 py-4">
                <i class="bi bi-gem fs-1 text-primary"></i>
            </div>
            <h6 class="fw-bold mb-3">Genshin Impact</h6>
            <a href="#" class="btn btn-primary btn-sm rounded-pill w-100">Top Up</a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
        <div class="card card-game shadow-sm h-100 overflow-hidden text-center p-3">
            <div class="rounded-3 bg-primary bg-opacity-10 mb-3 py-4">
                <i class="bi bi-crosshair fs-1 text-primary"></i>
            </div>
            <h6 class="fw-bold mb-3">Valorant</h6>
            <a href="#" class="btn btn-primary btn-sm rounded-pill w-100">Top Up</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>