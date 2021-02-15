<?php

use App\Classes\ToolsFacade;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendingEmail;

Route::get('/', [Main::class, 'index'])->name('index');
Route::get('/home', [Main::class, 'home'])->name('home');

// rotas que controlam o login
Route::get('/login', [Main::class, 'login'])->name('login');
Route::post('/login-submit', [Main::class, 'loginSubmit'])->name('submit');
Route::get('/logout', [Main::class, 'logout'])->name('logout');

// rotas para ver o dados de usuários
Route::get('/users', [Main::class, 'users'])->name('users');
Route::get('/edit/{id}', [Main::class, 'edit'])->name('edit');

// Rotas para upload de arquivos
Route::get('/upload', [Main::class, 'uploadPage'])->name('upload');
Route::post('/uploadSubmit', [Main::class, 'uploadSubmit'])->name('uploadSubmit');
Route::get('/download', [Main::class, 'download'])->name('download');

// rota para enviar um email
Route::get('/mail', function (){

  $name = 'Jean Carlos Gomes';
  $own = 53;

  Mail::to('jeancarlosgomes@tutanota.com')
    ->send(new SendingEmail($name, $own));
});

// Rota para testar o Custom Facade
Route::get('/facade', function(){
  // Chama o arquivo de constantes na pasta config
  echo config('consts.CONST');

  // Chama as funções da Facade customizada
  ToolsFacade::printData([
    'name' => 'Jean'
  ]);
});



//Rota para executar o método hard code de inserção no banco de dados
// Route::get('/temp', [Main::class, 'temporaryUser'])->name('temp');
