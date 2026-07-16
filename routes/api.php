<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController; // Tambahkan baris ini

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// INI ADALAH RUTE API KITA:
Route::get('/projects', [ProjectController::class, 'index']);

// Rute untuk mengambil data (GET)
Route::get('/projects', [ProjectController::class, 'index']);

// RUTE BARU: Rute untuk mengirim data baru (POST)
Route::post('/projects', [ProjectController::class, 'store']);

// RUTE BARU: Rute untuk menghapus data (DELETE) berdasarkan ID
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

// Rute untuk mengubah urutan layout
Route::post('/projects/reorder', [ProjectController::class, 'reorder']);