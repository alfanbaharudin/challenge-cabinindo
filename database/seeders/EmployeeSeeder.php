<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Alfan',
            'telp' => '081234567891',
            'address' => 'Jalan Kencana Raya No. 12, Dawung Koneng, Cimacan, Kab. MaungAnom',
            'position' => 'IT Developer',
        ]);
    }
}
