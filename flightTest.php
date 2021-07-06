<?php
session_start();
include 'header2.php';

 ?>

  <form class="formFlight" action="" method="post" name="FormFlight">
    <div class="middleSideOption">
      <div class="middleSideOption1">
        <div class="planeimg1">

        </div>
        <label>Plecare</label>
        <input type="text" name="Plecare" value="" id="Plecare">
      </div>
      <div class="middleSideOption2">
        <div class="planeimg2">

        </div>
        <label>Aterizare</label>
        <input type="text" name="Aterizare" value="" id="Aterizare">
        <button type="submit" name="button">Search></button>
      </div>
    </div>
    <div class="leftSideOptions">
       <div class="Company1">
         <h3>Company:</h3>
        <label><input type="checkbox" name="Company" value="Tarom" class="Company" >Tarom</label>
        <label><input type="checkbox" name="Company" value="Air Europa" class="Company" >Air Europa</label>
        <label><input type="checkbox" name="Company" value="Air France" class="Company" >Air France</label>
        <label><input type="checkbox" name="Company" value="British Airways" class="Company" >British Airways</label>
        <label><input type="checkbox" name="Company" value="Emirates" class="Company" >Emirates</label>
        <label><input type="checkbox" name="Company" value="Swiss" class="Company" >Swiss</label>
        <label><input type="checkbox" name="Company" value="Wizz" class="Company" >Wizz</label>
        <label><input type="checkbox" name="Company" value="Blue Air" class="Company" >Blue Air</label>

       </div>
       <div class="Class1">
         <h3>Class:</h3>
         <label><input type="checkbox" name="Class" value="First Class">First Class</label>
         <label><input type="checkbox" name="Class" value="Bussiness Class">Bussiness Class</label>
         <label><input type="checkbox" name="Class" value="Economy Class">Economy Class</label>
         <button type="submit" name="button" class="Button">Search></button>
       </div>
       <div class="Price">
         <h3>Price:</h3>
         <div class="PriceMinim">
 <label class=""><input type="text" name="Price1" value="" class="Minim">Minimum</label>
         </div>
           <div class="PriceMaxim">
<label class="label2"><input type="text" name="Price2" value="" class="Maxim">Maximum</label>
           </div>
            <button type="submit" name="button" class="Button">Search></button>
       </div>
    </div>
    <script type="text/javascript">
     var serialize;
     var plecare=$("#Plecare").val();
    $("input:checkbox").on('click', function() {
    var $box = $(this);
    if ($box.is(":checked")) {
      var group = "input:checkbox[name='" + $box.attr("name") + "']";
      $(group).prop("checked", false);
      $box.prop("checked", true);
    }
    else {
      $box.prop("checked", false);
    }
  });
     $(".formFlight").on('submit',function(e){
       e.preventDefault();

        $.ajax({
           method:"POST",
           url:"getFlights2.php",
           data:$(".formFlight").serialize(),
           success:function(data){
            $(".Response").html(data);
           }
        });
     });
    </script>
    </form>
     <div class="Response">

     </div>
  </body>

</html>
