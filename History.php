<?php
session_start();
include 'header.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
 <div class="HistoryBody">
    <?php
      include 'db.php';
      $mail=$_SESSION['user'];
      $sql="SELECT transactie.ID as ID, transactie.cantitate as cant ,zboruri.Din Din,zboruri.Catre as Catre,zboruri.Data as flightDate,zboruri.Pret as ticketPrice,zboruri.Companie as comp,transactie.user_ID as user,transactie.zboruri_ID as zboruri,transactie.cantitate,Date(transactie.Date) as da
      from transactie INNER JOIN user ON user.id=user_ID INNER JOIN zboruri ON zboruri.ID=transactie.zboruri_ID WHERE user.Email='$mail' ORDER BY da DESC";
      $execute=mysqli_query($conn,$sql);

      while($row=mysqli_fetch_assoc($execute)){
        $id=$row["ID"];
        $din=$row["Din"];
        $catre=$row["Catre"];
        $data=$row['flightDate'];
        $pret=$row['ticketPrice'];
        $comp=$row['comp'];
        $cant=$row['cant'];
        echo '
        <div class="HistoryContent" id="'.$id.'">
          <h2>'.$din.' To '.$catre.'</h2>
          <h3>'.$data.'</h3>
          <h3>'.$pret.' Euro</h3>
          <h3>'.$comp.'</h3>
          <h3>Ammount:'.$cant.'</h3>
          <label>Print:</label>
          <button class="HistoryButtonPlace" type="button" name="button">Resend</button>
        </div>
        ';
      }
     ?>
 </div>
<script type="text/javascript">
$(".HistoryButtonPlace").on("click",function()
{
   var showID = $(this).parent().attr("ID");
   alert(showID);
   $.ajax({
           method:"POST",
           url:"ResendTicket.php",
           data:{RESEND:showID},
           success:function(response){
             if(response=="1"){
               Swal.fire({
                 title: 'Accepted',
                 text:  'You will recive an email with the link',
                 icon : 'success'
               });
             }
           }

   });
});
</script>
  </body>
</html>
