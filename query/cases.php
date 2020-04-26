<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

						// connect to db
						require('../db.php');
						
						//$query = "select * from `case`";
						$num= ($_POST['num']=='') ? "where 1" : "where CASE_NUMBER like '%".$_POST['num']."%'";

						$query = "select * from `case`".$num;
	
						$result = mysqli_query($con,$query) or die(mysql_error());

            
					$newsNum=mysqli_num_rows($result);  

					$table = '<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Case Number</th>
							<th scope="col">Case Status</th>
							<th scope="col">Case Submitted</th>
							<th scope="col">Decision Date</th>
							<th scope="col">Original Cert Date</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>';
					for ($i=0; $i<$newsNum; $i++){
						$row = mysqli_fetch_assoc($result);
						$table .= '    
						<tr>
						<th scope="row">'.$row['CASE_NUMBER'].'</th>
						<td>'.$row['CASE_STATUS'].'</td>
						<td>'.$row['CASE_SUBMITTED'].'</td>
						<td>'.$row['DECISION_DATE'].'</td>
						<td>'.$row['ORIGINAL_CERT_DATE'].'</td>
						<td>'.$row['ORIGINAL_CERT_DATE'].'</td>
					</tr>';
					}
					$table .=   '</tbody>
					</table>';

					echo $table;
}
?>