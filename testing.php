<?php
include 'db.php';
$query="Select * From zboruri";
$respond=mysqli_query($conn,$query);
$num_rows=mysqli_num_rows($respond);
$Months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
for($i=1;$i<=$num_rows;$i++){
  $randomonth=rand(0,11);
  $randomday=rand(1,28);
  $dateCreate=date_create_from_format("j-M-Y",$randomday.'-'.$Months[$randomonth].'-2021');
  $date=date_format($dateCreate,"Y-m-d");
  echo $date;
  $query="UPDATE `zboruri` SET `Data`='$date' WHERE `ID`='$i'";
  $respond=mysqli_query($conn,$query);
}
 echo "Succes!";
 ?>
