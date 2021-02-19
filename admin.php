<html>
<header>
        <center>
        <h3> header </h3>
        </center>

</header>
        <form action="delete_topic.php" method="get">
        <form action="ban_user.php" method="get">
        <form action="delete_user.php" method="get">
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
        $sql="SELECT  r.rp_id r.post_id, r.date, p.title, p.detail, p.category_id, r.user_id, u.username
                FROM post p 
                INNER JOIN report r
                INNER JOIN user u
                ON p.post_id = r.post_id 
                AND r.user_id = u.user_id"; 
                $rs=$conn->query($sql);

    echo "<center><table border='1'>	
        <tr>
            <th width='150px'>date</th>
            <th width='300px'>title</th>
            <th width='400px'>detail</th>
            <th width='150px'>category</th>
            <th width='150px'>user id</th>
            <th width='150px'>username</th>
            <th width='50px'></th>
            <th width='50px'></th>
            <th width='50px'></th>
	    </tr>";
    if($result = $conn->query($sql)){
        while($row = $rs->fetch_assoc()) {
    // echo out the contents of each row into a table
    echo    "<tr>";
        echo    "<td>". $row['date'] ."</td>";
        echo    "<td>". $row['title'] ."</td>";
        echo    "<td>". $row['detail'] ."</td>";
        echo    "<td>". $row['category_id'] ."</td>";
        echo    "<td>". $row['user_id'] ."</td>";
        echo    "<td>". $row['username'] ."</td>";
        echo    "<td><a onClick=\"javascript: return confirm('Are you sure to delete this topic 
                ".$row['title']."');\" href='delete_topic.php?id=".$row['post_id']."'>delete topic</a></td>";
        echo    "<td><a onClick=\"javascript: return confirm('Are you sure ban this user? 
                ".$row['user_id']."');\" href='ban_user.php?id=".$row['user_id']."'>ban</a></td>";
        echo    "<td><a onClick=\"javascript: return confirm('Are you sure delete this user? 
                ".$row['user_id']."');\" href='delete_user.php?id=".$row['user_id']."'>delete</a></td>";
        echo	"</tr>";
        // $_SESSION['post_id']=$row['post_id'];
        // $_SESSION['user_id']=$row['user_id'];
        }
        echo    "</table></center>";
    }
    $conn->close();
}
?>
    <footer>
    <center>
        <h3> footer </h3>
    </center>
    </footer>
</html>