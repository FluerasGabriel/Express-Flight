<?php
include 'db.php';
  $uemail="";
  $user="";
  $pass="";
  if(isset($_POST['personEmail'],$_POST['Pass'],$_POST['FirstName'],$_POST['LastName'])){
    $user=$_POST['FirstName'];
    $pass=$_POST['Pass'];
    $uemail=$_POST['personEmail'];
    $lastname=$_POST['LastName'];
  }

$query="SELECT * FROM `user` WHERE `Email`='$uemail'";
$result=mysqli_query($conn,$query);
$store=mysqli_num_rows($result);
if($store!=false)
{
  echo "1";
}
else{
  $query="INSERT INTO `user` (`Nume`,`Parola`,`Email`,`Prenume`) VALUES ('$user','$pass','$uemail','$lastname')";
  $result=mysqli_query($conn,$query);
  echo "0";
}
 ?>
