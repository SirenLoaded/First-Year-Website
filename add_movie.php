<html>

<head>
    <title>Movie Add</title>
    <LINK REL='stylesheet' TYPE='text/css' HREF='cwstyle.css'>
</head>

<body>
    <h1>Movie Add Result</h1>

    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // preparing the variables used for adding a movie
    $actoradd = $_GET['actor'];
    $titleadd = $_GET['title'];
    $genreadd = $_GET['genre'];
    $priceadd = $_GET['price'];
    $yearadd = $_GET['year'];


    $db_host = 'mysql.cs.nott.ac.uk';
    $db_user = 'psyar9_COMP1004';
    $db_pass = 'password';
    $db_name = 'psyar9_COMP1004';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>");

    $rowCheck = "SELECT actID, actName From Actor WHERE actName='$actoradd'";
    $results = mysqli_query($conn, $rowCheck);

    if (mysqli_num_rows($results) == 0) {

        echo "You cannot add '$titleadd' because '$actoradd' does not exist in the Actor database. Add '$actoradd' first then try again";
    } else {

        $sql = "INSERT INTO Movie (actID, mvTitle, mvGenre, mvYear, mvPrice) VALUES 
        ((SELECT actID from Actor WHERE actName = '$actoradd'), '$titleadd', '$genreadd',$yearadd,$priceadd)";


        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            echo "The movie: $titleadd has been add to the Movie database";
        }else{
            echo "You cannot add $titleadd because an error has occured";
    
        }

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