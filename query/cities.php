<?php
      session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // connect to db
      require('../db.php');
      //ini_set('memory_limit', '1024M');
      
      $city= ($_POST['city']=='') ? "where 1" : "WHERE `employer`.`CITY` LIKE '%".$_POST['city']."%'";

      $query = "SELECT `employment`.`CASE_NUMBER` as a, `employer`.`EMPLOYER_NAME` as b,	`employment`.`WAGE_FROM` as c, `employer`.`CITY` as d, `employer`.`STATE` as e, `employer`.`COUNTRY`as f FROM `employment` NATURAL JOIN `employer`".$city;

      $result = mysqli_query($con,$query) or die(mysqli_error($con));

            
    $newsNum=mysqli_num_rows($result);  

    $table = '<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Case Number</th>
        <th scope="col">Employer</th>
        <th scope="col">Base Salary</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Country</th>
      </tr>
    </thead>
    <tbody>';
    for ($i=0; $i<$newsNum; $i++){
      $row = mysqli_fetch_assoc($result);
      $table .= '    
      <tr>
      <th scope="row">'.$row['a'].'</th>
      <td>'.$row['b'].'</td>
      <td>$'.$row['c'].'</td>
      <td>'.$row['d'].'</td>
      <td>'.$row['e'].'</td>
      <td>'.$row['f'].'</td>
    </tr>';
    }
    $table .=   '</tbody>
    </table>';

    echo $table;

}
?>