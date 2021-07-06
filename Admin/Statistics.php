<?php
session_start();
include 'C:/xampp/htdocs/Express/header.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/Style.css"
  </head>
  <body>
   <div class="StatisticsBody1">
    <div class="TotalUsers">
     <div class="TotalUserH1">
      <h1>Total Users:</h1>
     </div>
     <div class="TotalUserH2">
      <h2><?php
      include 'C:/xampp/htdocs/Express/db.php';
      $sql="SELECT * FROM user";
      $execute=mysqli_query($conn,$sql);
      $row=mysqli_num_rows($execute);
      echo $row;
       ?></h2>
     </div>

    </div>
    <div class="TotalTickets">
      <div class="TotalTicketsH1">
      <h1>Total Flights:</h1>
      </div>
      <div class="TotalTicketsH2">
      <h2><?php
      include 'C:/xampp/htdocs/Express/db.php';
      $sql="SELECT * FROM zboruri";
      $execute=mysqli_query($conn,$sql);
      $row=mysqli_num_rows($execute);
      echo $row;
       ?></h2>
      </div>

    </div>
    <div class="TodayTransactions">
      <div class="TodayTransactionsH1">
        <h1>Today Transactions</h1>
      </div>
      <div class="TodayTransactionsH2">
       <h2><?php
       include 'C:/xampp/htdocs/Express/db.php';
       $date=date("Y-m-d");
       $sql="SELECT * FROM transactie WHERE Date='$date'";
       $execute=mysqli_query($conn,$sql);
       $row=mysqli_num_rows($execute);
       echo $row;
        ?></h2>
      </div>
    </div>
    <div class="TotalTransactions">
      <div class="TotalTransactionsH1">
       <h1 class=>Total Transactions</h1>
      </div>
      <div class="TotalTransactionsH2">
       <h2><?php
        include 'C:/xampp/htdocs/Express/db.php';
        $sql="SELECT * FROM transactie";
        $execute=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($execute);
        echo $row;
        ?></h2>
      </div>
    </div>
   </div>

    <div class="StatisticsTable">
      <h2 >View All Flights:</h2>
      <table>
        <th>ID </th>
        <th>From Country </th>
        <th>From Town</th>
        <th>To Town</th>
        <th>To Country</th>
        <th>Hour </th>
        <th>Price </th>
        <th>Class </th>
        <th>Company </th>
        <th>Ammount </th>
        <th>Date </th>
      </table>
    </div>
    <div class="StatisticsTableButton">
      <form class="StatisticsTableForm" action="GetAllFlights.php" method="POST">
       <button type="submit" name="button">Load</button>
      </form>
    </div>

   </div>
   <script src="../js/AdminStatisticsTable.js"></script>
  </body>
</html>
