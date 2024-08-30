<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pertemuan1Controller;

// Basic Routing
Route::get('/', function () {
    return view('layout.base');
});

// Group Routing
Route::prefix('/pertemuan1')->group(function () {
    // Named routing
    Route::match(['get', 'post'], '/genap-ganjil', [Pertemuan1Controller::class, 'genapGanjil'])->name('genap-ganjil');
    Route::get('/fibbonaci', [Pertemuan1Controller::class, 'fibonacci'])->name('fibonacci');
    Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
    Route::get('/param', fn() => view('pertemuan1.param'))->name('param');

    // Dynamic routing
    Route::get('/param/{param1}', [Pertemuan1Controller::class, 'param1'])->name('param1');
    Route::get('/param/{param1}/{param2}', [Pertemuan1Controller::class, 'param2'])->name('param2');

    // Redirect routing
    Route::redirect('/redirect', '/pertemuan1/genap-ganjil', 301);

    // Basic routing
    Route::get('/basic', function () {
        return view('pertemuan1.basic');
    })->name('basic');

    // access into fallback page
    Route::get('/fallback', function () {
        return view('pertemuan1.fallback');
    })->name('fallback');

    Route::prefix("/testing-group")->group(function () {
        Route::get('/group-page', function () {
            return view('pertemuan1.testing-group.group-page');
        })->name('group-page');
    });
});
Route::get('/named', function () {
    return view('named');
})->name('different-named');

Route::get('/named/{namedParam}', [Pertemuan1Controller::class, 'namedParam'])->name('namedParam');

Route::get('/basic', function () {
    return view('pertemuan1.basic');
});

// Fallback routing
Route::fallback(function () {
    return response()->view('fallback', ['message' => 'Halaman yang Anda cari tidak ditemukan.'], 404);
});
