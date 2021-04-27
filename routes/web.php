<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Models\User;
use App\Http\Livewire\Members;
use App\Http\Livewire\Details;
use App\Http\Livewire\DetailsLivewire;

// use App\Models\Member;


Route::get('/', [PagesController::class, 'home']);

Route::get('/about', [PagesController::class, 'about']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');




//ROUTE AUTENTIFIKASI

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/member', Members::class)->name('member');

    Route::get('/details', Details::class)->name('details');

    Route::get('/member/{id}', DetailsLivewire::class)->name('show');



    // Route::get('/members/{id}', DetailsLivewire::class, 'show');

    // Route::get(uri: 'members/{id}', action: \App\Http\Livewire\DetailsLivewire::class);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/member/{id}', [App\Http\Livewire\DetailsLivewire::class, 'render'])->name('show');

//END-AUTH

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
//     Route::get('/member', [Members::class, 'member']);
// })->name('dashboard');



// // Route::get('/members/{row}', DetailsLivewire::class, 'show');

// Route::get('/member', [Members::class, 'member']);

// Route::get('/members/{row}', [DetailsLivewire::class, 'show']);