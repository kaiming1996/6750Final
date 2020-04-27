<?php
      session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

						// connect to db
						require('../db.php');
						
						//$query = "select * from `case`";
						$num= ($_POST['num']=='') ? "where 1" : "where CASE_NUMBER like '%".$_POST['num']."%'";

						$query = "select * from `case`".$num;
	
						$result = mysqli_query($con,$query) or die(mysql_error());

            
					$newsNum=mysqli_num_rows($result);  
					$admincol = '';
					$adminaction = '';

					if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
						$admincol = '<th scope="col">Action</th>';
					}

					$table = '<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Case Number</th>
							<th scope="col">Case Status</th>
							<th scope="col">Case Submitted</th>
							<th scope="col">Decision Date</th>
							<th scope="col">Original Cert Date</th>
							'.$admincol.'
						</tr>
					</thead>
					<tbody>';
					for ($i=0; $i<$newsNum; $i++){
						$row = mysqli_fetch_assoc($result);
						if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
							$adminaction = '<td><a href="query/delete.php?q='.$row['CASE_NUMBER'].'"> ❌ ️</a></td>';
						}
						$table .= '    
						<tr>
						<th scope="row"><a href="query/details.php?q='.$row['CASE_NUMBER'].'">'.$row['CASE_NUMBER'].'</a></th>
						<td>'.$row['CASE_STATUS'].'</td>
						<td>'.$row['CASE_SUBMITTED'].'</td>
						<td>'.$row['DECISION_DATE'].'</td>
						<td>'.$row['ORIGINAL_CERT_DATE'].'</td>
						'.$adminaction.'
					</tr>';
					}
					$table .=   '</tbody>
					</table>';

					echo $table;
}
?>