<html>
<head>
        <title>Actor Search</title>
        <LINK REL='stylesheet' TYPE='text/css' HREF='cwstyle.css'>
</head>
<body>
<h1>Actor Search Result</h1>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyar9_COMP1004'; 
$db_pass = 'password'; 
$db_name = 'psyar9_COMP1004'; 

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

$sql="SELECT actID, actName FROM Actor";
$stmt = $conn->prepare($sql);

$stmt->execute();
$stmt->bind_result($ID, $Title);

// below I make a table to store the movie results
?>

<table width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>Actor ID</th> <th>Name</th></tr>

<?php
while($stmt->fetch()){
  echo "<tr>";
  echo "<td>". htmlentities($ID) ."</td>"; 
  echo "<td>". htmlentities($Title) ."</td>";
  echo "</tr>";
}
?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}

</script> 
</table>
</body>
</html>
