$(".formFlight").on('submit',function(){
   var plecare=$("#Plecare").val();
   var  aterizare=$("#Aterizare").val();
   var company=$('.Company[1]:checked').val();
   var serialize=$('input[name="Company[1]"]:checked').serialize()
   var formser=$(".formFlight").serialize();
   var json=JSON.stringify(formser);
   $.ajax({
      method:"GET",
      url:"flight.php",
      data:formser,
      success:function(data){
         $('.Response').html(data);
      }
   });
});
