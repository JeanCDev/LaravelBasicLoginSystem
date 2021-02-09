<?php

namespace App\Classes;

class CheckSession{

  public function checkSession(){
    return session()->has('user');
  }

}