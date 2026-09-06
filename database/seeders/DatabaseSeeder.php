<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Regular users
        User::factory()->create([
            'name' => 'Алишер Назаров',
            'email' => 'alisher@example.com',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Фируза Каримова',
            'email' => 'firuza@example.com',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Бахром Рустамов',
            'email' => 'bahrom@example.com',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Нилуфар Абдуллаева',
            'email' => 'nilufar@example.com',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Далер Мирзоев',
            'email' => 'daler@example.com',
            'role' => 'user',
        ]);

        // Seed olympiads and settings
        $this->call([
            OlympiadSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
