<?php
session_start();
include 'header2.php';

 ?>
<form class="" action="" method="post">
      <div class="inputCont">
        <div class="inputCont2">
        <label class="custom-field">
       <input type="text" required id="Email" name="email"/>
       <span class="placeholder">Email</span>
       </label>

       <label class="custom-field">
      <input type="password" required id="Password" name="password"/>
      <span class="placeholder2">Password</span>
      <img src="images/invisible.png"  class="invisible">
      </label>

      <button type="submit" name="button" class="buttRegister">Login></button>
      </div>
      <img src="images/ x.png" class="x">
      <span class="formInfo"></span>
      </div>
      </form>
      <div class="ExtraSpace1">

      </div>
<script type="text/javascript">
var count=1;
$(".invisible").click(function(){

  if(count==1){
    count++;
    $(".invisible").css("height","30px")
    $(".invisible").attr("src","images/invisible.png");
    $("#Password").attr("type","password");
    console.log("visible");
    console.log(count);

  }
  else{
    count--;
    console.log(count);
   $("#Password").attr("type","text");
   $(".invisible").attr("src","images/visible.png");
   $(".invisible").css("height","20px")
  }
});
</script>
<?php

include 'db.php';
if(isset($_POST['button'])){
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $pass=mysqli_real_escape_string($conn,$_POST['password']);
  $query="SELECT * FROM `user` WHERE `Email`='$email' AND `Parola`='$pass'";
  $result=mysqli_query($conn,$query);
  while($row=mysqli_fetch_assoc($result)){
    $firstname=$row['Nume'];
    $lastName=$row['Prenume'];
    $_SESSION['user']=$email;
    $_SESSION['userName']=$firstname;
    $_SESSION['lastName']=$lastName;
    header("Location:home.php");
  }
}
 ?>
</body>
</html>
