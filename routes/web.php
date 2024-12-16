<?php

declare(strict_types=1);

use App\Http\Controllers\Clients\CreateClient;
use App\Http\Controllers\Clients\DestroyClient;
use App\Http\Controllers\Clients\EditClient;
use App\Http\Controllers\Clients\IndexClient;
use App\Http\Controllers\Clients\SearchClient;
use App\Http\Controllers\Clients\StoreClient;
use App\Http\Controllers\Clients\UpdateClient;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // clients
    Route::get('clients', IndexClient::class)->name('clients.index');
    Route::get('clients/search', SearchClient::class)->name('clients.search');
    Route::get('clients/create', CreateClient::class)->name('clients.create');
    Route::post('clients', StoreClient::class)->name('clients.store');
    Route::get('clients/{client}/edit', EditClient::class)->name('clients.edit');
    Route::put('clients/{client}', UpdateClient::class)->name('clients.update');
    Route::delete('clients/{client}', DestroyClient::class)->name('clients.destroy');

    // invoices
    Route::get('invoices')->name('invoices.index');
});

require __DIR__.'/auth.php';
