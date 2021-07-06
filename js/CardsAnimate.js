var activeCard;
$(".Card1").click(function(){
   activeCard="Card1";
  CardEvent(activeCard);
});
$(".Card2").click(function(){
  activeCard="Card2";
  CardEvent(activeCard);
});
$(".Card3").click(function(){
  activeCard="Card3";
  CardEvent(activeCard);
});
$(".Card4").click(function(){
  activeCard="Card4";
  CardEvent(activeCard);
});
$(".Card5").click(function(){
  activeCard="Card5";
  CardEvent(activeCard);
});
function CardEvent (ActiveCard){
 var ActiveCardIndex=parseInt(ActiveCard.slice(-1));
 $(".GifImageC3").animate({
    left:'-800px'
  },1000);
  $(".ExitButton").animate({
      right:'45px'
  },1000);
  $(".Card"+ActiveCardIndex).animate({
    width:'520px',
    height:'500px',
    left:'100px',
    top:'40%',
    backgroundsize:"cover",
    'z-index':'1',
    'border-radius':'0px'
    },1500);
    cardsDetails(ActiveCardIndex);
    $(".CardsDetails").animate({
      right:'60px'
       },2000);
  for(var i=1;i<=5;i++){
    if(ActiveCardIndex!=i){
      $(".Card"+i).animate({
        left:'100%'
        },1000);
    }
  }
}
$(".ExitButton").click(function(){
 ReverseAnimate(activeCard);
});

function cardsDetails(index){
var first ="Dubai is the most populous city in the United Arab Emirates (UAE) and the capital of the Emirate of Dubai.Located in the eastern part of the Arabian Peninsula on the coast of the Persian Gulf, Dubai aims to be the business hub of Western Asia.[8] It is also a major global transport hub for passengers and cargo.[9] Oil revenue helped accelerate the development of the city, which was already a major mercantile hub. Dubai's oil output made up 2.1 percent ofthePersianGulf emirate's economy in 2008.[10] A centre for regional and international trade since the early 20th century, Dubai's economy relies on revenues from trade, tourism, aviation, real estate, and financial services.[11][12][13][14] According to government data, the population of Dubai is estimated at around 3,400,800 as of 8 September 2020";
var second="Greece is a country located in Southeast Europe. Its population is approximately 10.7 million as of 2018; Athens is its largest and capital city, followed by Thessaloniki. Situated on the southern tip of the Balkans, Greece is located at the crossroads of Europe, Asia, and Africa. It shares land borders with Albania to the northwest, North Macedonia and Bulgaria to the north, and Turkey to the northeast.";

var third="Austria is a landlocked East Alpine country in the southern part of Central Europe. It is composed of nine federated states (Bundesländer), one of which is Vienna, Austria's capital and its largest city. It is bordered by Germany to the northwest, the Czech Republic to the north, Slovakia to the northeast, Hungary to the east, Slovenia and Italy to the south, and Switzerland and Liechtenstein to the west. Austria occupies an area of 83,879 km2 (32,386 sq mi) and has a population of nearly 9 million people. While German is the country's official language,[11] many Austrians communicate informally in a variety of Bavarian dialects.[12]";
var forth="Switzerland It is a federal republic composed of 26 cantons, with federal authorities based in Bern.[note 1][2][1] Switzerland is a landlocked country bordered by Italy to the south, France to the west, Germany to the north, and Austria and Liechtenstein to the east. It is geographically divided among the Swiss Plateau, the Alps, and the Jura, spanning a total area of 41,285 km2 (15,940 sq mi), and land area of 39,997 km2 (15,443 sq mi). While the Alps occupy the greater part of the territory, the Swiss population of approximately 8.5 million is concentrated mostly on the plateau, where the largest cities and economic centres are located, among them Zürich, Geneva and Basel. These cities are home to several offices of international organisations such as the headquarters of FIFA, the UN's second-largest Office, and the main building of the Bank for International Settlements. The main international airports of Switzerland are also located in these cities.";
var fifth="Turkey is a transcontinental country located mainly on the Anatolian Peninsula in Western Asia, with a smaller portion on the Balkan Peninsula in Southeastern Europe. Turkey is bordered on its northwest by Greece and Bulgaria; north by the Black Sea; northeast by Georgia; east by Armenia, Azerbaijan, and Iran; southeast by Iraq; south by Syria and the Mediterranean Sea; and west by the Aegean Sea. Approximately 70 to 80 percent of the country's citizens are ethnic Turks. Istanbul, which straddles Europe and Asia, is the country's largest city, while Ankara is the capital.";
 var list=new Array(first,second,third,forth,fifth);
 var result= $(".Card"+index+"Name").text();
$(".DetailTitle").html(result);
$(".DetailInfo").html(list[index-1]);
}

  function DefaultPosition(value){
      var result;

     if(value=='Card1'){
         result='500px';
     }
  else  if(value=='Card2'){
         result='670px';
     }
  else  if(value=='Card3'){
            result='840px';
      }
  else  if(value=='Card4'){
             result='1010px';
         }
   else  if(value=='Card5'){
              result='1180px';
        }
    return result;
  }

  function ReverseAnimate(CardNameActive){
    var index=CardNameActive.slice(-1);
    $(".Card"+index).animate({
      width:'150px',
      height:'250px',
      left:DefaultPosition("Card"+index),
      top:'45%',
      backgroundsize:'cover',
      border:'3px solid #4194ce',
      'border-radius':'10px'
    },500);
    for(var i=1;i<=5;i++){
      if(index!==i){

          var pos="Card"+i;
          $(".Card"+i).animate({
            width:'150px',
            height:'250px',
            left:DefaultPosition(pos),
            top:'45%',
            backgroundsize:'cover',
            border:'3px solid #4194ce',
            'border-radius':'10px'
          },700);


      }
     }
    $(".GifImageC3").animate({
      left:'1%'
    },1000);
    $(".ExitButton").animate({
       right:'-100px'
       },1000);
    $(".CardsDetails").animate({
       right:'-700px'
       },500);
  }
