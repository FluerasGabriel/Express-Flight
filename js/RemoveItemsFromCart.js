var id;
$(".ContId").hover(function () {
   id=$(this).find(".StergeUnitCart").attr("id");
  $("#"+id).click(function(){
    var Ammount=$("."+id).val();
     Ammount-=1;

    $.ajax({
       method:"POST",
       url:"UpdateCart.php",
       data:{Amm:Ammount,id:id},
       success:function(data){

       }
    });
  });
});
