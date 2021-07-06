
<?php
session_start();
include 'header.php';
include 'db.php'
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/Style.css">
    <title></title>
  </head>
  <body>
    <div class="CartContainer">
    <?php
     $totalPrice=0;
     if(isset($_SESSION['user'])){
       $uemail=$_SESSION['user'];
      $query="SELECT cart.ID,user.Email,user.Nume,cart.Cantitate,zboruri.Pret,zboruri.TaraDin,zboruri.Din,zboruri.Catre,zboruri.TaraCatre,zboruri.Data
      FROM user INNER JOIN cart ON cart.ID_User=user.ID INNER JOIN zboruri ON cart.ID_Zbor=zboruri.ID WHERE user.Email='$uemail'";
       $result=mysqli_query($conn,$query);
       while($row=mysqli_fetch_assoc($result)){
         $columnId=$row['ID'];
         $ammout=$row['Cantitate'];
         $price=$row['Pret'];
         $subTotalPrice=$ammout*$price;
         $totalPrice+=$subTotalPrice;
         $TaraDin=$row["TaraDin"];
         $TaraCatre=$row["TaraCatre"];
         $din=$row["Din"];
         $catre=$row["Catre"];
         $data=$row["Data"];
         echo '<div class="ContId">
                <div class="CartContainerUp">
             <div class="CartPlaneImg1">

             </div>
            <div class="CartContainerUpPath">
              <h2>'.$din.'</h2>
              <h2>To</h2>
              <div class="CartPlaneImg2">

              </div>
              <h2>'.$catre.'</h2>

            </div>
            <div class="CartTaraDin">
              <span>('.$TaraDin.')</span>
            </div>
            <div class="CartTaraCatre">
                <span>('.$TaraCatre.')</span>
            </div>
             <div class="CartContainerUpAmmount">
              <label>Ammount</label>
              <input type="text" name="" class="'.$columnId.'" value="'.$ammout.'" disabled>
              <a href=" " class="StergeUnitCart" id="'.$columnId.'">Sterge</a>
             </div>
             <div class="CartContainerUpPret">
              <label>Subtotal Price</label>
              <h3>'.$subTotalPrice.' Euro</h3>
             </div>

           </div>
           <div class="CartContainerDown">
             <div class="CartDate">
               <h2>'.$data.'</h2>
             </div>
           </div>
         </div>
         ';
       }
       $tva=(10/100)*$totalPrice;
       $PretCuTva=$totalPrice-$tva;
       echo '<div class="CartTotalSum">
        <div class="DetaliiCart">
          <h3>Cost subtotal:</h3>
          <h3>Taxa TVA:</h3>
        </div>
        <div class="RezultateDetaliCart">
         <h3>'.$PretCuTva.' Euro</h3>
         <h3>10%</h3>
        </div>
          <div class="TotalCart">
            <h2>Total:</h2>
          </div>
          <div class="RezultatTotalCart">
            <h2>'.$totalPrice.' Euro</h2>
          </div>
          <div class="LineSeparator">

          </div>
          <button method="POST" id="OrderEvent" type="button" name="placeOrder">Order</button>
       </div>';
     }
     ?>
  <!-- Remove item from cart , request the server for update the value and update number near cart icon --------------->
  <script type="text/javascript" src="js/RemoveItemsFromCart.js"></script>
  <script type="text/javascript" src ="js/PlaceOrder.js"></script>
    </div>


  </body>
</html>
