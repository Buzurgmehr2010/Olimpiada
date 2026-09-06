<?php

namespace App\Http\Controllers;

use App\Models\Olympiad;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $olympiads = Olympiad::latest()->get();

        $stats = [
            ['number' => $olympiads->count() . '+', 'label' => 'Олимпиад по всему миру'],
            ['number' => $olympiads->pluck('country')->unique()->count() . '+', 'label' => 'Стран в базе данных'],
            ['number' => '100K+', 'label' => 'Участников ежегодно'],
            ['number' => '98%', 'label' => 'Удовлетворенность пользователей'],
        ];

        $settings = [
            'background_color' => Setting::getValue('background_color', '#f5f7fa'),
            'background_gradient' => Setting::getValue('background_gradient', '#e4edf5'),
            'primary_color' => Setting::getValue('primary_color', '#4361ee'),
            'theme' => Setting::getValue('theme', 'light'),
        ];

        return view('home', compact('olympiads', 'stats', 'settings'));
    }
}
