<html>
<head>
        <title>Movie Search</title>
        <LINK REL='stylesheet' TYPE='text/css' HREF='cwstyle.css'>
</head>
<body>
<h1>Movie Search Result</h1>

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

$sql="SELECT mvID, actID, mvTitle, mvPrice, mvYear, mvGenre From Movie";
$stmt = $conn->prepare($sql);

$stmt->execute();
$stmt->bind_result($ID, $ActID, $Title, $Price, $Year, $Genre );

/*
if ($stmt){
  if($stmt->num_rows == 0){
    echo "No results.";
  }else{
    echo "Stmt is null";
  }
}
*/

// creating table below
?>

<table width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>Movie ID</th> <th>Actor ID</th> <th>Title</th> <th>Price</th> <th>Year</th> <th>Genre</th> </tr> 

<?php
while($stmt->fetch()){
  echo "<tr>";
  echo "<td>". htmlentities($ID) ."</td>";
  echo "<td>". htmlentities($ActID) ."</td>";
  echo "<td>". htmlentities($Title) ."</td>";
  echo "<td>". htmlentities($Price) ."</td>";
  echo "<td>". htmlentities($Year) ."</td>";
  echo "<td>". htmlentities($Genre) ."</td>";
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
