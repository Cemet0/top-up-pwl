<?php

namespace App\Models;

class TransactionModel
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'transactions.json';
        
        // Auto-initialize directories and default mock transactions if file doesn't exist
        if (!file_exists($this->filePath)) {
            $dir = dirname($this->filePath);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            
            $defaultTransactions = [
                [
                    'id' => 1,
                    'user_id' => 2, // Associated with client (id = 2)
                    'transaction_code' => 'DANTE-882910',
                    'game_name' => 'Mobile Legends',
                    'nominal' => '86 Diamonds',
                    'price' => 'Rp 20.000',
                    'payment_method' => 'QRIS',
                    'user_game_id' => '12345678',
                    'zone_game_id' => '2001',
                    'status' => 'Selesai',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
                ],
                [
                    'id' => 2,
                    'user_id' => 2,
                    'transaction_code' => 'DANTE-192837',
                    'game_name' => 'Mobile Legends',
                    'nominal' => '172 Diamonds',
                    'price' => 'Rp 40.000',
                    'payment_method' => 'DANA',
                    'user_game_id' => '12345678',
                    'zone_game_id' => '2001',
                    'status' => 'Proses',
                    'created_at' => date('Y-m-d H:i:s')
                ]
            ];
            
            file_put_contents($this->filePath, json_encode($defaultTransactions, JSON_PRETTY_PRINT));
        }
    }

    /**
     * Retrieve all transactions
     */
    public function getTransactions(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = file_get_contents($this->filePath);
        return json_decode($data, true) ?? [];
    }

    /**
     * Retrieve transactions associated with a specific user ID
     */
    public function getByUserId(int $userId): array
    {
        $transactions = $this->getTransactions();
        $userTransactions = [];
        foreach ($transactions as $t) {
            if (isset($t['user_id']) && (int)$t['user_id'] === $userId) {
                $userTransactions[] = $t;
            }
        }
        
        // Sort transactions by date (newest first)
        usort($userTransactions, function ($a, $b) {
            return strcmp($b['created_at'], $a['created_at']);
        });
        
        return $userTransactions;
    }

    /**
     * Save a transaction (either insert or update)
     */
    public function save(array $data): int
    {
        $transactions = $this->getTransactions();
        
        if (isset($data['id'])) {
            // Update existing transaction
            foreach ($transactions as &$t) {
                if ($t['id'] == $data['id']) {
                    $t = array_merge($t, $data);
                    break;
                }
            }
            $transactionId = (int)$data['id'];
        } else {
            // Create new transaction
            $newId = count($transactions) > 0 ? max(array_column($transactions, 'id')) + 1 : 1;
            $data['id'] = $newId;
            $data['status'] = $data['status'] ?? 'Proses';
            $data['created_at'] = date('Y-m-d H:i:s');
            $transactions[] = $data;
            $transactionId = $newId;
        }
        
        file_put_contents($this->filePath, json_encode($transactions, JSON_PRETTY_PRINT));
        return $transactionId;
    }
}
