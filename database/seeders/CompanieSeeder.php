<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Companie;

class CompanieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Companie::create(['company_name' => 'Coca-Cola']);
        Companie::create(['company_name' => 'サントリー']);
        Companie::create(['company_name' => 'キリン']);
        Companie::create(['company_name' => 'アサヒビール']);
    }
}
