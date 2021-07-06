<?php
session_start();
include 'C:/xampp/htdocs/Express/header.php';
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../css/Style.css"
     <title></title>
   </head>
   <body>
      <div class="AdminHistoryBody">
        <table>
        <th>UserEmail</th>
        <th>FlightID</th>
        <th>Ammount</th>
        <th>Date</th>
       </table>
      </div>
     <div class="ButtonHistoryLoad">
     <form class="historyEvenetForm" action="GetHistory.php" method="POST">
    <button   type="submit" name="button" id="historyEvenetBut">Load</button>
     </form>
     </div>
   </body>
   <script src="../js/AdminHistoryScripts.js"></script>
 </html>
