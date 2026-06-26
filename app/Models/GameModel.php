<?php

namespace App\Models;

class GameModel
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'games.json';
        if (!file_exists($this->filePath)) {
            $dir = dirname($this->filePath);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $default = [
                [
                    'id' => 1,
                    'name' => 'Mobile Legends',
                    'provider' => 'Moonton',
                    'img' => 'iconMl.png',
                    'link' => 'detail-mlbb',
                    'badge' => 'Populer',
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 2,
                    'name' => 'Magic Chess Go Go',
                    'provider' => 'Moonton',
                    'img' => 'iconMcgg.png',
                    'link' => 'detail-mcgg',
                    'badge' => 'Cepat',
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 3,
                    'name' => 'Valorant',
                    'provider' => 'Riot Games',
                    'img' => 'icon valo.jpg',
                    'link' => 'detail-valorant',
                    'badge' => 'Recommended',
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 4,
                    'name' => 'Free Fire',
                    'provider' => 'Garena',
                    'img' => 'iconff.jpg',
                    'link' => 'detail-ff',
                    'badge' => 'Best Seller',
                    'created_at' => date('Y-m-d H:i:s')
                ],
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
        foreach ($this->getAll() as $g) {
            if ((int)$g['id'] === $id) return $g;
        }
        return null;
    }

    public function save(array $data): int
    {
        $games = $this->getAll();
        if (isset($data['id'])) {
            foreach ($games as &$g) {
                if ((int)$g['id'] === (int)$data['id']) {
                    $g = array_merge($g, $data);
                    break;
                }
            }
            $id = (int)$data['id'];
        } else {
            $id = count($games) > 0 ? max(array_column($games, 'id')) + 1 : 1;
            $data['id'] = $id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $games[] = $data;
        }
        file_put_contents($this->filePath, json_encode($games, JSON_PRETTY_PRINT));
        return $id;
    }

    public function delete(int $id): void
    {
        $games = array_filter($this->getAll(), fn($g) => (int)$g['id'] !== $id);
        file_put_contents($this->filePath, json_encode(array_values($games), JSON_PRETTY_PRINT));
    }
}
