<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'yoga99se@gmail.com'],
            [
                'name' => 'Yoga Aris Purwanto',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]
        );
    }
}
