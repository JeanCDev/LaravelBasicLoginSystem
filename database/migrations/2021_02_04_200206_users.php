<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->string('email', 50);
            $table->string('password', 200);
            $table->datetime('last_login')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down()
    {
        Schema::drop('users');
    }
}
