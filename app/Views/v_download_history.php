<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi - <?= esc($username) ?></title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <h2>Riwayat Transaksi Top Up</h2>
    <p><strong>Username:</strong> <?= esc($username) ?></p>
    <p><strong>Dicetak pada:</strong> <?= date('d M Y, H:i') ?></p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Transaksi</th>
                <th>Game / Nominal</th>
                <th>Metode</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($transactions)): ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada riwayat transaksi.</td>
                </tr>
            <?php else: ?>
                <?php foreach($transactions as $index => $t): ?>
                    <tr>
                        <td class="text-center"><?= $index + 1 ?></td>
                        <td><?= esc($t['transaction_code']) ?></td>
                        <td>
                            <?= esc($t['game_name']) ?><br>
                            <small><?= esc($t['nominal']) ?></small>
                        </td>
                        <td><?= esc($t['payment_method']) ?></td>
                        <td class="text-right"><?= esc($t['price']) ?></td>
                        <td><?= esc($t['status'] ?? 'Proses') ?></td>
                        <td><?= date('d M Y, H:i', strtotime($t['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
