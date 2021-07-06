<?php
include 'C:/xampp/htdocs/Express/db.php';

if(isset($_POST['idUpdateStock'],$_POST['ammountUpdateStock'])){
  $id=$_POST['idUpdateStock'];
  $ammount=$_POST['ammountUpdateStock'];
  $sql="SELECT cantitate from zboruri WHERE ID ='$id'";
  $execute=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($execute,MYSQLI_NUM);
  $ammount=$ammount+$row[0];
  $sql="UPDATE zboruri SET cantitate='$ammount'WHERE ID ='$id'";
  $execute=mysqli_query($conn,$sql);
}
echo "work";
 ?>
