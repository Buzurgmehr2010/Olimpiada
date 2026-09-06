<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::setValue('background_color', '#f5f7fa');
        Setting::setValue('background_gradient', '#e4edf5');
        Setting::setValue('primary_color', '#4361ee');
        Setting::setValue('theme', 'light');
    }
}
