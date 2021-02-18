<html>
<head>
<title>ThaiCreate.Com</title>
<link rel="stylesheet" type="text/css" href="Webboard.css"> 
<link rel="stylesheet" type="text/css" href="topbar.css"> 
<!-- <link rel="stylesheet" type="text/css" href="Navbar_cat.css">  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"Webboard_topic.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

</head>
<body>
<nav role="navigation">
  <ul>
    <li><a href="Webboard.php">Public</a></li>
    <li><a href="#">Major</a>
      <ul class="dropdown">
        <li><a href="Webboard_Social.php">Social Technology</a></li>
        <li><a href="Webboard_Science.php">Science</a></li>
        <li><a href="Webboard_Agricultural.php">Agricutural</a></li>
        <li><a href="Webboard_Engineer.php">Engineering</a></li>
        <li><a href="Webboard_Medicine.php">Medicine</a></li>
    
      </ul>
    </li>
   
  </ul>
</nav>
<br>
<table class="center">
<tr>
    <td>
      
    <ul>
    <li><a href="Webboard_Medicine.php">ALL</a></li>
    <li><a href="Webboard_topic_Med.php?Topic=Love">Love</a></li>
  <li> <a href="Webboard_topic_Med.php?Topic=Education">Educations</a> </li>
  <li><a href="Webboard_topic_Med.php?Topic=Drama">Drama</a></li>
  <li> <a href="Webboard_topic_Med.php?Topic=Health">Health</a> </li>
  <li><a href="Webboard_topic_Med.php?Topic=Game">Game</a></li>
  <li> <a href="Webboard_topic_Med.php?Topic=idol">idol</a> </li>
</ul>

</td>
<td>
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
<div class="container">
   <br />
   <h2 class="header">School of Agriculral</h2><br />
  <div class="form-group">
    <div class="input-group">
          <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search...."/>
          <label class="form-label" for="form1"></label>
    </div>
  </div>
  <a class="button" href="NewQuestion.php">New Topic</a><br>
  <br />
  <?php session_start() ?>
  </td>
</tr>
</table>
<?php

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "helloboard_db");
$output = '';
if(isset($_POST["query"]))

{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM webboard WHERE Major = 'Medicine'  AND  Category = '".$_GET["Topic"]."' AND  Question LIKE '%".$search."%' ";
}
else
{
    $query = "SELECT * FROM webboard WHERE  Major = 'Medicine'  AND  Category = '".$_GET["Topic"]."' ORDER BY QuestionID ";
}

$result = $connect->query($query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>QuestionID</th>
     <th>Question</th>
     <th>Name</th>
     <th>CreateDate</th>
     <th>View</th>
     <th>Reply</th>
     <th>Topic</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["QuestionID"].'</td>
    <td><a href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>
    <td>'.$row["Name"].'</td>
    <td>'.$row["CreateDate"].'</td>
    <td>'.$row["View"].'</td>
    <td>'.$row["Reply"].'</td>
    <td >'.$row["Category"].'</td>

   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}


?><!-- <div id="result"></div> -->
  </div>
</form>
</td>
</tr>




</table>
</body>
</html>