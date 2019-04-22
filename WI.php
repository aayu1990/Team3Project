<?php
  include_once 'includes/dbh.inc.php'
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<body>
<?php
    $sql = "SELECT * FROM Team WHERE Team_Name='WestIndies';";
    $result = mysqli_query($conn, $sql) or die("Bad query: $sql");

    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck >0) {
    echo"<table border='1'>";
    echo"<tr><td>Team</td><td>Team ID</td><td>Sponsor</td><td>Coach First Name</td><td>Coach Last Name</td><td>Coach Age</td></tr>\n";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['Team_Name']}</td>";
        echo "<td>{$row['Team_Id']}</td>";
        echo "<td>{$row['Sponsor']}</td>";
        echo "<td>{$row['Coach_F_Name']}</td>";
        echo "<td>{$row['Coach_L_Name']}</td>";
        echo "<td>{$row['Age']}</td>";
        echo "</tr>";
     }
    echo "</table>";
  }
?>
</body> 
</html>