<?php
include 'db.php';
if(isset($_POST['Amm'])){
  $ammout=$_POST['Amm'];
  $id=$_POST["id"];
  if($ammout>0){
    $query="UPDATE cart SET Cantitate='$ammout' WHERE ID='$id'";
    $result=mysqli_query($conn,$query);
  }
   else{
     $query="DELETE FROM cart WHERE ID='$id'";
     $result=mysqli_query($conn,$query);
   }
   echo "1";
}

 ?>
