<?php

use App\Http\Controllers\categorieController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Mail\Mailinvetation;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', [ColocationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/',function(){
    return view('lendingpage');
});
Route::get('colocation/create',[ColocationController::class,'create'])->name('createcolocation');
Route::get('colocation/index',[ColocationController::class,'index'])->name('colocation.index');
Route::post('colocation/store',[ColocationController::class,'store'])->name('storecolocation');
Route::post('colocation/destroy/{id}',[ColocationController::class,'destroy'])->name('colocation.destroy');




// Route::get('categorie/index',[categorieController::class,'index'])->name('categorie.index');
Route::post('categorie/store',[categorieController::class,'store'])->name('categorie.store');
Route::post('categorie/delete/{id}',[categorieController::class,'destroy'])->name('categorie.destroy');
Route::get('expense.create',[ExpenseController::class,'create'])->name('expense.create');
Route::post('expense.store',[ExpenseController::class,'store'])->name('expense.store');

// Route::get('categorie.create',[categorieController::class,'index'])->name('categorie.index');
Route::get('Macolocation',[ColocationController::class,'Macolocation']);
Route::get('/MaColocation',[ColocationController::class,'Macolocation'])->name('MaColocation');
Route::post('/invetationcreate',[Mailinvetation::class,]);