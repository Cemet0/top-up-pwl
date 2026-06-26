<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>

<?php if (empty($grouped)): ?>
<div class="card p-4 text-center text-muted py-5">
    <i class="bi bi-inbox fs-1 mb-3 d-block"></i>
    <p>Belum ada nominal. <a href="<?= base_url('admin/games') ?>" class="text-decoration-none">Tambah game</a> terlebih dahulu.</p>
</div>
<?php else: ?>
    <?php foreach ($grouped as $gid => $group): ?>
    <div class="card p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
            <h5 class="fw-bold mb-0"><?= esc($group['game_name']) ?></h5>
            <a href="<?= base_url('admin/items/create/' . $gid) ?>" class="btn btn-brand btn-sm rounded-pill px-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Nominal
            </a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Nominal</th>
                        <th>Harga (Rp)</th>
                        <th>Harga Asli</th>
                        <th>Diskon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($group['items'] as $i => $item): ?>
                    <tr>
                        <td class="text-muted"><?= $i + 1 ?></td>
                        <td class="fw-semibold"><?= esc($item['title']) ?></td>
                        <td>Rp <?= number_format((float)$item['price'], 0, ',', '.') ?></td>
                        <td><?= $item['original_price'] ? 'Rp ' . number_format((float)$item['original_price'], 0, ',', '.') : '-' ?></td>
                        <td><?= $item['discount'] ? '<span class="badge rounded-pill text-bg-danger">' . esc($item['discount']) . '</span>' : '-' ?></td>
                        <td>
                            <a href="<?= base_url('admin/items/edit/' . $item['id']) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-pencil"></i></a>
                            <a href="<?= base_url('admin/items/delete/' . $item['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill" data-confirm="Hapus nominal <?= esc($item['title']) ?>?"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
<?= $this->endSection() ?>
