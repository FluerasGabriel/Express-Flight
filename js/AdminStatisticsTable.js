var size=0;
$(".StatisticsTableForm").on("submit",function(e){
  e.preventDefault();
   size+=30;
   $.ajax({
       type:"POST",
       url:"GetAllFlights.php",
       data:{size:size},
       success:function(data){
          $('.StatisticsTable').html(data);
       }
   });
})
