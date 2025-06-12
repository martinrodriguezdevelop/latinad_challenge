<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(config('app.env') != 'local'){
            return;
        }

        User::create([
            'name' => 'User 1',
            'email' => 'user1@latinad.vm',
            'password' => bcrypt('1234'),
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@latinad.vm',
            'password' => bcrypt('1234'),
        ]);
    }
}
