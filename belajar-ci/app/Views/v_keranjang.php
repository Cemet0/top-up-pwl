<?= $this->extend('layout') ?>

<?= $this->section('client_content') ?>
<div class="pagetitle">
  <h1>Keranjang Pesanan</h1>
</div>

<section class="section">
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <h5 class="card-title">Daftar Belanja Anda</h5>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Game</th>
            <th>Item</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mobile Legends</td>
            <td>86 Diamonds</td>
            <td>Rp 20.000</td>
            <td><span class="badge bg-warning text-dark">Proses</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?= $this->endSection() ?>