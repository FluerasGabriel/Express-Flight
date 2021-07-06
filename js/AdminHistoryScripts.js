var size=0;
$(".historyEvenetForm").on("submit",function(e){
e.preventDefault();
  size+=15;
  $.ajax({
    type:"POST",
    url:"GetHistory.php",
    data:{size:size},
    success:function(data){
       $('.AdminHistoryBody').html(data);
    }
  });
});
