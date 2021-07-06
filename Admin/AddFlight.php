<?php
include 'C:/xampp/htdocs/Express/db.php';
if(isset($_POST['Country'],$_POST['Town'],$_POST['ToCountry'],$_POST['ToTown'],
$_POST['Date'],$_POST['Hour'],$_POST['Price'],$_POST['Class'],$_POST['Company'],$_POST['Ammount'])){
  $Country=$_POST['Country'];
  $Town=$_POST['Town'];
  $toCountry=$_POST['ToCountry'];
  $toTown=$_POST['ToTown'];
  $Date=$_POST['Date'];
  $Hour=$_POST['Hour'];
  $Price=$_POST['Price'];
  $Class=$_POST['Class'];
  $Company=$_POST['Company'];
  $Ammount=$_POST['Ammount'];
  $sql="INSERT INTO zboruri (`TaraDin`,`Din`,`Catre`,`TaraCatre`,`Data`,`Ora`,`Pret`,`Clasa`,`Companie`,`cantitate`)
   VALUES ('$Country','$Town','$toCountry','$toTown','$Date','$Hour','$Price','$Class','$Company','$Ammount') ";
  mysqli_query($conn,$sql);
}
echo "work";
 ?>
