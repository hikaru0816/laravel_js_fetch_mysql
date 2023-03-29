<?php

use App\Http\Controllers\AjaxTestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AjaxTestController::class, 'index'])->name('index');
Route::get('show_all', [AjaxTestController::class, 'showAll'])->name('showAll');
Route::post('show', [AjaxTestController::class, 'show'])->name('show');
Route::post('add', [AjaxTestController::class, 'add'])->name('add');
Route::post('del', [AjaxTestController::class, 'del'])->name('del');
