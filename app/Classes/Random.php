<?php

namespace App\Classes;

class Random{

  public function randomizeToken(){
    return rand(100000, 999999);
  }

}