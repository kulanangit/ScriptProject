<html>
<head>
<title>ThaiCreate.Com</title>
<link rel="stylesheet" type="text/css" href="Webboard.css"> 
<link rel="stylesheet" type="text/css" href="topbar.css"> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchSceince.php",
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

<table class="center">
<tr>
    <td>
      
    <ul>
    <li><a href="Webboard_Science.php">ALL</a></li>
    <li><a href="Webboard_topic_Sci.php?Topic=Love">Love</a></li>
  <li> <a href="Webboard_topic_Sci.php?Topic=Education">Educations</a> </li>
  <li><a href="Webboard_topic_Sci.php?Topic=Drama">Drama</a></li>
  <li> <a href="Webboard_topic_Sci.php?Topic=Health">Health</a> </li>
  <li><a href="Webboard_topic_Sci.php?Topic=Game">Game</a></li>
  <li> <a href="Webboard_topic_Sci.php?Topic=idol">idol</a> </li>
</ul>
</td>
<td>



<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
<div class="container">
   <br />
   <h2 class="header">School of Science</h2><br />
  <div class="form-group">
    <div class="input-group">
          <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search...."/>
          <label class="form-label" for="form1"></label>
    </div>
  </div>
  <a class="button" href="NewQuestion.php">New Topic</a><br>
  <br />
   <div id="result"></div>
  </div>
</form>
</td>
</tr>
</table>
</body>
</html>