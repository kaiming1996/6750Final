<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SEARCH</title>
</head>
<link rel="stylesheet" href="css/style.css" />
<body>
	<h2>Search</h2>
	<form action="" method="post"> 
	Case number: <input type="text" name="keyword"> 
	
	<input type="Submit" value="search"> 
	</form> 
	<div class="wrapper">


		<table width="960" border="1">
			<tr>
				<th>CASE_NUMBER</th>
				<th>CASE_STATUS</th>
				<th>CASE_SUBMITTED</th>
				<th>DECISION_DATE</th>
				<th>ORIGINAL_CERT_DATE</th>
			</tr>

			<?php
					error_reporting(E_ALL^E_NOTICE);
					// connect to db
					require('db.php');
					
					//$query = "select * from `case`";
					$keyword=$_POST['keyword'];
					$query = "select * from `case` where CASE_NUMBER like '%$keyword%'";
					

					$result = mysqli_query($con,$query) or die(mysql_error());
					

					// 解析结果集,$row为新闻所有数据，$newsNum为新闻数目
					$newsNum=mysqli_num_rows($result);  

					for($i=0; $i<$newsNum; $i++){
						$row = mysqli_fetch_assoc($result);
						echo "<tr>";
						echo "<td>{$row['CASE_NUMBER']}</td>";
						echo "<td>{$row['CASE_STATUS']}</td>";
						echo "<td>{$row['CASE_SUBMITTED']}</td>";
						echo "<td>{$row['DECISION_DATE']}</td>";
						echo "<td>{$row['ORIGINAL_CERT_DATE']}</td>";
						
						echo "</tr>";
					}
				
					
					
			?>
		</table>
	</div>
	
	
</body>
</html>
