<?php
include 'C:/xampp/htdocs/Express/db.php';


if(isset($_POST['size'])){
$size=$_POST['size'];
$sql="SELECT * FROM zboruri LIMIT $size";
$execute=mysqli_query($conn,$sql);
echo '<h2>View All Flights:</h2>';
echo '  <table>
    <th>ID</th>
    <th>From Country</th>
    <th>From Town</th>
    <th>To Town</th>
    <th>To Country</th>
    <th>Hour</th>
    <th>Price</th>
    <th>Class</th>
    <th>Company</th>
    <th>Ammount</th>
    <th>Date</th>';
while($row=mysqli_fetch_assoc($execute)){
 $id=$row['ID'];
 $FromC=$row['TaraDin'];
 $FromT=$row['Din'];
 $ToT=$row['Catre'];
 $ToC=$row['TaraCatre'];
 $ora=$row['Ora'];
 $pret=$row['Pret'];
 $clasa=$row['Clasa'];
 $company=$row['Companie'];
 $cant=$row['cantitate'];
 $data=$row['Data'];
 echo '<tr>
       <td>'.$id.'</td>
       <td>'.$FromC.'</td>
       <td>'.$FromT.'</td>
       <td>'.$ToT.'</td>
       <td>'.$ToC.'</td>
       <td>'.$ora.'</td>
       <td>'.$pret.'</td>
       <td>'.$clasa.'</td>
       <td>'.$company.'</td>
       <td>'.$cant.'</td>
       <td>'.$data.'</td>
      </tr>
      ';
}
echo '</table>';
}
 ?>
