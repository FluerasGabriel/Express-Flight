<?php
session_start();

function GetLink(){
  require_once("EncryptURL.php");
  $obj=new EncryptURL();
  $encrypt=$obj->Encrypting();
  $_SESSION['encryptURL']=$encrypt;
}
function GetCart(){
  include 'db.php';
  $email=$_SESSION['user'];
  $arr=array();
  $sql="SELECT `ID_Zbor` as zbor,cart.Cantitate as cant
  FROM user INNER JOIN cart ON cart.ID_User=user.ID INNER JOIN zboruri ON cart.ID_Zbor=zboruri.ID WHERE user.Email='$email'";
  $execute=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($execute)){
    $arr[$row['zbor']]=$row['cant'];
  }
  return $arr;
}
function RemoveFlightQuantity($arr){
 include 'db.php';

foreach ($arr as $zbor => $cant) {
  $cartQuant=(int)$cant;
  $ticketID=(int)$zbor;
  $sql="Select `cantitate` From zboruri WHERE ID='$ticketID'";
  $execute=mysqli_query($conn,$sql);
  $stockQuant=mysqli_fetch_array($execute,MYSQLI_NUM);
  $currentQuant=$stockQuant[0]-$cartQuant;
  $sql="UPDATE zboruri SET cantitate=$currentQuant WHERE ID='$ticketID'";
  $execute=mysqli_query($conn,$sql);
}
 }
 function PlaceTransaction(){
   include 'db.php';
   $email=$_SESSION['user'];
   $sql="SELECT `ID_Zbor` as zbor,cart.Cantitate as cant,`ID_User` as user FROM user
   INNER JOIN cart ON cart.ID_User=user.ID INNER JOIN zboruri ON cart.ID_Zbor=zboruri.ID WHERE user.Email='$email'";
   $execute=mysqli_query($conn,$sql);
   $arr=array();
   while ($row=mysqli_fetch_assoc($execute)){
     $todayDate=date("Y-m-d");
     $user=$row['user'];
     $zbor=$row['zbor'];
     $cant=$row['cant'];
     $sql2="INSERT INTO transactie (user_ID,zboruri_ID,cantitate,`date`) VALUES ('$user','$zbor','$cant','$todayDate')";
     mysqli_query($conn,$sql2);
   }
 }
 function GetUserCart(){
   include 'db.php';
   $email=$_SESSION['user'];
   $sql="SELECT user.ID as user FROM cart INNER JOIN user ON user.ID=cart.Id_User WHERE user.Email='$email'";
   $execute=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($execute)){
    $user=$row['user'];
   }
   return $user;
 }
 function DeleteCart(){
   include 'db.php';
   $user=GetUserCart();
   $sql="DELETE FROM cart WHERE ID_user='$user'";
   $execute=mysqli_query($conn,$sql);
 }

function SendEmail(){
  $to = "dota.gabi@gmail.com";
  $link="http://localhost/Express/Cart/Order.php?".$_SESSION['encryptURL'];
  $subject = "Flight Ticket Reservation";

  $txt = 'Thank you for choosing Express :) for printing your tickets please access our link:'.$link.'

    With kidness, Express.com
  ';

  mail($to,$subject,$txt);
}
GetLink();
RemoveFlightQuantity(GetCart());
PlaceTransaction();
SendEmail();
DeleteCart();
echo "Succes";
 ?>
