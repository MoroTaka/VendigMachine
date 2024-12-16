<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'company_id' => '1',
            'product_name' => 'コーラ',
            'price' => '180',
            'stock' => '10',
            'comment' => '炭酸水、500ml',
        ]);
    }
}
