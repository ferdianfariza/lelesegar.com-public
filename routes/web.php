<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Models\Page;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pesan', [OrderController::class, 'create'])->name('order.create');
Route::post('/pesan', [OrderController::class, 'store'])->name('order.store');

Route::get('/terima-kasih/{id}', [OrderController::class, 'thanks'])->name('order.thanks');



Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');

Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->firstOrFail();
    return view('page', compact('page'));
})->whereIn('slug', ['tentang', 'panduan']);

Route::get('/', function () {
    return view('home');
});
