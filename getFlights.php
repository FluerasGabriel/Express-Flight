<?php
include 'db.php';
$arr=[];
$arr=$_POST;
$true="1=1";
$sql="SELECT * FROM `zboruri` WHERE $true";
$plecare=$_Get['Plecare'];
$count;
$result="PretClasa3";
if(!empty($plecare)){

  $sql.=" AND  `Din`='$plecare' ";
}
$aterizare=$_Get['Aterizare'];
if(!empty($aterizare)){
    $sql.=" AND `Catre`='$aterizare' ";
}
if(isset($_Get['Company'])){
  $company=$_Get['Company'];
  $sql.=" AND  `Companie`='$company' ";
}
if(isset($_Get['Class'])){
  $class=$_Get['Class'];
  $result=checkClasa($class);
  $sql.=" AND `Clasa`='$result' ";
}

function checkClasa($Class){
 if($Class=="First Class"){
   $Class="First";
 }
 if($Class=="Bussiness Class")
 {
    $Class="Bussiness";
 }
 if($Class=="Economy Class"){
     $Class="Economy";
 }
 return $Class;
}
$pret1=$_Get['Price1'];
$pret2=$_Get['Price2'];
if(!empty($pret1)){
  $sql.=" AND `Pret`>'$pret1' ";
}
if(!empty($pret2)){
  $sql.=" AND `Pret`<'$pret2' ";
}

  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    echo '<div class="flightData" id="'.$row["ID"].'">
            <p>'.$row["Din"].','.$row["TaraDin"].'</p>
            <p>'.$row["Catre"].','.$row["TaraCatre"].'</p>
            <p>'.$row["Data"].' 2021</p>
            <p>'.$row["Ora"].':00'.'</p>
            <h2 class="Clasa">'.$row["Clasa"].' Class</h2>
            <h2 class="Companie">'.$row["Companie"].'</h2>
            <div class="arrow"></div>
            <button name="buy" class="BuyFlight">Buy</button>
            <p class="priceFlights">'.$row["Pret"].'€</p>
          </div>';
    }

 ?>
