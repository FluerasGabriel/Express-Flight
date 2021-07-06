<?php
class EncryptURL{
  private $key='ASdfwkfasw';
  private $method='aes128';
 public function Encrypting(){
   $user=$_SESSION['user'];
   $iv_length = openssl_cipher_iv_length($this->method);
   $iv = openssl_random_pseudo_bytes($iv_length);
   $encryptUser=openssl_encrypt($user,$this->method,$this->key,0,$iv);
   return $encryptUser;
 }
}
?>
