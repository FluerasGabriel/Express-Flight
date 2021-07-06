<?php
include "db.php";
$arr=[];
$arr=$_POST;
$true="1=1";
$sql="SELECT * FROM `zboruri` WHERE $true";
if(isset($_GET["Plecare"])){
  $plecare=$_GET["Plecare"];

  if(!empty($plecare)){

    $sql.=" AND  `Din`='$plecare' ";
  }
}
$count;
if(isset($_GET["Aterizare"])){
  $aterizare=$_GET['Aterizare'];
  if(!empty($aterizare)){
      $sql.=" AND `Catre`='$aterizare' ";
  }
}
if(isset($_GET['Company'])){
  $company=$_GET['Company'];
  $sql.=" AND  `Companie`='$company' ";
}
if(isset($_GET['Class'])){
  $class=$_GET['Class'];
  $result=checkClasa($class);
  $sql.=" AND `Clasa`='$result' ";
}
if(isset($_GET['Price2'])){
  $pricemax=$_GET['Price2'];
  if(!empty($pricemax)){
    $sql.=" AND `Pret`<'$pricemax' ";
  }

}
if(isset($_GET['Price1'])){
  $priceminim=$_GET['Price1'];
  if(!empty($priceminim)){
    $sql.=" AND `Pret`>'$priceminim' ";
  }

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
            <button type="submit" name="buy" class="BuyFlight">Buy</button>
            <p class="priceFlights">'.$row["Pret"].'€</p>
          </div>';
    }

 ?>
