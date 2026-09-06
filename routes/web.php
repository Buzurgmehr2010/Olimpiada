<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OlympiadController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\Olympiad;
use App\Models\User;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/olympiads', [PageController::class, 'search'])->name('olympiads.search');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'olympiads' => Olympiad::count(),
            'users' => User::count(),
            'countries' => Olympiad::distinct('country')->count('country'),
        ];
        $recentOlympiads = Olympiad::latest()->take(5)->get();

        $countriesData = Olympiad::selectRaw('country, count(*) as count')
            ->groupBy('country')
            ->pluck('count', 'country')
            ->toArray();

        $levelsData = Olympiad::selectRaw('level, count(*) as count')
            ->groupBy('level')
            ->pluck('count', 'level')
            ->toArray();

        return view('dashboard', compact('stats', 'recentOlympiads', 'countriesData', 'levelsData'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/toggle-theme', [SettingController::class, 'toggleTheme'])->name('toggle-theme');
});

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('olympiads', OlympiadController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
