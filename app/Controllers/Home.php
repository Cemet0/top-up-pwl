<?php

namespace App\Controllers;

use Dompdf\Dompdf;

class Home extends BaseController
{
    private function page(string $view): string
    {
        // Always use the v_ prefix for view files
        return view('v_' . $view);
    }

    public function index(): string
    {
        $gameModel = new \App\Models\GameModel();
        return view('v_home', ['games' => $gameModel->getAll()]);
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'Administrator') {
            $session->setFlashdata('error', 'Akses ditolak. Silakan login sebagai Administrator.');
            return redirect()->to('login');
        }

        $transactionModel = new \App\Models\TransactionModel();
        $transactions = $transactionModel->getTransactions();

        // Sort all transactions by date (newest first)
        usort($transactions, function ($a, $b) {
            return strcmp($b['created_at'], $a['created_at']);
        });

        return view('v_dashboard', [
            'transactions' => $transactions
        ]);
    }

    public function produk(): string
    {
        $gameModel = new \App\Models\GameModel();
        return view('v_produk', ['products' => $gameModel->getAll()]);
    }

    public function keranjang(): string
    {
        return $this->page('keranjang');
    }

    public function detailMlbb(): string
    {
        $itemModel = new \App\Models\ItemModel();
        $gameModel = new \App\Models\GameModel();
        $game = $gameModel->getAll()[0] ?? null;
        return view('v_detail_mlbb', [
            'items' => $game ? $itemModel->getByGameId((int)$game['id']) : [],
            'payments' => $this->getPaymentMethods(),
        ]);
    }

    public function detailValorant(): string
    {
        $itemModel = new \App\Models\ItemModel();
        $gameModel = new \App\Models\GameModel();
        $games = $gameModel->getAll();
        $game = $games[2] ?? null;
        return view('v_detail_valorant', [
            'items' => $game ? $itemModel->getByGameId((int)$game['id']) : [],
            'payments' => $this->getPaymentMethods(),
        ]);
    }

    public function detailFf(): string
    {
        $itemModel = new \App\Models\ItemModel();
        $gameModel = new \App\Models\GameModel();
        $games = $gameModel->getAll();
        $game = $games[3] ?? null;
        return view('v_detail_ff', [
            'items' => $game ? $itemModel->getByGameId((int)$game['id']) : [],
            'payments' => $this->getPaymentMethods(),
        ]);
    }

    public function detailMcgg(): string
    {
        $itemModel = new \App\Models\ItemModel();
        $gameModel = new \App\Models\GameModel();
        $games = $gameModel->getAll();
        $game = $games[1] ?? null;
        return view('v_detail_mcgg', [
            'items' => $game ? $itemModel->getByGameId((int)$game['id']) : [],
            'payments' => $this->getPaymentMethods(),
        ]);
    }

    public function getPaymentMethods(): array
    {
        $pmModel = new \App\Models\PaymentMethodModel();
        return $pmModel->getAll();
    }

    public function payment(): string
    {
        return $this->page('payment');
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') === 'Administrator') {
                return redirect()->to('admin/dashboard');
            } else {
                return redirect()->to('profile');
            }
        }
        return $this->page('login');
    }

    public function authenticate()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            $session->setFlashdata('error', 'Username dan password wajib diisi.');
            return redirect()->to('login');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $session->regenerate(); // Prevent session fixation
            $session->set([
                'id'         => $user['id'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'email'      => $user['email'],
                'isLoggedIn' => true
            ]);
            $session->setFlashdata('success', 'Selamat datang kembali, ' . esc($user['username']) . '!');
            
            if ($user['role'] === 'Administrator') {
                return redirect()->to('admin/dashboard');
            } else {
                return redirect()->to('profile');
            }
        } else {
            $session->setFlashdata('error', 'Username atau password salah.');
            return redirect()->to('login');
        }
    }

    public function register()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if (empty($username) || empty($email) || empty($password)) {
            $session->setFlashdata('error', 'Semua data registrasi wajib diisi.');
            $session->setFlashdata('active_tab', 'register');
            return redirect()->to('login');
        }

        if ($password !== $confirmPassword) {
            $session->setFlashdata('error', 'Konfirmasi password tidak cocok.');
            $session->setFlashdata('active_tab', 'register');
            return redirect()->to('login');
        }

        $userModel = new \App\Models\UserModel();
        if ($userModel->findByUsername($username)) {
            $session->setFlashdata('error', 'Username sudah digunakan.');
            $session->setFlashdata('active_tab', 'register');
            return redirect()->to('login');
        }

        $userModel->save([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'Client'
        ]);

        $session->setFlashdata('success', 'Pendaftaran berhasil! Silakan login.');
        $session->setFlashdata('active_tab', 'login');
        return redirect()->to('login');
    }

    public function checkout()
    {
        $session = session();
        $userId = $this->request->getPost('user_id');
        $zoneId = $this->request->getPost('zone_id'); // Untuk Valorant ini bisa berupa tagline
        $nominalRaw = $this->request->getPost('nominal');
        $payment = $this->request->getPost('payment');
        $gameName = $this->request->getPost('game_name') ?? 'Mobile Legends';

        if (empty($userId) || empty($zoneId) || empty($nominalRaw) || empty($payment)) {
            $session->setFlashdata('error', 'Lengkapi data akun, pilihan nominal, dan metode pembayaran.');
            return redirect()->back();
        }

        $parts = explode('|', $nominalRaw);
        if (count($parts) < 2) {
            $session->setFlashdata('error', 'Pilihan nominal tidak valid.');
            return redirect()->back();
        }
        $nominal = $parts[0];
        $price = $parts[1];

        $txCode = 'DANTE-' . strtoupper(substr(md5(uniqid()), 0, 6));
        $now = date('Y-m-d H:i:s');
        $expiresAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));

        $transactionData = [
            'transaction_code' => $txCode,
            'game_name' => $gameName,
            'nominal' => $nominal,
            'price' => $price,
            'payment_method' => strtoupper($payment),
            'user_game_id' => $userId,
            'zone_game_id' => $zoneId,
            'status' => 'Proses',
            'user_id' => ($session->get('isLoggedIn') && $session->get('role') === 'Client') ? (int)$session->get('id') : 0,
            'created_at' => $now,
            'expires_at' => $expiresAt,
        ];

        $transactionModel = new \App\Models\TransactionModel();
        $transactionModel->save($transactionData);

        $session->set('last_transaction', $transactionData);
        $session->setFlashdata('success', 'Pesanan berhasil dibuat! Silakan selesaikan pembayaran.');
        return redirect()->to('payment');
    }

    public function profile()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'Client') {
            $session->setFlashdata('error', 'Silakan login terlebih dahulu untuk mengakses profil.');
            return redirect()->to('login');
        }

        $transactionModel = new \App\Models\TransactionModel();
        $transactions = $transactionModel->getByUserId((int)$session->get('id'));

        return view('v_profile', [
            'transactions' => $transactions
        ]);
    }

    public function paymentComplete()
    {
        $session = session();
        $tx = $session->get('last_transaction');

        if (!$tx || empty($tx['transaction_code'])) {
            $session->setFlashdata('error', 'Tidak ada transaksi aktif.');
            return redirect()->to('payment');
        }

        $proof = $this->request->getFile('payment_proof');
        if (!$proof || !$proof->isValid()) {
            $session->setFlashdata('error', 'Upload bukti pembayaran terlebih dahulu.');
            return redirect()->to('payment');
        }

        if ($proof->getSize() > 2 * 1024 * 1024) {
            $session->setFlashdata('error', 'Ukuran file maksimal 2MB.');
            return redirect()->to('payment');
        }

        $mime = $proof->getMimeType();
        if (!in_array($mime, ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])) {
            $session->setFlashdata('error', 'Format file harus JPG, PNG, atau WebP.');
            return redirect()->to('payment');
        }

        $txCode = $tx['transaction_code'];
        $proofDir = WRITEPATH . 'uploads/bukti/';
        if (!is_dir($proofDir)) {
            mkdir($proofDir, 0777, true);
        }

        $proofName = $txCode . '_' . date('YmdHis') . '.' . $proof->getExtension();
        $proof->move($proofDir, $proofName);

        $transactionModel = new \App\Models\TransactionModel();
        $allTx = $transactionModel->getTransactions();

        $updated = false;
        foreach ($allTx as &$t) {
            if (isset($t['transaction_code']) && $t['transaction_code'] === $txCode) {
                $t['status'] = 'Selesai';
                $t['payment_proof'] = 'uploads/bukti/' . $proofName;
                $updated = true;
                break;
            }
        }

        if (!$updated) {
            $session->setFlashdata('error', 'Transaksi tidak ditemukan.');
            return redirect()->to('payment');
        }

        file_put_contents(WRITEPATH . 'transactions.json', json_encode(array_values($allTx), JSON_PRETTY_PRINT));

        $tx['status'] = 'Selesai';
        $tx['payment_proof'] = 'uploads/bukti/' . $proofName;
        $session->set('last_transaction', $tx);

        $html = view('v_download_history', [
            'transactions' => [$tx],
            'username' => $session->get('username') ?? 'Guest',
        ]);

        $filename = 'receipt-' . $txCode . '.pdf';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => true]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function downloadHistory()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'Client') {
            $session->setFlashdata('error', 'Silakan login terlebih dahulu untuk mengunduh profil.');
            return redirect()->to('login');
        }

        $transactionModel = new \App\Models\TransactionModel();
        $transactions = $transactionModel->getByUserId((int)$session->get('id'));

        $html = view('v_download_history', [
            'transactions' => $transactions,
            'username' => $session->get('username')
        ]);

        $filename = date('Y-m-d-H-i-s') . '-riwayat-transaksi.pdf';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($filename, [
            'Attachment' => true
        ]);
    }
}
