<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PendaftaranController;

// Main Portal Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// UAS Sub-system
Route::prefix('uas')->group(function () {
    // Shop (Front-end)
    Route::get('/', [BarangController::class, 'shop'])->name('uas.shop');
    
    // Form Pemesanan
    Route::get('/pesan/{barang?}', [App\Http\Controllers\PesananController::class, 'create'])->name('uas.pesan.create');
    Route::post('/pesan', [App\Http\Controllers\PesananController::class, 'store'])->name('uas.pesan.store');
    // Pesanan Masuk (Admin)
    Route::get('/pesanan', [App\Http\Controllers\PesananController::class, 'index'])->name('uas.pesanan.index');

    // Admin dashboard
    Route::get('/admin', [BarangController::class, 'dashboard'])->name('uas.dashboard');

    // CRUD Barang
    Route::resource('barang', BarangController::class)->names([
        'index' => 'uas.barang.index',
        'create' => 'uas.barang.create',
        'store' => 'uas.barang.store',
        'show' => 'uas.barang.show',
        'edit' => 'uas.barang.edit',
        'update' => 'uas.barang.update',
        'destroy' => 'uas.barang.destroy',
    ]);

    // CRUD Pendaftaran
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('uas.pendaftaran.index');
    Route::get('/pendaftaran/{pendaftaran}/edit', [PendaftaranController::class, 'edit'])->name('uas.pendaftaran.edit');
    Route::put('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'update'])->name('uas.pendaftaran.update');
    Route::delete('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'destroy'])->name('uas.pendaftaran.destroy');

    // Form Pendaftaran (customer-facing, but part of UAS admin system)
    Route::get('/daftar', [PendaftaranController::class, 'create'])->name('uas.daftar.create');
    Route::post('/daftar', [PendaftaranController::class, 'store'])->name('uas.daftar.store');
});

// Helper route to seed database on Railway if needed
Route::get('/seed-database', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        return response('Database successfully migrated & seeded! <a href="/">Kembali ke Portal</a>');
    } catch (\Throwable $e) {
        return response('Error: ' . $e->getMessage(), 500);
    }
});

