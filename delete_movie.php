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

$rowCheck="SELECT mvID, mvTitle, mvPrice, mvYear, mvGenre From Movie WHERE mvTitle='$titleadd'";
$results = mysqli_query($conn,$rowCheck);

if(mysqli_num_rows($results) == 0){
    
    echo "You cannot delete '$titleadd' because it does not exist";
}else{

    $sql="DELETE FROM Movie WHERE mvTitle='$titleadd'";
    $stmt = $conn->prepare($sql);

    $stmt->execute();

    echo "The movie: $titleadd has been removed from the Movie database";
}

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
