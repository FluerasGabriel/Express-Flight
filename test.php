<?php
include 'db.php';

$strJsonFileContents = file_get_contents("world-cities_json.json");

$OrasPlecare;
$TaraPlecare;
$Companie=["Aer Lingus","Tarom","Air Europa","Air France","British Airways","Emirates","Swiss","Wizz","Blue Air"];
$randomCompanie;
$hourRandom;

$dayRandom;
$Months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

include 'db.php';
$query="Select * From oras";
$res=mysqli_query($conn,$query);

 if($res>0)
 {
   while($row=mysqli_fetch_assoc($res)){
        $OrasPlecare[]=$row["Oras"];
        $TaraPlecare[]=$row["Tara"];

   }
   echo "succes";

 }


  $month=1;
  $daysInMonth=cal_days_in_month (CAL_GREGORIAN, $month , 2021);
  for ($orasIndex=0; $orasIndex <=600 ; $orasIndex++) {

       $randomCompanie=rand(1,8);
       $hourRandom=rand(1,24);
       $randomHourString="{$hourRandom}";
       $randomday=rand(1,11);
       $randomday2=rand(1,28);
       $randomOras=rand(0,600);
       $randomOras2=rand(0,600);
       $randomdate="{$randomday2} {$Months[$randomday]}";
     for($i=1;$i<=3;$i++){
        $randomprice3=rand(50,500);
        $randomprice2=$randomprice3+100;
        $randomprice1=$randomprice3+600;
        if($i==1){
          $price=$randomprice1;
          $class="Economy";
          $query = $conn-> prepare("INSERT INTO zboruri (`TaraDin`,`Din`,`Catre`,`TaraCatre`,`Companie`,`Data`,`Ora`,`Pret`,`Clasa`) VALUES (?,?,?,?,?,?,?,?,?)");
          echo $query -> error;
          $query->bind_param("sssssssis",$TaraPlecare[$randomOras2],$OrasPlecare[$randomOras2],
           $OrasPlecare[$randomOras],$TaraPlecare[$randomOras], $Companie[$randomCompanie],$randomdate, $randomHourString,$price,$class);
           $query->execute();
        }
        if($i==2){
          $price=$randomprice2;
          $class="Bussiness";
          $query = $conn-> prepare("INSERT INTO zboruri (`TaraDin`,`Din`,`Catre`,`TaraCatre`,`Companie`,`Data`,`Ora`,`Pret`,`Clasa`) VALUES (?,?,?,?,?,?,?,?,?)");
           echo $query -> error;
          $query->bind_param("sssssssis",$TaraPlecare[$randomOras2],$OrasPlecare[$randomOras2], $OrasPlecare[$randomOras],$TaraPlecare[$randomOras],
           $Companie[$randomCompanie],$randomdate, $randomHourString,$price,$class);
           $query->execute();
        }
        if($i==3){
          $price=$randomprice3;
          $class="First";
          $query = $conn-> prepare("INSERT INTO zboruri (`TaraDin`,`Din`,`Catre`,`TaraCatre`,`Companie`,`Data`,`Ora`,`Pret`,`Clasa`) VALUES (?,?,?,?,?,?,?,?,?)");
           echo $query -> error;
          $query->bind_param("sssssssis",$TaraPlecare[$randomOras2],$OrasPlecare[$randomOras2], $OrasPlecare[$randomOras],$TaraPlecare[$randomOras],
          $Companie[$randomCompanie],$randomdate, $randomHourString,$price,$class);
           $query->execute();
        }
  }

  }
   $query->close();


 ?>
