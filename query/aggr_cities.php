<?php
      session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

      // connect to db
      require('../db.php');
      $result = mysqli_query($con,"CALL HighestPaidByCity();");     
    $num=mysqli_num_rows($result);  

    $table = '<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col"># of H1B Cases</th>
        <th scope="col">Avg Base Salary</th>
      </tr>
    </thead>
    <tbody>';
    for ($i=0; $i<$num; $i++){
      $row = mysqli_fetch_assoc($result);
      $table .= '    
      <tr>
      <th scope="row">'.$row['city'].'</th>
      <td>'.$row['state'].'</td>
      <td>'.$row['num'].'</td>
      <td>$'.$row['wage'].'</td>
    </tr>';
    }
    $table .=   '</tbody>
    </table>';

    echo $table;

}
?>