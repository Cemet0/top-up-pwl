<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InitialSeeder extends Seeder
{
    public function run()
    {
        $now = Time::now()->toDateTimeString();

        // Seed Games
        $games = [
            [
                'name'       => 'Mobile Legends',
                'provider'   => 'Moonton',
                'img'        => 'iconMl.png',
                'link'       => 'detail-mlbb',
                'badge'      => 'Populer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Magic Chess Go Go',
                'provider'   => 'Moonton',
                'img'        => 'iconMcgg.png',
                'link'       => 'detail-mcgg',
                'badge'      => 'Cepat',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Valorant',
                'provider'   => 'Riot Games',
                'img'        => 'icon valo.jpg',
                'link'       => 'detail-valorant',
                'badge'      => 'Recommended',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Free Fire',
                'provider'   => 'Garena',
                'img'        => 'iconff.jpg',
                'link'       => 'detail-ff',
                'badge'      => 'Best Seller',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        $this->db->table('games')->insertBatch($games);

        // Optional: Seed Payment Methods
        $paymentMethods = [
            ['name' => 'BCA Virtual Account', 'code' => 'BCA_VA', 'fee' => 4000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'GoPay', 'code' => 'GOPAY', 'fee' => 1000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'OVO', 'code' => 'OVO', 'fee' => 1000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dana', 'code' => 'DANA', 'fee' => 1000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'QRIS', 'code' => 'QRIS', 'fee' => 750, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('payment_methods')->insertBatch($paymentMethods);
    }
}
