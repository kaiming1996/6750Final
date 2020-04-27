


<?php
session_start();
if(isset($_SESSION["username"])){
  $user=$_SESSION["username"];
}
$PageTitle="H1B Cases by City";
$nav="cities";
include_once('templates/header.php');
?>

			<?php

						echo '
						<h2>🏙️ H1B Cases by City</h2>
						<form action="" method="post" id="myForm" name="search_city"> 
						City: <input type="text" name="city"> 
						<input type="button" value="search" id="search">

						</form> 
						<br>


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
									url: "query/cities.php",
									type: "POST",
									data: $("#myForm").formSerialize(),
								success: fill,
								 failure: function(result){alert("1")}
								});
							});
							$.ajax({
								url: "query/cities.php",
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