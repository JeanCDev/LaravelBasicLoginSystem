<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class Main extends Controller
{
    public function index(){

        // verifica se o usuário está logado
        if($this->checkSession()){
            return redirect()->route('home');
        } else{
            return redirect()->route('login');
        }

    }

    public function home(){
        return view('home');
    }

    public function login(){

        if($this->checkSession()){
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

        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }

        if($this->checkSession()){
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

        session()->put('user', $user->email);
        return redirect()->route('home');

    }

    public function logout(){

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
    private function checkSession(){
        return session()->has('user');
    }
}
