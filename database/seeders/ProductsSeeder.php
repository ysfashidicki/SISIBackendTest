<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Joystick',
            'code' => 'Stuff-001',
        ]);

        /**$stuff = [
            [
                'name' => 'Radio',
                'code' => 'Stuff-001',
            ],
            [
                'name' => 'Kipas Angin',
                'code' => 'Stuff-002',
            ],
            [
                'name' => 'Speaker',
                'code' => 'Stuff-003',
            ],
            [
                'name' => 'Microwave',
                'code' => 'Stuff-004',
            ],
            [
                'name' => 'Rice Cooker',
                'code' => 'Stuff-005',
            ],
        ];
        \DB::table('products')->insert($stuff);
    **/
    }
}