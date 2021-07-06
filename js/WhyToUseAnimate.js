$(".WhyToUseContainer1").mouseover(function(){
  var name="images/purpleFace.png";
   $('.cont2img1').css({'background-image':'url(' + name + ')'});
   $('.cont2img1').css( { 'transition': "transform 0.5s",
                           'transform':  "rotate(" + -30 + "deg)"} );

}).mouseleave(function(){
    var name="images/blackFace.png";
  $('.cont2img1').css('background-image', 'url(' + name + ')');
  $('.cont2img1').css( { 'transition': "transform 0.5s",
                          'transform':  "rotate(" + 0 + "deg)"} );
});
$(".WhyToUseContainer2").mouseover(function(){
  var name="images/purplePlane.png";
   $('.cont2img2').css('background-image', 'url("'+name +'")');
   $('.cont2img2').css( { 'transition': "transform 0.5s",
                           'transform':  "rotate(" + -30 + "deg)"} );
}).mouseleave(function(){
    var name="images/blackPlane.png";
  $('.cont2img2').css('background-image', 'url("' + name + '")');
  $('.cont2img2').css( { 'transition': "transform 0.5s",
                          'transform':  "rotate(" + 0 + "deg)"} );
});
$(".WhyToUseContainer3").mouseover(function(){
  var name="images/purpleCard.png";
   $('.cont2img3').css('background-image', 'url(' + name + ')');
   $('.cont2img3').css( { 'transition': "transform 0.5s",
                           'transform':  "rotate(" + -30 + "deg)"} );
}).mouseleave(function(){
    var name="images/blackCard.png";
  $('.cont2img3').css('background-image', 'url(' + name + ')');
  $('.cont2img3').css( { 'transition': "transform 0.5s",
                          'transform':  "rotate(" + 0 + "deg)"} );
});
