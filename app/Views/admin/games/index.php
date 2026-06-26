<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="card p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Game</th>
                    <th>Provider</th>
                    <th>Gambar</th>
                    <th>Badge</th>
                    <th>Link</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($games)): ?>
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada game.</td></tr>
                <?php else: ?>
                    <?php foreach ($games as $i => $g): ?>
                    <tr>
                        <td class="text-muted"><?= $i + 1 ?></td>
                        <td class="fw-semibold"><?= esc($g['name']) ?></td>
                        <td><?= esc($g['provider']) ?></td>
                        <td><code class="small"><?= esc($g['img'] ?? '-') ?></code></td>
                        <td><span class="badge rounded-pill text-bg-light border"><?= esc($g['badge'] ?? '-') ?></span></td>
                        <td><code class="small"><?= esc($g['link'] ?? '-') ?></code></td>
                        <td>
                            <a href="<?= base_url('admin/games/edit/' . $g['id']) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-pencil"></i></a>
                            <a href="<?= base_url('admin/games/delete/' . $g['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill" data-confirm="Hapus game <?= esc($g['name']) ?>?"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
