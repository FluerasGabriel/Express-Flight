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
<img class="LoadingAnimate" src="../images/loading.gif" alt="">
<div class="LoadingBackground">

</div>
<div class="MainBody">
 <div class="TicketInsert">
   <form  action="AddFlight.php" method="POST" id='AdminFormAdd'>
   <h2 >
   Insert flight:
   </h2>
<div class="SubAdministrateTitle">
     <div class="AdministrateElementsA">
    <label>Country:</label>
    <input type="text" name="Country" value="" required/>
  </div>
  <div class="AdministrateElementsB">
    <label>Town:</label>
    <input type="text" name="Town" value=""required/>
  </div>
  <div class="AdministrateElementsC">
    <label>ToCountry:</label>
    <input type="text" name="ToCountry" value=""required/>
  </div>
  <div class="AdministrateElementsD">
    <label>ToTown:</label>
    <input type="text" name="ToTown" value=""required/>
  </div>
  <div class="AdministrateElementsE">
    <label>Date:</label>
    <input type="text" name="Date" value=""required/>
  </div>
  <div class="AdministrateElementsF">
    <label>Hour:</label>
    <input type="text" name="Hour" value=""required/>
  </div>
  <div class="AdministrateElementsG">
    <label>Price:</label>
    <input type="text" name="Price" value=""required/>
  </div>
  <div class="AdministrateElementsH">
    <label>Class:</label>
    <input type="text" name="Class" value=""required/>
  </div>
  <div class="AdministrateElementsI">
    <label>Company:</label>
    <input type="text" name="Company" value=""required/>
  </div>
  <div class="AdministrateElementsJ">
    <label>Ammount:</label>
    <input type="text" name="Ammount" value=""required/>
  </div>
   </div>
   <button type="submit" id="AddTicket" name="TicketAdd">Submit</button>
   </form>
   <form id="AdminFormUpdate" action="Update.php" method="POST">
   <div class="UpdateStock">
   <h2>Update Stock:</h2>
   <div class="SubUpdateStock">
     <div class="UpdateStockID">
       <label>ID:</label>
       <input type="text" name="idUpdateStock" value="" required>
     </div>
     <div class="UpdateStockCantitate">
       <label>Ammount</label>
       <input type="text" name="ammountUpdateStock" value="" required>

     </div>
   </div>
   <button id="UpdateStock" type="submit" name="button">Submit</button>
   </div>
    </form>
    <form id="AdminFormDelete" action="Delete.php" method="post">
   <div class="DeleteTicket">
      <h2>Delete Flight:</h2>
      <div class="SubDeleteTicket">
        <div class="DeleteTicketID">
          <label>ID:</label>
           <input type="text" name="idDeleteTicket" value="" required>
        </div>

      </div>
      <button type="submit" name="DeleteTicket">Submit</button>
   </div>
   </form>
 </div>
  <div class="IncreaseView">

  </div>
</div>
<script type="text/javascript" src="../js/AdministrateScripts.js"></script>

  </body>
</html>
