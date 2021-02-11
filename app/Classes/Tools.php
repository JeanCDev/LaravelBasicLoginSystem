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
    
    public function crypt($value){

      return bin2hex(openssl_encrypt(
        $value, 'AES-128-CBC', 
        's[vQWLwy/)\B[z,2kjPuhs@vVEB]^?5)',
        OPENSSL_RAW_DATA, '9WXn/N?vR#[3P4q@'
      ));

    }

    public function decrypt($value){

      if(strlen($value) % 2 != 0){
        return null;
      }

      return openssl_decrypt(
        hex2bin($value), 'AES-128-CBC',
        's[vQWLwy/)\B[z,2kjPuhs@vVEB]^?5)',
        OPENSSL_RAW_DATA, '9WXn/N?vR#[3P4q@'
      );

    }

  }