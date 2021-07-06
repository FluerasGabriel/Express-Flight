
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/Style.css"
  </head>
  <body>
    <div class="HistoryBody">
      <?php
      session_start();
      include 'C:/xampp/htdocs/Express/db.php';
      $URL=$_SESSION['encryptURL'];
      $ExpectedUrl=$_SERVER['QUERY_STRING'];
      if($URL==$ExpectedUrl){
       $email=$_SESSION['user'];
       $sql="SELECT zboruri.Pret,zboruri.Data,zboruri.Companie, zboruri.Din,zboruri.Catre,transactie.zboruri_ID as zbor,transactie.cantitate as cant
       FROM user INNER JOIN transactie ON transactie.user_ID=user.ID INNER JOIN zboruri ON transactie.zboruri_ID=zboruri.ID WHERE user.Email='$email'";
       $userName=$_SESSION['userName'];
       $userLastName=$_SESSION['lastName'];
       $execute=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($execute)){
         $size=(int)$row['cant'];
         $comp=$row['Companie'];
         $din=$row['Din'];
         $catre=$row['Catre'];
         $data=$row['Data'];
         $pret=$row['Pret'];
         for($i=1;$i<=$size;$i++){
       echo' <div class="HistoryContent">
             <h2>'.$din.' To '.$catre.'</h2>
             <h3>'.$data.'</h3>
             <h3>'.$pret.' Euro</h3>
             <h3>'.$comp.'</h3>
             <h3>Name: '.$userName.' '.$userLastName.'</h3>
             <div class="PurpleTicketRight">
             </div>
             </div>';
         }
       }

      }
      ?>
    </div>
  </body>
</html>
