<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Setting;

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

Route::get('/', function () {
    $experiences = Experience::orderBy('sort_order')->get();
    $skills = Skill::orderBy('sort_order')->get()->groupBy('category');
    $projects = Project::where('status', 'published')->orderBy('sort_order')->get();

    // Build settings as key-value
    $settingsRaw = Setting::all()->pluck('value', 'key');
    $settings = $settingsRaw->toArray();

    return view('welcome', compact('experiences', 'skills', 'projects', 'settings'));
});

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/projects', [DashboardController::class, 'projects'])->name('admin.projects');
    Route::get('/skills', [DashboardController::class, 'skills'])->name('admin.skills');
    Route::get('/experiences', [DashboardController::class, 'experiences'])->name('admin.experiences');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('admin.settings');
});
