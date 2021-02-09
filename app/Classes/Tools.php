<?php

  namespace App\Classes;

  class Tools {

    // imprime o valor de uma variável e para o programa
    public function printData($data){
      if(is_array($data) || is_object($data)){
        echo "<pre>";
        print_r($data);
      } else {
        echo $data;
      }

      die();

    }

  }