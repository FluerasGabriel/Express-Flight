function disableScrolling(){
  $('body').css('overflow','hidden');
$('body').attr('scroll','no');
}
function enableScrolling(){
$('body').css('overflow','auto');
$('body').attr('scroll','yes');
}
function Loading(){
  disableScrolling();
  window.scrollTo(0, 0);
  $(".LoadingAnimate").css("display","block");
  $(".LoadingBackground").css("display","block");
}
function AfterLoading(){
  $(".LoadingAnimate").css("display","none");
  $(".LoadingBackground").css("display","none");
  enableScrolling();
}
function AlertGood(event){
  Swal.fire({
    icon: 'success',
    title: event,
    text: 'You '+event+'a ticket',
    confirmButtonText: 'Ok',
    confirmButtonColor: '#7a73ff'
  })
}
function AlertBad(){
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  confirmButtonText: 'Ok',
  confirmButtonColor: '#7a73ff'
})

}
$('#AdminFormAdd').on("submit",function(e){
e.preventDefault();
Loading();
var data=$("#AdminFormAdd").serialize();
console.log(data);
$.ajax({
 type: "POST",
 data: data,
 url: "AddFlight.php",
 success: function(msg){
   if(msg=="work"){
     AfterLoading();
     AlertGood('Add');
   }
   else{
     AfterLoading();
     AlertBad();
   }
 }
});
});
$('#AdminFormUpdate').on("submit",function(e){
e.preventDefault();
Loading();
var data=$("#AdminFormUpdate").serialize();
$.ajax({
 type: "POST",
 data: data,
 url: "Update.php",
 success: function(msg){
   if(msg=="work"){
     AfterLoading();
     AlertGood('Update');
   }
   else{
     AfterLoading();
     AlertBad();
   }
 }
});
});
$('#AdminFormDelete').on("submit",function(e){
e.preventDefault();
Loading();
var data=$("#AdminFormDelete").serialize();
$.ajax({
 type: "POST",
 data: data,
 url: "Delete.php",
 success: function(msg){
   if(msg=="work"){
     AfterLoading();
     AlertGood('Remove');
   }
   else{
     AfterLoading();
     AlertBad();
   }
 }
});
});
