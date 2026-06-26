<?= $this->extend('admin/layout') ?>
<?= $this->section('admin_content') ?>
<div class="card p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada pengguna.</td></tr>
                <?php else: ?>
                    <?php foreach ($users as $i => $u): ?>
                    <tr>
                        <td class="text-muted"><?= $i + 1 ?></td>
                        <td class="fw-semibold"><?= esc($u['username']) ?></td>
                        <td><?= esc($u['email'] ?? '-') ?></td>
                        <td>
                            <?php if (($u['role'] ?? '') === 'Administrator'): ?>
                                <span class="badge rounded-pill text-bg-primary">Administrator</span>
                            <?php else: ?>
                                <span class="badge rounded-pill text-bg-secondary">Client</span>
                            <?php endif; ?>
                        </td>
                        <td class="small text-muted"><?= isset($u['created_at']) ? date('d M Y', strtotime($u['created_at'])) : '-' ?></td>
                        <td>
                            <?php if ((int)$u['id'] !== (int)session()->get('id')): ?>
                                <a href="<?= base_url('admin/users/delete/' . $u['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill" data-confirm="Hapus pengguna <?= esc($u['username']) ?>?"><i class="bi bi-trash"></i></a>
                            <?php else: ?>
                                <span class="text-muted small">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
