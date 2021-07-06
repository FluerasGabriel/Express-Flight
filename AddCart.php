<?php
session_start();
include 'db.php';
$userEmail=$_SESSION['user'];
$selectUserId="SELECT * FROM user WHERE `Email`='$userEmail'";
$result=mysqli_query($conn,$selectUserId);
while($row=mysqli_fetch_assoc($result)){
  $id=$row["ID"];
}
$_SESSION['userID']=$id;
if(isset($_POST['FlightTicket'])){
  $flightID=$_POST['FlightTicket'];
  $rowCount=CheckCantitate($flightID,$id);
  if($rowCount==true){
    $temp;
    $getCantitate="SELECT * FROM `cart` WHERE `ID_Zbor`='$flightID' AND `ID_user`='$id' ";
    $execute=mysqli_query($conn,$getCantitate);
    while($row=mysqli_fetch_assoc($execute)){
      $cantitate=$row["Cantitate"];
      $cantitate+=1;
    }
    $query="UPDATE `cart` SET `Cantitate`='$cantitate'  WHERE `ID_Zbor`='$flightID' AND `ID_user`='$id' ";
    $result=mysqli_query($conn,$query);
    echo "1";
  }
   else{
     $query="INSERT INTO cart (`ID_zbor`,`ID_user`,`Cantitate`) VALUES ('$flightID','$id','1')";
     $result=mysqli_query($conn,$query);
     echo "1";
   }

}
function CheckCantitate($flightID,$id){
  include 'db.php';
  $rowCount;
  $query="SELECT * FROM `cart` WHERE `ID_Zbor`='$flightID' AND `ID_user`='$id'";
  $result=mysqli_query($conn,$query);
  $rows=mysqli_num_rows($result);
  if($rows>0){
      $rowCount=true;
  }
  else{
    $rowCount=false;
  }
  return $rowCount;
}

 ?>
