<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'background_color' => Setting::getValue('background_color', '#f5f7fa'),
            'background_gradient' => Setting::getValue('background_gradient', '#e4edf5'),
            'primary_color' => Setting::getValue('primary_color', '#4361ee'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'background_color' => 'required|string|max:7',
            'background_gradient' => 'required|string|max:7',
            'primary_color' => 'required|string|max:7',
        ]);

        foreach ($validated as $key => $value) {
            Setting::setValue($key, $value);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Настройки успешно обновлены');
    }

    public function toggleTheme()
    {
        $current = Setting::getValue('theme', 'light');
        $new = $current === 'dark' ? 'light' : 'dark';
        Setting::setValue('theme', $new);

        return redirect()->back();
    }
}
