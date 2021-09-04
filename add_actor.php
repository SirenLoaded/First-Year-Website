<html>
<head>
        <title>Actor Add</title>
        <LINK REL='stylesheet' TYPE='text/css' HREF='cwstyle.css'>
</head>
<body>
<h1>Actor Add Result</h1>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$titleadd = $_GET['title'];
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyar9_COMP1004'; 
$db_pass = 'password'; 
$db_name = 'psyar9_COMP1004'; 

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

$sql="INSERT INTO Actor (actName) VALUES ('$titleadd')";
$stmt = $conn->prepare($sql);

$stmt->execute();

echo "The actor: $titleadd has been added to the Actor database";
?>

<script>
function goBack() {
  window.history.back();
}

</script> 

<button onclick="goBack()">Go Back</button>


</table>
</body>
</html>
