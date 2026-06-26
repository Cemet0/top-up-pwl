<?php

namespace App\Models;

class PaymentMethodModel
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'payment_methods.json';
        if (!file_exists($this->filePath)) {
            $dir = dirname($this->filePath);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $default = [
                ['id' => 1, 'name' => 'QRIS', 'code' => 'QRIS', 'fee' => 0, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 2, 'name' => 'DANA', 'code' => 'DANA', 'fee' => 1000, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 3, 'name' => 'ShopeePay', 'code' => 'SHOPEEPAY', 'fee' => 1000, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 4, 'name' => 'GoPay', 'code' => 'GOPAY', 'fee' => 1000, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 5, 'name' => 'OVO', 'code' => 'OVO', 'fee' => 1000, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 6, 'name' => 'BCA Virtual Account', 'code' => 'BCA', 'fee' => 2500, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 7, 'name' => 'Mandiri Virtual Account', 'code' => 'MANDIRI', 'fee' => 2500, 'created_at' => date('Y-m-d H:i:s')],
            ];
            file_put_contents($this->filePath, json_encode($default, JSON_PRETTY_PRINT));
        }
    }

    public function getAll(): array
    {
        if (!file_exists($this->filePath)) return [];
        return json_decode(file_get_contents($this->filePath), true) ?? [];
    }

    public function find(int $id): ?array
    {
        foreach ($this->getAll() as $p) {
            if ((int)$p['id'] === $id) return $p;
        }
        return null;
    }

    public function findByCode(string $code): ?array
    {
        foreach ($this->getAll() as $p) {
            if (strcasecmp($p['code'], $code) === 0) return $p;
        }
        return null;
    }

    public function save(array $data): int
    {
        $methods = $this->getAll();
        if (isset($data['id'])) {
            foreach ($methods as &$m) {
                if ((int)$m['id'] === (int)$data['id']) {
                    $m = array_merge($m, $data);
                    break;
                }
            }
            $id = (int)$data['id'];
        } else {
            $id = count($methods) > 0 ? max(array_column($methods, 'id')) + 1 : 1;
            $data['id'] = $id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $methods[] = $data;
        }
        file_put_contents($this->filePath, json_encode($methods, JSON_PRETTY_PRINT));
        return $id;
    }

    public function delete(int $id): void
    {
        $methods = array_filter($this->getAll(), fn($m) => (int)$m['id'] !== $id);
        file_put_contents($this->filePath, json_encode(array_values($methods), JSON_PRETTY_PRINT));
    }
}
