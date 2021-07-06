<?php
session_start();
include 'header2.php';

 ?>

  <form class="formFlight" action="flight.php" method="GET" name="FormFlight">
    <div class="middleSideOption">
      <div class="middleSideOption1">
        <div class="planeimg1">

        </div>
        <label>Plecare</label>
        <input type="text" name="Plecare" value="" id="Plecare">
      </div>
      <div class="middleSideOption2">
        <div class="planeimg2">

        </div>
        <label>Aterizare</label>
        <input type="text" name="Aterizare" value="" id="Aterizare">
        <button type="submit" name="button" class="Button">Search></button>
      </div>
    </div>
    <div class="leftSideOptions">
       <div class="Company1">
         <h3>Company</h3>
        <label><input type="checkbox" name="Company" value="Tarom" class="Company">Tarom</label>
        <label><input type="checkbox" name="Company" value="Air Europa" class="Company">Air Europa</label>
        <label><input type="checkbox" name="Company" value="Air France" class="Company">Air France</label>
        <label><input type="checkbox" name="Company" value="British Airways" class="Company">British Airways</label>
        <label><input type="checkbox" name="Company" value="Emirates" class="Company">Emirates</label>
        <label><input type="checkbox" name="Company" value="Swiss" class="Company">Swiss</label>
        <label><input type="checkbox" name="Company" value="Wizz" class="Company">Wizz</label>
        <label><input type="checkbox" name="Company" value="Blue Air" class="Company">Blue Air</label>
        <button type="submit" name="button" class="Button">Search></button>
       </div>
       <div class="Class1">
         <h3>Class</h3>
         <label><input type="checkbox" name="Class" value="First Class">First Class</label>
         <label><input type="checkbox" name="Class" value="Bussiness Class">Bussiness Class</label>
         <label><input type="checkbox" name="Class" value="Economy Class">Economy Class</label>
        <button type="submit" name="button" class="Button">Search></button>
       </div>
       <div class="Price">
         <h3>Price</h3>
         <div class="PriceMinim">
 <label class=""><input type="text" name="Price1" value="" class="Minim">Minimum</label>
         </div>
           <div class="PriceMaxim">
<label class=""><input type="text" name="Price2" value="" class="Maxim">Maximum</label>
           </div>
          <button type="submit" name="button" class="Button">Search></button>
       </div>
    </div>
                      <!--- Force to choose 1 checkbox -------->
    <script type="text/javascript" src="js/OneInputCheckBox.js"></script>
                      <!-- Recive flights --------->

      <!-- Adds item into cart and track numbers of items in cart and display the number near cart icon ------>
    <script type="text/javascript"src="js/AddCart.js"></script>

    </form>
     <div class="Response">
       <?php
     include "db.php";
     $arr=[];
     $arr=$_POST;
     $true="1=1";
     $sql="SELECT * FROM `zboruri` WHERE TRUE";
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
      if($sql!="SELECT * FROM `zboruri` WHERE TRUE"){
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          echo '  <div class="flightData" id="'.$row["ID"].'">
                  <p>'.$row["Din"].','.$row["TaraDin"].'</p>
                  <p>'.$row["Catre"].','.$row["TaraCatre"].'</p>
                  <p>'.$row["Data"].'</p>
                  <p>'.$row["Ora"].':00'.'</p>
                  <h2 class="Clasa">'.$row["Clasa"].' Class</h2>
                  <h2 class="Companie">'.$row["Companie"].'</h2>
                  <div class="arrow"></div>
                  <button type="submit" name="buy" class="BuyFlight">Buy</button>
                  <p class="priceFlights">'.$row["Pret"].'€</p>
                  </div>';
          }
      }
      ?>

     </div>
     <div class="OpacityCont">

     </div>
     <div class="Added">
      <img src="images/Added.png" alt="" >
      <h2>Added!</h2>
      <button type="button" name="button" class="Continue">Continue</button>
     </div>
  </body>
</html>
