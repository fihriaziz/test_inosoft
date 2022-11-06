<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'name' => 'Avanza Silver',
            'year' => '2000',
            'color' => 'Silver',
            'price' => 260000000,
            'car' => [
                'machine' => '1500 CC',
                'type' => 'MPV'
            ],
            'stock' => 20,
        ]);
        Vehicle::create([
            'name' => 'Hondra Brio',
            'year' => '2020',
            'color' => 'Putih',
            'price' => 10000000,
            'car' => [
                'machine' => '1200 CC',
                'type' => 'MPV'
            ],
            'stock' => 15,
        ]);
        Vehicle::create([
            'name' => 'Xenia',
            'year' => '2015',
            'color' => 'Merah',
            'price' => 210000000,
            'car' => [
                'machine' => '1800 CC',
                'type' => 'MPV'
            ],
            'stock' => 10,
        ]);
        Vehicle::create([
            'name' => 'Honda',
            'year' => '2015',
            'color' => 'Hitam',
            'price' => 160000000,
            'car' => [
                'machine' => '150 CC',
                'type' => 'MPV'
            ],
            'stock' => 7,
        ]);
        Vehicle::create([
            'name' => 'Scopio',
            'year' => '2020',
            'color' => 'Merah',
            'price' => 100000000,
            'car' => [
                'machine' => '120 CC',
                'type' => 'MPV'
            ],
            'stock' => 2,
        ]);
    }
}
