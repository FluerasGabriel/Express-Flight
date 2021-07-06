var ammount=$(".dot").html();
  var size=5;
if(ammount==0){
  $(".dot").css("display","none");
}
$(document).on('click','.BuyFlight',function(){
    var pid = $(this).parent().attr("id");
    ammount++;
  
    if(ammount>0){
      $(".dot").css("display","block");
    }
    $(".dot").html(ammount);
    $.ajax({
            method:"POST",
            url:"AddCart.php",
            data:{FlightTicket:pid},
            success:function(response){
            }

    });

});
