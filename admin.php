<html>
<header>
        <center>
        <h3> header </h3>
        </center>

</header>
<body>
<form action="delete_topic.php" method="GET">
        <!--<form action="delete_user.php" method="get">-->
<?php 
session_start();


        error_reporting(0);
        ini_set('display_errors', 0); //hide error


        $conn=mysqli_connect("localhost", "root", "","helloboard_db");
        $conn->query("SET NAMES UTF8");
        $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $strSQL);


        

        if($_SESSION['username'] == "")
        {
            echo "<center>Please Login!<center>";
        }

        else if($_SESSION['role'] != "1")
        {
            echo "<center>You don't have permission to access this page!</center>";
        }
        
        else if($_SESSION['role'] != "0")
        {
        // get results from database
        $sql="SELECT  r.rp_id, r.QuestionID, r.date, p.Question, p.Details, p.Major, p.Category, r.userName, p.Name
                FROM webboard p 
                INNER JOIN report r
                ON p.QuestionID = r.QuestionID
                ORDER BY r.date";
                $rs=$conn->query($sql);

    echo "<center><table border='1'>	
        <tr>
            <th width='150px'>date</th>
            <th width='300px'>question</th>
            <th width='400px'>detail</th>
            <th width='150px'>major</th>
            <th width='150px'>category</th>
            <th width='150px'>username</th>
    
            <th width='50px'></th>
            <th width='50px'></th>
	    </tr>";
    if($result = $conn->query($sql)){
        while($row = $rs->fetch_assoc()) {
    // echo out the contents of each row into a table
    echo    "<tr>";
        echo    "<td>". $row['date'] ."</td>";
        echo    "<td>". $row['Question'] ."</td>";
        echo    "<td>". $row['Details'] ."</td>";
        echo    "<td>". $row['Major'] ."</td>";
        echo    "<td>". $row['Category'] ."</td>";
        echo    "<td>". $row['userName'] ."</td>";
        echo    "<td><a onClick=\"javascript: return confirm('Are you sure to delete #id ".$row['QuestionID']."');\" href='delete_topic.php?QuestionID=".$row['QuestionID']."'>Delete</a></td>";
        echo    "<td><a onClick=\"javascript: return confirm('Are you sure delete this user? 
                ".$row['QuestionID']."');\" href='delete_user.php?id=".$row['QuestionID']."'>delete</a></td>";
        echo	"</tr>";
        }
        echo    "</table></center>";
    }
    $conn->close();
}
?>
<!--</form>-->
</form>
</body>
    <footer>
    <center>
        <h3> footer </h3>
    </center>
    </footer>
</html>