<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Smartphone',
                'description' => 'Kategori untuk ponsel pintar dan perangkat mobile.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Laptop',
                'description' => 'Kategori untuk berbagai jenis laptop dan notebook.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Televisi',
                'description' => 'Kategori TV LED, Smart TV, dan sejenisnya.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Kamera',
                'description' => 'Kategori kamera digital, DSLR, dan mirrorless.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Aksesoris Elektronik',
                'description' => 'Berisi kabel, charger, earphone, dan aksesoris lainnya.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('product_category')->insertBatch($data);
    }
}