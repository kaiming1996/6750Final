

<?php
      session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      session_start();
      // connect to db
      require('../db.php');

      if (!isset($_SESSION['role']) || $_SESSION['role']!= 'admin' || !isset($_REQUEST['q'])) {
        echo '<p>❌ You do not have the previledge to delete cases.</p>';
      } else {
        
        $q=mysqli_real_escape_string($con,stripslashes($_REQUEST['q']));

        $query = "DELETE FROM `case` WHERE CASE_NUMBER='{$q}'";	
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        header("Location:../cases.php");
      }


}
?>
