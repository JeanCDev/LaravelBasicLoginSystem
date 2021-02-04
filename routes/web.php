<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Main;

Route::get('/', [Main::class, 'index'])->name('index');
Route::get('/home', [Main::class, 'home'])->name('home');
Route::get('/login', [Main::class, 'login'])->name('login');
Route::post('/login-submit', [Main::class, 'loginSubmit'])->name('submit');
Route::get('/logout', [Main::class, 'logout'])->name('logout');



//Rota para executar o método hard code de inserção no banco de dados
// Route::get('/temp', [Main::class, 'temporaryUser'])->name('temp');
