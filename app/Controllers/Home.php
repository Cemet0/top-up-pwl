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
        return $this->page('home');
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
        return $this->page('produk');
    }

    public function keranjang(): string
    {
        return $this->page('keranjang');
    }

    public function detailMlbb(): string
    {
        return $this->page('detail_mlbb');
    }

    public function payment(): string
    {
        return $this->page('payment');
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') === 'Administrator') {
                return redirect()->to('dashboard');
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
            $session->set([
                'id'         => $user['id'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'email'      => $user['email'],
                'isLoggedIn' => true
            ]);
            $session->setFlashdata('success', 'Selamat datang kembali, ' . esc($user['username']) . '!');
            
            if ($user['role'] === 'Administrator') {
                return redirect()->to('dashboard');
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
        $zoneId = $this->request->getPost('zone_id');
        $nominalRaw = $this->request->getPost('nominal');
        $payment = $this->request->getPost('payment');

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

        $transactionData = [
            'transaction_code' => $txCode,
            'game_name' => 'Mobile Legends',
            'nominal' => $nominal,
            'price' => $price,
            'payment_method' => strtoupper($payment),
            'user_game_id' => $userId,
            'zone_game_id' => $zoneId,
            'status' => 'Proses'
        ];

        if ($session->get('isLoggedIn') && $session->get('role') === 'Client') {
            $transactionData['user_id'] = $session->get('id');
        }

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
