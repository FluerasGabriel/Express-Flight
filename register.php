<?php
session_start();
include 'header2.php';
  ?>
  <script type="text/javascript">
    </script>

<form  action="login.php" method="post" id="form">
      <div class="inputCont">
        <div class="inputCont2">

       <label class="custom-field">
      <input type="text"  id="E-mail" name="Email" required/>
      <span class="placeholder">E-mail</span>
      <img src="images/invisible.png"  class="invisible">
      </label>
      <label class="custom-field">
      <input type="password"  id="Password" name="Password" required/>
      <span class="placeholder2">Password</span>
      </label>
      <label class="custom-field">
      <input type="text"  id="FirstName" name="FirstName" required/>
      <span class="placeholder3">FirstName</span>
      </label>
      <label class="custom-field">
      <input type="text"  id="LastName" name="LastName" required/>
      <span class="placeholder4">SecondName</span>
      </label>

      <button type="submit" name="button" class="buttRegister">Register></button>
      </div>
    </form>
      <img src="images/x.png" class="x">
      <span class="formInfo"></span>
      </div>
      <div class="ExtraSpace1">

      </div>
      <script type="text/javascript">
      var count=1;
        $("#E-mail").on("focusout",function(){
            var input=$(this).val();
            var empty="";
            console.log(input);
            if(input!=empty){
               if(!EmailFormat(input)){
                var str="E-mail is not valid";
                $(".formInfo").html(str);

             }
             else {
               $(".formInfo").html("");
               $(".x").css("display","none");
             }
          }
          else{
            $(".formInfo").html("");
            $(".x").css("display","none");
          }
        });
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
        function EmailFormat(email){
          var result;
          var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
          if(!email.match(mailformat)){
            result=false;
          }
          else{
            result=true;
          }
          return result;
        }
      </script>
      <script type="text/javascript">
      $("#form").on('submit',function(e){
        e.preventDefault();
         var uname=$("#E-mail").val();
         var pass=$("#Password").val();
         var firstName=$("#FirstName").val();
          var lastname=$("#LastName").val();
         console.log(uname);
         $.ajax({
           method: "POST",
           url: "checkEmail.php",
           data:{personEmail:uname,Pass:pass,FirstName:firstName,LastName:lastname},
            success:function(response){
                 if(EmailFormat(uname)){
                   if(response=="1"){
                     $(".formInfo").html("Your email is already taken.");
                       }
                   else {
                   $(".formInfo").html("Succes!");
                   }
                 }
                 else{
                    $(".x").css("display","block");
                    $(".formInfo").html("E-mail is not valid");
                 }

                  }

             });
         });
      </script>

</form>
  </body>
</html>
