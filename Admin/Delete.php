<?php
include 'C:/xampp/htdocs/Express/db.php';
if(isset($_POST['idDeleteTicket'])){
  $id=$_POST['idDeleteTicket'];
  $sql="DELETE FROM zboruri WHERE ID='$id'";
  mysqli_query($conn,$sql);
}
echo "work";
 ?>
