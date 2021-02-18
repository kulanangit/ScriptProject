<html>
<head>
<link rel="stylesheet" type="text/css" href="fetch.css"> 

<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "helloboard_db");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM webboard WHERE Question LIKE '%".$search."%' OR Name LIKE '%".$search."%'";
}
else
{
    $query = " SELECT * FROM webboard ORDER BY QuestionID ";
}

$result = $connect->query($query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered" id="list">
    <tr>
     <th align="center">QuestionID</th>
     <th align="center">Questions</th>
     <th align="center">Name</th>
     <th align="center">CreateDate</th>
     <th align="center">View</th>
     <th align="center">Reply</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td align="center">'.$row["QuestionID"].'</td>
    <td id="qeust"> <a href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>
    <td align="center">'.$row["Name"].'</td>
    <td align="center">'.$row["CreateDate"].'</td>
    <td align="center">'.$row["View"].'</td>
    <td align="center">'.$row["Reply"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>

</html>