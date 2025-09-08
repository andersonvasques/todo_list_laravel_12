<?php

use App\Http\Controllers\Admin\TarefaController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/contato', [SiteController::class, 'contact'])->name('contact');
Route::get('/index', [TarefaController::class, 'index'])->name('index');
Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
