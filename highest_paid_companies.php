


<?php
session_start();
if(isset($_SESSION["username"])){
  $user=$_SESSION["username"];
}
$PageTitle="H1B Cases by Company";
$nav="highest_paid";
include_once('templates/header.php');
?>

			<?php

						echo '
            <h2>Top 20 Companies with Highest Average Salary</h2>
            <p>Only companies with at least 3 filing cases are included.</p>



						<div id="tb">Loading...</div>
						<script>	
						$(document).ready(function() {
							var fill = function(tb) {
								$("#tb").html(tb);
							}
							$.ajax({
								url: "query/aggr_companies.php",
								type: "GET",
							success: fill,
							 failure: function(result){alert("1")}
							});


					});					

			
			</script>

						';
			?>
	
	<?php
include_once('templates/footer.php');
?>