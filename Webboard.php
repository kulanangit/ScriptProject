<html>
<head>
<title>ThaiCreate.Com</title>
<link rel="stylesheet" type="text/css" href="Webboard.css"> 
</head>
<body>
<a href="NewQuestion.php">New Topic</a>
<?php
  $conn=mysqli_connect("localhost", "root", "","helloboard_db");
	$sql="SELECT * FROM webboard";
	$rs=mysqli_query($conn,$sql);
  
?>
<table width="909" border="1">
  <tr>
    <th width="99"> <div align="center">QuestionID</div></th>
    <th width="458"> <div align="center">Question</div></th>
    <th width="90"> <div align="center">Name</div></th>
    <th width="130"> <div align="center">CreateDate</div></th>
    <th width="45"> <div align="center">View</div></th>
    <th width="47"> <div align="center">Reply</div></th>
  </tr>
<?php 
while($row = mysqli_fetch_assoc($rs))
{
    echo '<tr>';
    echo '<td><div align="center">'.$row["QuestionID"].'</div></td>';
    echo '<td><a href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>';
    echo '<td>'.$row["Name"].'</td>';
    echo '<td><div align="center">'.$row["CreateDate"].'</div></td>';
    echo '<td align="right">'.$row["View"].'</td>';
    echo '<td align="right">'.$row["Reply"].'</td>';
    echo '</tr>';
}
mysqli_close($conn);
?>

</body>
</html>