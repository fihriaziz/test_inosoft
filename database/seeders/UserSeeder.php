<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Fihri Aziz',
            'email' => 'fihriaziz@gmail.com',
            'password' => bcrypt('password')
        ]);
        return $user;
    }
}
