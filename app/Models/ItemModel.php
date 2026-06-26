<?php

namespace App\Models;

class ItemModel
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'items.json';
        if (!file_exists($this->filePath)) {
            $dir = dirname($this->filePath);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $default = [
                ['id' => 1, 'game_id' => 1, 'title' => '5 Diamonds', 'price' => 2000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 2, 'game_id' => 1, 'title' => '86 Diamonds', 'price' => 20000, 'original_price' => 25000, 'discount' => '20%', 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 3, 'game_id' => 1, 'title' => '172 Diamonds', 'price' => 40000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 4, 'game_id' => 1, 'title' => '257 Diamonds', 'price' => 58000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 5, 'game_id' => 1, 'title' => '344 Diamonds', 'price' => 75000, 'original_price' => 90000, 'discount' => '17%', 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 6, 'game_id' => 1, 'title' => '429 Diamonds', 'price' => 92000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 7, 'game_id' => 1, 'title' => '514 Diamonds', 'price' => 109000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 8, 'game_id' => 1, 'title' => '600 Diamonds', 'price' => 125000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 9, 'game_id' => 1, 'title' => '706 Diamonds', 'price' => 145000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 10, 'game_id' => 1, 'title' => '875 Diamonds', 'price' => 175000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 11, 'game_id' => 1, 'title' => '963 Diamonds', 'price' => 195000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 12, 'game_id' => 1, 'title' => '2000 Diamonds', 'price' => 380000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 13, 'game_id' => 2, 'title' => '5 Magic Dust', 'price' => 2000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 14, 'game_id' => 2, 'title' => '60 Magic Dust', 'price' => 15000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 15, 'game_id' => 2, 'title' => '120 Magic Dust', 'price' => 28000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 16, 'game_id' => 2, 'title' => '200 Magic Dust', 'price' => 45000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 17, 'game_id' => 2, 'title' => '280 Magic Dust', 'price' => 60000, 'original_price' => 75000, 'discount' => '20%', 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 18, 'game_id' => 2, 'title' => '344 Magic Dust', 'price' => 72000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 19, 'game_id' => 3, 'title' => '125 Points', 'price' => 25000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 20, 'game_id' => 3, 'title' => '420 Points', 'price' => 75000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 21, 'game_id' => 3, 'title' => '700 Points', 'price' => 120000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 22, 'game_id' => 3, 'title' => '1375 Points', 'price' => 225000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 23, 'game_id' => 3, 'title' => '2400 Points', 'price' => 385000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 24, 'game_id' => 3, 'title' => '5350 Points', 'price' => 825000, 'original_price' => 950000, 'discount' => '13%', 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 25, 'game_id' => 3, 'title' => '8150 Points', 'price' => 1225000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 26, 'game_id' => 4, 'title' => '5 Diamonds', 'price' => 1000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 27, 'game_id' => 4, 'title' => '70 Diamonds', 'price' => 8000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 28, 'game_id' => 4, 'title' => '100 Diamonds', 'price' => 12000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 29, 'game_id' => 4, 'title' => '140 Diamonds', 'price' => 16000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 30, 'game_id' => 4, 'title' => '355 Diamonds', 'price' => 37000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 31, 'game_id' => 4, 'title' => '500 Diamonds', 'price' => 51000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 32, 'game_id' => 4, 'title' => '720 Diamonds', 'price' => 73000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 33, 'game_id' => 4, 'title' => '1000 Diamonds', 'price' => 100000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 34, 'game_id' => 4, 'title' => '2000 Diamonds', 'price' => 200000, 'original_price' => 220000, 'discount' => '9%', 'created_at' => date('Y-m-d H:i:s')],
                ['id' => 35, 'game_id' => 4, 'title' => '7290 Diamonds', 'price' => 720000, 'original_price' => null, 'discount' => null, 'created_at' => date('Y-m-d H:i:s')],
            ];
            file_put_contents($this->filePath, json_encode($default, JSON_PRETTY_PRINT));
        }
    }

    public function getAll(): array
    {
        if (!file_exists($this->filePath)) return [];
        return json_decode(file_get_contents($this->filePath), true) ?? [];
    }

    public function getByGameId(int $gameId): array
    {
        $items = array_filter($this->getAll(), fn($i) => (int)$i['game_id'] === $gameId);
        usort($items, fn($a, $b) => $a['price'] <=> $b['price']);
        return $items;
    }

    public function find(int $id): ?array
    {
        foreach ($this->getAll() as $i) {
            if ((int)$i['id'] === $id) return $i;
        }
        return null;
    }

    public function save(array $data): int
    {
        $items = $this->getAll();
        if (isset($data['id'])) {
            foreach ($items as &$i) {
                if ((int)$i['id'] === (int)$data['id']) {
                    $i = array_merge($i, $data);
                    break;
                }
            }
            $id = (int)$data['id'];
        } else {
            $id = count($items) > 0 ? max(array_column($items, 'id')) + 1 : 1;
            $data['id'] = $id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $items[] = $data;
        }
        file_put_contents($this->filePath, json_encode(array_values($items), JSON_PRETTY_PRINT));
        return $id;
    }

    public function delete(int $id): void
    {
        $items = array_filter($this->getAll(), fn($i) => (int)$i['id'] !== $id);
        file_put_contents($this->filePath, json_encode(array_values($items), JSON_PRETTY_PRINT));
    }
}
