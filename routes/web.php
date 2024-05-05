<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/cart', 'cart');
Route::view('/product', 'product');
Route::view('/login', 'login');
    



Route::get('/contact', [ContactController::class, 'showContactForm']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/contact/delete-cookies', [ContactController::class, 'deleteCookies'])->name('contact.deleteCookies');
Route::get('/contactlist', [ContactController::class, 'showContactList']);
