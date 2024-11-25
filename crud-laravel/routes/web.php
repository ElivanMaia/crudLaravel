<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FeedbackController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/usuarios', [UserController::class, 'listUsers'])->name('usuarios.index');
    
    Route::get('agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');
    Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');
    Route::get('/agendamentos/{id}', [AgendamentoController::class, 'show'])->name('agendamentos.show');
    Route::get('agendamentos/{id}/edit', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
    Route::put('agendamentos/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');
    Route::delete('agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
    Route::get('/servicos/create', [ServicoController::class, 'create'])->name('servicos.create');
    Route::post('/servicos', [ServicoController::class, 'store'])->name('servicos.store');
    Route::get('servicos/{id}/edit', [ServicoController::class, 'edit'])->name('servicos.edit');
    Route::put('servicos/{id}', [ServicoController::class, 'update'])->name('servicos.update');
    Route::delete('servicos/{id}', [ServicoController::class, 'destroy'])->name('servicos.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
    Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
    Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::get('feedbacks/{id}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
    Route::put('feedbacks/{id}', [FeedbackController::class, 'update'])->name('feedbacks.update');
    Route::delete('feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
});



Route::middleware(['auth'])->get('/admin', [AdminController::class, 'index'])->name('admin');



require __DIR__ . '/auth.php';
