$("#OrderEvent").click(function(){
  Swal.fire({
    title: 'Confirming',
    text: "Do you want to continue?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#7a73ff',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Order'
  }).then((result)=>{
   if(result.isConfirmed){
    $.ajax({
       method:"POST",
       url:"PlaceOrder.php",
       success:function(response){
          if(response=="Succes"){
            Swal.fire({
              title: 'Accepted',
              text:  'You will recive an email, for more info please check your user history.',
              icon : 'success'
            });
               setTimeout(function(){ location.href="http://localhost/Express/History.php"; }, 2000);
          }
       }
    });
   }
  }
  )
});
