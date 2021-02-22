<html>
<header>
        <center>
        <h3> User Control </h3>
        </center>
        <link rel="stylesheet" type="text/css" href="list_user.css">
</header>
<body>
<form action="delete_user.php" method="GET">
<?php 
session_start();


        error_reporting(0);
        ini_set('display_errors', 0); //hide error


        $conn=mysqli_connect("localhost", "root", "","helloboard_db");
        $conn->query("SET NAMES UTF8");
        // $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
        // $result = mysqli_query($conn, $strSQL);


        

        // if($_SESSION['username'] == "")
        // {
        //     echo "<center>Please Login!<center>";
        // }

        // else if($_SESSION['role'] != "1")
        // {
        //     echo "<center>You don't have permission to access this page!</center>";
        // }
        
        // else if($_SESSION['role'] != "0")
        // {
        // // get results from database
        $sql="SELECT *
        -- user_ID,username,major
                FROM user
                ORDER BY user_ID";
                $rs=$conn->query($sql);

    echo "<center><table border='1'>
    <thead>	
        <tr>
            <th width='50px'>user_ID</th>
            <th width='300px'>username</th>
            <th width='200px'>major</th>
            <th width='50px'></th>
	    </tr>
        <tbody>";
    if($result = $conn->query($sql)){
        while($row = $rs->fetch_assoc()) {
    // echo out the contents of each row into a table
    echo    "<tr>";
        echo    "<td>". $row['user_id'] ."</td>";
        echo    "<td>". $row['username'] ."</td>";
        echo    "<td>". $row['major'] ."</td>";
        echo    "<td><a onClick=\"javascript: return confirm('Are you sure to delete this username #username ".$row['username']."');\" href='delete_user.php?username=".$row['username']."'>Delete</a></td>";
        echo	"</tr>";
        }
        
        echo    "</tbody>
        </table></center>";
    }
    $conn->close();
// }
?>
</form>
</body>
<a href="logout.php" <?php if($_SESSION['username'] == "")  {echo "style='display: none;'";} ?>> Logout</a>
    <footer>
    <center>
        <h3> Sut Webboard</h3>
    </center>
    </footer>
</html>