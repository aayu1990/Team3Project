<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "EC2mdb2@";
$dbName = "Cricket_Tournament";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn)
{
  die('Could not connect: ' . mysql_error());
}

else{
session_start();
if (isset($_POST['save'])){
    $matchid = $_POST['MatchID'];
    $playerid = $_POST['PlayerID'];
    $runsupdate = $_POST['RunsUpdate'];
    $wicketsupdate = $_POST['WicketsUpdate'];
    
    $query = "SELECT * from ScoreCard where Match_Id = $matchid AND Player_Id='$playerid';";
	
	if ($result = mysqli_query($conn,$query)) {
   
    	/* fetch associative array */
    	while ($row = mysqli_fetch_row($result)) {
        	printf ("%s (%s)\n", $row[2], $row[3]);
          $runsupdate = $runsupdate + $row[2];
        	$wicketsupdate = $wicketsupdate + $row[3];
      }
     
    	/* free result set */
   	 mysqli_free_result($result);
    }
  
	
    $query = "UPDATE ScoreCard Set RunsScored=$runsupdate, WicketsTaken=$wicketsupdate WHERE Match_Id='$matchid' AND Player_Id='$playerid';";
    
    $result = mysqli_query($conn, $query) or die("Bad query: $query");
    
    $_SESSION['message'] = "ScoreCard Updated";
    $_SESSION['msg_type'] = "success";
    
    header("location:updateScorecard_form.php");
    }
  }

 ?>