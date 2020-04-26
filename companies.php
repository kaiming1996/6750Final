


<?php
session_start();
if(isset($_SESSION["username"])){
  $user=$_SESSION["username"];
}
$PageTitle="H1B Cases by Company";
$nav="companies";
include_once('templates/header.php');
?>

			<?php
						echo '
						<h2>Search</h2>
						<form action="query/companies.php" method="post" id="myForm" name="companies"> 
						Company: <input type="text" name="company"> 
						<input type="button" value="search" id="search">

						</form> 


						<div id="tb">Loading...</div>
						<script>	
						$(document).ready(function() {
							var query = $("#myForm").formSerialize(); 
							var fill = function(tb) {
								$("#tb").html(tb);
							}
							$("#search").click(function(){
								$("#tb").html("Loading...");
								$.ajax({
									url: "query/companies.php",
									type: "POST",
									data: $("#myForm").formSerialize(),
								success: fill,
								 failure: function(result){alert("1")}
								});
							});
							$.ajax({
								url: "query/companies.php",
								type: "POST",
								data: query,
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