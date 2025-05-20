<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Livewire\TaskList;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::get('/tarefas/criar', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tarefas', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tarefas/kanban', [TaskController::class, 'kanban'])->name('tasks.kanban');
    Route::post('/tarefas/{task}/atualizar-status', [TaskController::class, 'updateStatus']);
});

Route::get('/tasks', TaskList::class);

require __DIR__ . '/auth.php';
