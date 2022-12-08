<?php

use App\Http\Controllers\Api\DomainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('domains', [DomainController::class, 'index'])->name('domain.index');
Route::get('domains/create', [DomainController::class, 'create'])->name('domain.create');
Route::post('domains', [DomainController::class, 'store'])->name('domain.store');
Route::get('domains/{domain}/edit', [DomainController::class, 'edit'])->name('domain.edit');
Route::put('domains/{domain}', [DomainController::class, 'update'])->name('domain.update');
Route::delete('domains/{domain}', [DomainController::class, 'destroy'])->name('domain.destroy');
