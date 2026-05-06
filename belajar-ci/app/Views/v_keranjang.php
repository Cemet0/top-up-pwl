<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>
<section class="mb-4">
  <span class="section-kicker mb-2"><i class="bi bi-bag-check"></i> Detail Pesanan</span>
  <h1 class="mb-2">Keranjang pesanan yang ringkas dan mudah dipantau.</h1>
  <p class="text-soft mb-0">Halaman ini dirapikan supaya status top up dan total tagihan terlihat jelas tanpa membuat tampilan terasa padat.</p>
</section>

<section class="row g-4 align-items-start">
  <div class="col-lg-8">
    <div class="glass-card p-4">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <h5 class="mb-0">Daftar Belanja Anda</h5>
        <span class="badge rounded-pill text-bg-warning-subtle text-warning-emphasis border border-warning-subtle">1 item aktif</span>
      </div>
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th>Game</th>
              <th>Paket</th>
              <th>Harga</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-semibold">Mobile Legends</td>
              <td>86 Diamonds</td>
              <td class="fw-semibold">Rp 20.000</td>
              <td><span class="badge rounded-pill text-bg-warning text-dark">Proses</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="summary-card p-4">
      <h5 class="mb-3">Ringkasan</h5>
      <div class="d-flex justify-content-between mb-2">
        <span class="text-soft">Subtotal</span>
        <span class="fw-semibold">Rp 20.000</span>
      </div>
      <div class="d-flex justify-content-between mb-2">
        <span class="text-soft">Biaya admin</span>
        <span class="fw-semibold">Rp 0</span>
      </div>
      <hr>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="fw-bold">Total</span>
        <span class="h4 mb-0 text-brand">Rp 20.000</span>
      </div>
      <div class="d-grid gap-2">
        <a href="<?= base_url('payment') ?>" class="btn btn-brand rounded-pill">Lanjut Pembayaran</a>
        <a href="<?= base_url('produk') ?>" class="btn btn-outline-brand rounded-pill">Tambah Produk</a>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>