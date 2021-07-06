<?php
include 'C:/xampp/htdocs/Express/db.php';
if(isset($_POST['size'])){
  $size=$_POST['size'];
  $sql="SELECT user.Email as user,transactie.zboruri_ID as zbor,transactie.cantitate as cant,transactie.Date as dat FROM transactie
  INNER JOIN user ON user.ID=transactie.user_ID LIMIT $size";
  $execute=mysqli_query($conn,$sql);
  echo
        '<table>
        <th>UserEmail</th>
        <th>FlightID</th>
        <th>Ammount</th>
        <th>Date</th>
        ';

  while($row=mysqli_fetch_assoc($execute)){
    $user=$row['user'];
    $zbor=$row['zbor'];
    $cant=$row['cant'];
    $date=$row['dat'];
        echo '<tr>
              <td>'.$user.'</td>
              <td>'.$zbor.'</td>
              <td>'.$cant.'</td>
              <td>'.$date.'</td>
             </tr>';
  }
  echo '
    </table>
      ';
}

 ?>
