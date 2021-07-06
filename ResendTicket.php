<!DOCTYPE html>
<?php
session_start();
if(isset($_POST['RESEND'])){
$_SESSION['Resend']=$_POST['RESEND'];
function GetLink(){
  require_once("EncryptURL.php");
  $obj=new EncryptURL();
  $encrypt=$obj->Encrypting();
  $_SESSION['encryptURL']=$encrypt;
}
function SendEmail(){
  $to = "dota.gabi@gmail.com";
  $link="http://localhost/Express/History/Resend.php?".$_SESSION['encryptURL'];
  $subject = "Flight Ticket Reservation";

  $txt = 'Thank you for choosing Express :) for printing your tickets please access our link:'.$link.'

    With kidness, Express.com
  ';

  mail($to,$subject,$txt);
}
GetLink();
SendEmail();
echo 1;
}
 ?>
