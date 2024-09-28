<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::where('email', 'admin@example.com')->first();

        if ($user) {
            $user->update([
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]);
        } else {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
        }

        $user = User::where('email', 'user@example.com')->first();

        if ($user) {
            $user->update([
                'name' => 'User',
                'password' => Hash::make('password'),
            ]);
        } else {
            User::create([
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
