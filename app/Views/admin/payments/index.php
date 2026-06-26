<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="card p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Metode</th>
                    <th>Kode</th>
                    <th>Biaya Admin (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($payments)): ?>
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada metode pembayaran.</td></tr>
                <?php else: ?>
                    <?php foreach ($payments as $i => $p): ?>
                    <tr>
                        <td class="text-muted"><?= $i + 1 ?></td>
                        <td class="fw-semibold"><?= esc($p['name']) ?></td>
                        <td><span class="badge rounded-pill text-bg-light border text-uppercase"><?= esc($p['code']) ?></span></td>
                        <td>Rp <?= number_format((float)$p['fee'], 0, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url('admin/payments/edit/' . $p['id']) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-pencil"></i></a>
                            <a href="<?= base_url('admin/payments/delete/' . $p['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill" data-confirm="Hapus metode <?= esc($p['name']) ?>?"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
