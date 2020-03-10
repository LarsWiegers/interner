<?php

use App\Http\Controllers\InternshipController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [InternshipController::class, 'index'])->name('internship.index');
Route::get('/internships/states', [InternshipController::class, 'states'])->name('internship.states');
Route::get('/internships/add', [InternshipController::class, 'create'])->name('internship.create');
Route::put('/internships/{id}', [InternshipController::class, 'update'])->name('internship.update');
Route::post('/internships', [InternshipController::class, 'store'])->name('internship.store');

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::get('/internships/{internship}', [InternshipController::class, 'show'])->name('internship.show');
