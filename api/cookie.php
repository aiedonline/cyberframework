<?php

$VERSAO_CRIPTOGRAFIA = 'V1';  // Caso mude no futuro a criptografia, pode-se variar este elemento para poder não dar pau de execução.

class SessionCookie{

    function __construct(){
        $this->CONFIG = json_decode(file_get_contents(dirname(dirname(__FILE__)). "/data/config.json"));
    }
    
    public function name_cookie($name){
        return $name;
        //return preg_replace('/[^A-Za-z0-9\-]/', '', $this->encrypt($name, $key) );
    }

    public function save($name, $value){
        global $VERSAO_CRIPTOGRAFIA;
        //$CONFIG = json_decode(file_get_contents(dirname(dirname(__FILE__)). "/data/config.json"));
        $key = $this->CONFIG->keyhash;
        $enc = $this->encrypt($value, $key);
        setcookie( $this->name_cookie(  $name . "_" . $VERSAO_CRIPTOGRAFIA ) , $enc, time() + (86400 * 30), "/");
    }
    
    public function load($name){
        global $VERSAO_CRIPTOGRAFIA;
        //$CONFIG = json_decode(file_get_contents(dirname(dirname(__FILE__)). "/data/config.json"));
        $key = $this->CONFIG->keyhash;
        if(isset(  $_COOKIE[   $this->name_cookie( $name . "_" . $VERSAO_CRIPTOGRAFIA ) ])) {
            return $this->decrypt($_COOKIE[ $this->name_cookie( $name . "_" . $VERSAO_CRIPTOGRAFIA ) ], $key);
        }
        return null;
    }
    
    function exists($name){
        global $VERSAO_CRIPTOGRAFIA;
        //$CONFIG = json_decode(file_get_contents(dirname(dirname(__FILE__)). "/data/config.json"));
        if(isset($_COOKIE[ $this->name_cookie( $name . "_" . $VERSAO_CRIPTOGRAFIA )  ])) {
            return true;
        }
        return null;
    }
    
    
    function encrypt($plaintext, $key){
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        return base64_encode( $iv.$hmac.$ciphertext_raw );
    }
    
    function decrypt($ciphertext, $key){
        $c = base64_decode($ciphertext);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        return $original_plaintext;
    }


}



?>