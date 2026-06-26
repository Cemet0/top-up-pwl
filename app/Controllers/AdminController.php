<?php

namespace App\Controllers;

use App\Models\GameModel;
use App\Models\ItemModel;
use App\Models\PaymentMethodModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    private function adminView(string $view, array $data = []): string
    {
        $data['title'] ??= 'Dashboard';
        $data['headerButton'] ??= null;
        return view('admin/' . $view, $data);
    }

    public function index()
    {
        $txModel = new TransactionModel();
        $transactions = $txModel->getTransactions();
        $totalOrders = count($transactions);

        $successOrders = 0;
        $pendingOrders = 0;
        $revenue = 0;
        foreach ($transactions as $t) {
            $s = $t['status'] ?? 'Proses';
            if ($s === 'Selesai') {
                $successOrders++;
                $revenue += (int)preg_replace('/[^0-9]/', '', $t['price']);
            } elseif ($s === 'Proses') {
                $pendingOrders++;
            }
        }

        $gameModel = new GameModel();
        $userModel = new UserModel();

        return $this->adminView('dashboard', [
            'title' => 'Dashboard',
            'totalOrders' => $totalOrders,
            'successOrders' => $successOrders,
            'pendingOrders' => $pendingOrders,
            'revenue' => $revenue,
            'totalGames' => count($gameModel->getAll()),
            'totalUsers' => count($userModel->getUsers()),
            'transactions' => $transactions,
        ]);
    }

    // ─── GAMES CRUD ────────────────────────────────────────

    public function games()
    {
        $model = new GameModel();
        return $this->adminView('games/index', [
            'title' => 'Daftar Game / Produk',
            'games' => $model->getAll(),
            'headerButton' => ['url' => base_url('admin/games/create'), 'icon' => 'bi-plus-lg', 'label' => 'Tambah Game'],
        ]);
    }

    public function gamesCreate()
    {
        return $this->adminView('games/form', [
            'title' => 'Tambah Game',
            'game' => null,
        ]);
    }

    public function gamesStore()
    {
        $model = new GameModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'provider' => $this->request->getPost('provider'),
            'img' => $this->request->getPost('img'),
            'link' => $this->request->getPost('link'),
            'badge' => $this->request->getPost('badge'),
        ]);

        session()->setFlashdata('success', 'Game berhasil ditambahkan.');
        return redirect()->to('admin/games');
    }

    public function gamesEdit(int $id)
    {
        $model = new GameModel();
        $game = $model->find($id);
        if (!$game) {
            session()->setFlashdata('error', 'Game tidak ditemukan.');
            return redirect()->to('admin/games');
        }
        return $this->adminView('games/form', [
            'title' => 'Edit Game',
            'game' => $game,
        ]);
    }

    public function gamesUpdate(int $id)
    {
        $model = new GameModel();
        $model->save([
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'provider' => $this->request->getPost('provider'),
            'img' => $this->request->getPost('img'),
            'link' => $this->request->getPost('link'),
            'badge' => $this->request->getPost('badge'),
        ]);

        session()->setFlashdata('success', 'Game berhasil diperbarui.');
        return redirect()->to('admin/games');
    }

    public function gamesDelete(int $id)
    {
        $model = new GameModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Game berhasil dihapus.');
        return redirect()->to('admin/games');
    }

    // ─── ITEMS CRUD ────────────────────────────────────────

    public function items()
    {
        $model = new ItemModel();
        $gameModel = new GameModel();
        $allItems = $model->getAll();
        $games = $gameModel->getAll();
        $gameMap = [];
        foreach ($games as $g) {
            $gameMap[$g['id']] = $g['name'];
        }

        $grouped = [];
        foreach ($allItems as $item) {
            $gid = (int)$item['game_id'];
            if (!isset($grouped[$gid])) {
                $grouped[$gid] = ['game_name' => $gameMap[$gid] ?? 'Unknown', 'items' => []];
            }
            $grouped[$gid]['items'][] = $item;
        }

        return $this->adminView('items/index', [
            'title' => 'Daftar Nominal',
            'grouped' => $grouped,
        ]);
    }

    public function itemsCreate(int $gameId)
    {
        $gameModel = new GameModel();
        $game = $gameModel->find($gameId);
        if (!$game) {
            session()->setFlashdata('error', 'Game tidak ditemukan.');
            return redirect()->to('admin/items');
        }
        return $this->adminView('items/form', [
            'title' => 'Tambah Nominal - ' . $game['name'],
            'item' => null,
            'game' => $game,
        ]);
    }

    public function itemsStore()
    {
        $model = new ItemModel();
        $model->save([
            'game_id' => (int)$this->request->getPost('game_id'),
            'title' => $this->request->getPost('title'),
            'price' => (float)$this->request->getPost('price'),
            'original_price' => $this->request->getPost('original_price') ? (float)$this->request->getPost('original_price') : null,
            'discount' => $this->request->getPost('discount') ?: null,
        ]);

        session()->setFlashdata('success', 'Nominal berhasil ditambahkan.');
        return redirect()->to('admin/items');
    }

    public function itemsEdit(int $id)
    {
        $model = new ItemModel();
        $item = $model->find($id);
        if (!$item) {
            session()->setFlashdata('error', 'Nominal tidak ditemukan.');
            return redirect()->to('admin/items');
        }
        $gameModel = new GameModel();
        $game = $gameModel->find((int)$item['game_id']);
        return $this->adminView('items/form', [
            'title' => 'Edit Nominal',
            'item' => $item,
            'game' => $game,
        ]);
    }

    public function itemsUpdate(int $id)
    {
        $model = new ItemModel();
        $data = [
            'id' => $id,
            'game_id' => (int)$this->request->getPost('game_id'),
            'title' => $this->request->getPost('title'),
            'price' => (float)$this->request->getPost('price'),
        ];
        $origPrice = $this->request->getPost('original_price');
        if ($origPrice !== '' && $origPrice !== null) {
            $data['original_price'] = (float)$origPrice;
        } else {
            $data['original_price'] = null;
        }
        $data['discount'] = $this->request->getPost('discount') ?: null;

        $model->save($data);
        session()->setFlashdata('success', 'Nominal berhasil diperbarui.');
        return redirect()->to('admin/items');
    }

    public function itemsDelete(int $id)
    {
        $model = new ItemModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Nominal berhasil dihapus.');
        return redirect()->to('admin/items');
    }

    // ─── PAYMENT METHODS CRUD ──────────────────────────────

    public function payments()
    {
        $model = new PaymentMethodModel();
        return $this->adminView('payments/index', [
            'title' => 'Metode Pembayaran',
            'payments' => $model->getAll(),
            'headerButton' => ['url' => base_url('admin/payments/create'), 'icon' => 'bi-plus-lg', 'label' => 'Tambah Metode'],
        ]);
    }

    public function paymentsCreate()
    {
        return $this->adminView('payments/form', [
            'title' => 'Tambah Metode Pembayaran',
            'payment' => null,
        ]);
    }

    public function paymentsStore()
    {
        $model = new PaymentMethodModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'code' => $this->request->getPost('code'),
            'fee' => (float)($this->request->getPost('fee') ?: 0),
        ]);

        session()->setFlashdata('success', 'Metode pembayaran berhasil ditambahkan.');
        return redirect()->to('admin/payments');
    }

    public function paymentsEdit(int $id)
    {
        $model = new PaymentMethodModel();
        $payment = $model->find($id);
        if (!$payment) {
            session()->setFlashdata('error', 'Metode pembayaran tidak ditemukan.');
            return redirect()->to('admin/payments');
        }
        return $this->adminView('payments/form', [
            'title' => 'Edit Metode Pembayaran',
            'payment' => $payment,
        ]);
    }

    public function paymentsUpdate(int $id)
    {
        $model = new PaymentMethodModel();
        $model->save([
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'code' => $this->request->getPost('code'),
            'fee' => (float)($this->request->getPost('fee') ?: 0),
        ]);

        session()->setFlashdata('success', 'Metode pembayaran berhasil diperbarui.');
        return redirect()->to('admin/payments');
    }

    public function paymentsDelete(int $id)
    {
        $model = new PaymentMethodModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Metode pembayaran berhasil dihapus.');
        return redirect()->to('admin/payments');
    }

    // ─── TRANSACTIONS ──────────────────────────────────────

    public function transactions()
    {
        $model = new TransactionModel();
        $tx = $model->getTransactions();
        usort($tx, fn($a, $b) => strcmp($b['created_at'], $a['created_at']));

        return $this->adminView('transactions/index', [
            'title' => 'Semua Transaksi',
            'transactions' => $tx,
        ]);
    }

    public function transactionDetail(int $id)
    {
        $model = new TransactionModel();
        $txList = $model->getTransactions();
        $tx = null;
        foreach ($txList as $t) {
            if ((int)$t['id'] === $id) {
                $tx = $t;
                break;
            }
        }
        if (!$tx) {
            session()->setFlashdata('error', 'Transaksi tidak ditemukan.');
            return redirect()->to('admin/transactions');
        }
        return $this->adminView('transactions/detail', [
            'title' => 'Detail Transaksi',
            'tx' => $tx,
        ]);
    }

    public function transactionUpdateStatus(int $id)
    {
        $model = new TransactionModel();
        $newStatus = $this->request->getPost('status');
        if (!in_array($newStatus, ['Proses', 'Selesai', 'Batal'])) {
            session()->setFlashdata('error', 'Status tidak valid.');
            return redirect()->back();
        }
        $model->save(['id' => $id, 'status' => $newStatus]);
        session()->setFlashdata('success', 'Status transaksi berhasil diperbarui.');
        return redirect()->to('admin/transactions/detail/' . $id);
    }

    public function transactionDelete(int $id)
    {
        $model = new TransactionModel();
        $model->save(['id' => $id, 'deleted' => true]);
        // Since TransactionModel doesn't have a delete method, we filter it out
        $txs = $model->getTransactions();
        $txs = array_filter($txs, fn($t) => (int)$t['id'] !== $id);
        file_put_contents(WRITEPATH . 'transactions.json', json_encode(array_values($txs), JSON_PRETTY_PRINT));
        session()->setFlashdata('success', 'Transaksi berhasil dihapus.');
        return redirect()->to('admin/transactions');
    }

    // ─── USERS ─────────────────────────────────────────────

    public function users()
    {
        $model = new UserModel();
        return $this->adminView('users/index', [
            'title' => 'Daftar Pengguna',
            'users' => $model->getUsers(),
        ]);
    }

    public function userDelete(int $id)
    {
        if ((int)$id === (int)session()->get('id')) {
            session()->setFlashdata('error', 'Tidak dapat menghapus akun sendiri.');
            return redirect()->to('admin/users');
        }
        $model = new UserModel();
        $users = $model->getUsers();
        $users = array_filter($users, fn($u) => (int)$u['id'] !== $id);
        file_put_contents(WRITEPATH . 'users.json', json_encode(array_values($users), JSON_PRETTY_PRINT));
        session()->setFlashdata('success', 'Pengguna berhasil dihapus.');
        return redirect()->to('admin/users');
    }
}
