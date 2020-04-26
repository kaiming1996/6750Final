


<?php
session_start();
if(isset($_SESSION["username"])){
  $user=$_SESSION["username"];
}
$PageTitle="All H1B Cases";
$nav="cases";
include_once('templates/header.php');
?>

			<?php

						echo '
						<h2>Search</h2>
						<form action="search_case.php" method="post" id="myForm" name="search_case"> 
						Case number: <input type="text" name="num"> 
						<input type="button" value="search" id="search">

						</form> 


						<div id="tb">Loading...</div>
						<script>	
						$(document).ready(function() {
							console.log( "ready!" );
							var query = $("#myForm").formSerialize(); 
							var fill = function(tb) {
								$("#tb").html(tb);
							}
							$("#search").click(function(){
								$("#tb").html("Loading...");
								$.ajax({
									url: "query/cases.php",
									type: "POST",
									data: $("#myForm").formSerialize(),
								success: fill,
								 failure: function(result){alert("1")}
								});
							});
							$.ajax({
								url: "query/cases.php",
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