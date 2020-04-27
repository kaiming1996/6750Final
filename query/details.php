<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      session_start();
      // connect to db
      require('../db.php');

      if (!isset($_SESSION['username']) || !isset($_REQUEST['q'])) {
        echo '<p>❌ You need to first log in to view case details.</p>';
      } else {
        
        $q=mysqli_real_escape_string($con,stripslashes($_REQUEST['q']));

        $query = "select `case`.`CASE_NUMBER` as a, `case`.`CASE_STATUS` as b, `case`.`CASE_SUBMITTED` as c, `case`.`DECISION_DATE` as d, `case`.`ORIGINAL_CERT_DATE` as e, employment.WAGE_FROM as f, employment.WAGE_UNIT as g, employment.JOB_TITLE as h, employer.EMPLOYER_NAME as i, employer.ADDRESS1 as j,employer.CITY as k,employer.STATE as l, employer.POSTAL_CODE as m, education.COLLEGE as n,education.DEGREE as o, education.MAJOR as p, agent.AGENT_NAME as q, submit.CREATED_AT as r from `case` inner join employment on employment.CASE_NUMBER = `case`.CASE_NUMBER inner join employer on employer.EMPLOYER_ID = employment.EMPLOYER_ID inner join education on education.CASE_NUMBER = `employment`.`CASE_NUMBER` inner join represent on represent.EMPLOYER_ID = employment.EMPLOYER_ID inner join agent on agent.AGENT_ID = represent.AGENT_ID inner join submit on submit.CASE_NUMBER = employment.CASE_NUMBER where employment.CASE_NUMBER = '".$q."'";
	
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
        $li = '<ul class="list-group">
        <li class="list-group-item">CASE_NUMBER: '.$row["a"].'</li>
        <li class="list-group-item">CASE_STATUS: '.$row["b"].'</li>
        <li class="list-group-item">CASE_SUBMITTED: '.$row["c"].'</li>
        <li class="list-group-item">DECISION_DATE: '.$row["d"].'</li>
        <li class="list-group-item">ORIGINAL_CERT_DATE: '.$row["e"].'</li>
        <li class="list-group-itemd">WAGE_FROM: '.$row["f"].'</li>
        <li class="list-group-item">WAGE_UNIT: '.$row["g"].'</li>
        <li class="list-group-item">JOB_TITLE: '.$row["h"].'</li>
        <li class="list-group-item">EMPLOYER_NAME: '.$row["i"].'</li>
        <li class="list-group-item">ADDRESS: '.$row["j"].'</li>
        <li class="list-group-item">CITY: '.$row["k"].'</li>
        <li class="list-group-item">STATE: '.$row["l"].'</li>
        <li class="list-group-item">POSTAL_CODE: '.$row["m"].'</li>
        <li class="list-group-item">COLLEGE: '.$row["n"].'</li>
        <li class="list-group-item">DEGREE: '.$row["o"].'</li>
        <li class="list-group-itemd">MAJOR: '.$row["p"].'</li>
        <li class="list-group-item">AGENT_NAME: '.$row["q"].'</li>
        <li class="list-group-item">CASE CREATED AT: '.$row["r"].'</li>
      </ul> <a href="../cases.php">Go back to all cases</a>';

        echo $li;
      }


}
?>