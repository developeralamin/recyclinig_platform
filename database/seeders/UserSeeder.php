<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = [
            [
                'name'        => 'User',
                'email'             => 'user@app.com',
                'password'          => Hash::make('12345678'),
                'role'              => 'user',
                'is_active'         => 1,
                'phone'             => '+880 1301055093',
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
            [
                'name'              => 'admin',
                'email'             => 'admin@app.com',
                'password'          => Hash::make('12345678'),
                'role'              => 'admin',
                'is_active'         => 1,
                'phone'             => '+880 1391055093',
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
