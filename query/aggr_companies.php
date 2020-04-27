<?php
      session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

      // connect to db
      require('../db.php');
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      $storedProc = "CALL HighestPaidByCompany()";
      // $stmt = mysqli_prepare($con, $storedProc);
      // mysqli_stmt_execute($stmt);
      // mysqli_stmt_close($stmt);

      // $sql = "SELECT @return";
      // $result = mysqli_query($con,$sql) or die(mysql_error());

      // $stmt = $connection->prepare($storedProc);
      
      // $stmt->execute();
      
      // $result = $stmt->get_result();
      // $response = $result->fetch_all(MYSQLI_ASSOC);
      // echo json_encode($response);
      $result = mysqli_query($con,"CALL HighestPaidByCompany();");

      // try {
      //   $pdo = new PDO("mysql:host=localhost;dbname=cs6750","root","");
      //   // execute the stored procedure
      //   $sql = 'CALL HighestPaidByCompany()';
      //   // call the stored procedure
      //   $q = $pdo->query($sql);
      //   $q->setFetchMode(PDO::FETCH_ASSOC);
      // } catch (PDOException $e) {
      //   die("Error occurred:" . $e->getMessage());
      // }

            
    $newsNum=mysqli_num_rows($result);  

    $table = '<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Employer</th>
        <th scope="col"># of H1B Cases</th>
        <th scope="col">Avg Base Salary</th>
      </tr>
    </thead>
    <tbody>';
    for ($i=0; $i<$newsNum; $i++){
      $row = mysqli_fetch_assoc($result);
      $table .= '    
      <tr>
      <th scope="row">'.$row['name'].'</th>
      <td>'.$row['num'].'</td>
      <td>$'.$row['wage'].'</td>
    </tr>';
    }
    $table .=   '</tbody>
    </table>';

    echo $table;

}
?>