<?php
      session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // connect to db
      require('../db.php');
      //ini_set('memory_limit', '1024M');
      
      $city= ($_POST['company']=='') ? "where 1" : "WHERE `employer`.`EMPLOYER_NAME` LIKE '%".$_POST['company']."%'";

      $query = "SELECT DISTINCT(`employment`.`CASE_NUMBER`) as a, `employer`.`EMPLOYER_NAME` as b,	`employment`.`JOB_TITLE` as c, `employment`.`WAGE_FROM` as d, `employer`.`CITY` as e, `employer`.`STATE` as f FROM `employment` NATURAL JOIN `employer`".$city;

      $result = mysqli_query($con,$query) or die(mysql_error());

            
    $newsNum=mysqli_num_rows($result);  

    $table = '<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Case Number</th>
        <th scope="col">Employer</th>
        <th scope="col">Job Title</th>
        <th scope="col">Base Salary</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
      </tr>
    </thead>
    <tbody>';
    for ($i=0; $i<$newsNum; $i++){
      $row = mysqli_fetch_assoc($result);
      $table .= '    
      <tr>
      <th scope="row">'.$row['a'].'</th>
      <td>'.$row['b'].'</td>
      <td>'.$row['c'].'</td>
      <td>$'.$row['d'].'</td>
      <td>'.$row['e'].'</td>
      <td>'.$row['f'].'</td>
    </tr>';
    }
    $table .=   '</tbody>
    </table>';

    echo $table;

}
?>