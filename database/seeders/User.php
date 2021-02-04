<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    // Insere dado no banco de dados com o Artisan
    public function run()
    { 
        $user = new ModelsUser();
        $user->email = 'jeangames15@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();
    }
}
