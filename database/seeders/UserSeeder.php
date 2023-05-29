<?php

namespace Database\Seeders;

use App\Models\User;
use App\Objects\ValuesObject\UserValues;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Global STD',
            'email' => 'admin@globalstd.com.mx',
            'password' => Hash::make(UserValues::PERSONAL_TOKEN_NAME)
        ]);
    }
}
