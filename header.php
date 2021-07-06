
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Express</title>
      <link rel="stylesheet" href="	css/Style.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>
    <body>

       <div class="container1">
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FFFFFF" class="bi bi-person-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
      <ul class="headBar">
        <li><a href="/Express/home.php">Home</a></li>

        <li><a href="/Express/flight.php">Flights</a></li>
        <li>

        <span>UserInfo</span>
          <ul>
            <li><a href="register.php">Register</a></li>
            <?php
            if(isset($_SESSION["user"])){
              if($_SESSION['user']!="admin@gmail.com"){
                echo '<li><a href="/Express/History.php">History</a></li>';
                echo'<li><a href="/Express/loggedOut.php">Logout</a></li>';
              }
            }
             else
             {
                echo'<li><a href="/Express/login.php">Login</a></li>';

              }
              if(isset($_SESSION['user'])){
                if($_SESSION['user']=="admin@gmail.com"){
                  echo '<li id="history"><a href="http://localhost/Express/Admin/Administrate.php">Administrate</a></li>';
                  echo '<li id="history"><a href="http://localhost/Express/Admin/Statistics.php">Statistics</a></li>';
                  echo '<li id="history"><a href="http://localhost/Express/Admin/History.php">History</a></li>';
                  echo' <li id="loggout"><a href="/Express/loggedOut.php">Logout</a></li>';
                }
              }

             ?>

          </ul>
        </li>
      </ul>

      <div class="image2">
      </div>
      <div class="cart">
         <?php if(isset($_SESSION["user"])){
                 $uname=$_SESSION["user"];
                echo '<a href="cart.php" class="cartDisplay">c</a>';
                include 'db.php';
                $query="SELECT SUM(`Cantitate`) AS cant , user.Email AS Email FROM cart INNER JOIN user ON cart.ID_User=user.ID WHERE user.Email='$uname'";
                $res=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($res)){
                  $sum=$row['cant'];
                }
                  if($sum!=0){
                     echo '<span class="dot">'.$sum.'</span>';
                  }
                }
              else{
                 echo '<a href="home.php" class="cartDisplay">ca</a>';
               }

            ?>

      </div>
