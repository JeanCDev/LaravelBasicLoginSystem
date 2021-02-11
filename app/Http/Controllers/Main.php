<?php

namespace App\Http\Controllers;

use App\Classes\CheckSession;
use App\Classes\Random;
use App\Classes\Tools;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class Main extends Controller
{   

    private $tools;

    public function __construct(){

        $this->tools = new Tools();

    }

    public function index(){

        $check = new CheckSession();

        // verifica se o usuário está logado
        if($check->checkSession()){
            return redirect()->route('home');
        } else{
            return redirect()->route('login');
        }

    }

    public function home(){
        return view('home');
    }

    public function login(){

        $check = new CheckSession();

        if($check->checkSession()){
            return redirect()->route('home');
        }

        $error = session('error');

        $data = [];
        if(!empty($error)){
            $data = ['error'=>$error];
        }

        return view('login', $data);

    }

    public function loginSubmit(LoginRequest $request){

        $check = new CheckSession();

        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }

        if($check->checkSession()){
            return redirect()->route('home');
        }

        $request->validated();

        $email = trim($request->input('email'));
        $password = trim($request->input('password'));

        $user = User::where('email', $email)->first();

        if(!$user){
            session()->flash('error', 'Usuário não existe');
            return redirect()->route('login');
        } 
        
        if(!Hash::check($password, $user->password)){
            session()->flash('error', 'Senha inválida');
            return redirect()->route('login');
        } 

        // Salva o token de login na session
        session()->put('user', $user->email);

        // Salva os dados no log personalizado
        Log::channel('main')->info('Login successful');

        return redirect()->route('home');

    }

    // rota de exibição dos usuários
    public function users(){

        $data = [
            "users" => User::all()
        ];

        return view('users', $data);

    }

    // Tela de edição de usuário que recebe o id cryptografado
    public function edit($id){
        $id = $this->tools->decrypt($id);

        echo "Editar dados do usuário $id";
    }

    public function logout(){

        Log::channel('main')->info('Logout successful');

        session()->forget('user');
        return redirect()->route('index');

    }

    // Insere um usuário no banco de dados via hard code
    public function temporaryUser(){

        $user = new User();
        $user->email = 'jeangames15@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();

    }

    // verifica se já existe um usuário na sessão
    /* private function checkSession(){
        return session()->has('user');
    } */
}
